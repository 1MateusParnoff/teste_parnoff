<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barbeiro;

class BarbeiroController extends Controller
{
    public function index()
    {
        $barbeiros = Barbeiro::all();
        return view('barbeiros.index', compact('barbeiros'));
    }

    public function create()
    {
        return view('barbeiros.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'especialidade' => 'required|in:Corte,Barba,Sobrancelha',
        ]);

        $barbeiro = Barbeiro::create($data);

        return redirect()
            ->route('barbeiros.show', $barbeiro)
            ->with('success', 'Barbeiro criado com sucesso!');
    }

    public function show($id)
    {
        $barbeiro = Barbeiro::findOrFail($id);
        return view('barbeiros.show', compact('barbeiro'));
    }

    public function edit($id)
    {
        $barbeiro = Barbeiro::findOrFail($id);
        return view('barbeiros.edit', compact('barbeiro'));
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
            ->route('barbeiros.show', $barbeiro)
            ->with('success', 'Barbeiro atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $barbeiro = Barbeiro::findOrFail($id);
        $barbeiro->delete();

        return redirect()
            ->route('barbeiros.index')
            ->with('success', 'Barbeiro excluído com sucesso!');
    }
}
