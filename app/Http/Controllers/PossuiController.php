<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Possui;

class PossuiController extends Controller
{
    public function index()
    {
        $possui = Possui::all();
        return view('possui.index', compact('possui'));
    }

    
    public function create()
    {
        return view('possui.create');
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_servico'    => 'required|integer|exists:servicos,id',
            'id_agendamento'=> 'required|integer|exists:agendamentos,id',
        ]);

        $possui = Possui::create($data);

        return redirect()
            ->route('possui.show', $possui)
            ->with('success', 'Relacionamento criado com sucesso!');
    }

    
    public function show($id)
    {
        $possui = Possui::findOrFail($id);
        return view('possui.show', ['possui' => $possui]);
    }

    
    public function edit($id)
    {
        $possui = Possui::findOrFail($id);
        return view('possui.edit', compact('possui'));
    }

    
    public function update(Request $request, $id)
    {
        $possui = Possui::findOrFail($id);

        $data = $request->validate([
            'id_servico'    => 'required|integer|exists:servicos,id',
            'id_agendamento'=> 'required|integer|exists:agendamentos,id',
        ]);

        $possui->update($data);

        return redirect()
            ->route('possui.show', $possui)
            ->with('success', 'Relacionamento atualizado com sucesso!');
    }

    
    public function destroy($id)
    {
        $possui = Possui::findOrFail($id);
        $possui->delete();

        return redirect()
            ->route('possui.index')
            ->with('success', 'Relacionamento excluído com sucesso!');
    }
}
