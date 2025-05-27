<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barbeiro;

class BarbeiroController extends Controller
{
    public function index()
    {
        $barbeiro = Barbeiro::all();
        return view('barbeiro.index', compact('barbeiro'));
    }

    public function create()
    {
        return view('barbeiro.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'especialidade' => 'required|in:Corte,Barba,Sobrancelha',
        ]);

        $barbeiro = Barbeiro::create($data);

        return redirect()
            ->route('barbeiro.show', $barbeiro)
            ->with('success', 'Barbeiro criado com sucesso!');
    }

    public function show($id)
    {
        $barbeiro = Barbeiro::findOrFail($id);
        return view('barbeiro.show', compact('barbeiro'));
    }

    public function edit($id)
    {
        $barbeiro = Barbeiro::findOrFail($id);
        return view('barbeiro.edit', compact('barbeiro'));
    }

    public function update(Request $request, $id)
    {
        $barbeiro = Barbeiro::findOrFail($id);

        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'especialidade' => 'required|in:Corte,Barba,Sobrancelha',
        ]);

        $barbeiro->update($data);

        return redirect()
            ->route('barbeiro.show', $barbeiro)
            ->with('success', 'Barbeiro atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $barbeiro = Barbeiro::findOrFail($id);
        $barbeiro->delete();

        return redirect()
            ->route('barbeiro.index')
            ->with('success', 'Barbeiro excluído com sucesso!');
    }

    public function barbeirosPorServico($servico_id)
    {
        $barbeiros = Barbeiro::whereHas('servicos', function($q) use ($servico_id) {
            $q->where('servicos.id', $servico_id);
        })->get(['id', 'nome']);

        return response()->json($barbeiros);
    }
}
