<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Possui;

class PossuiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $possui = Possui::all();
        return view('possui.index', compact('possui'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('possui.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $possui = Possui::findOrFail($id);
        return view('possui.show', ['possui' => $possui]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $possui = Possui::findOrFail($id);
        return view('possui.edit', compact('possui'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $possui = Possui::findOrFail($id);
        $possui->delete();

        return redirect()
            ->route('possui.index')
            ->with('success', 'Relacionamento excluído com sucesso!');
    }
}
