<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Realiza;

class RealizaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Se quiser filtrar pelo usuário logado, ajuste aqui
        $realizacoes = Realiza::all();
        return view('realiza.index', compact('realizacoes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('realiza.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_barbeiro'   => 'required|integer|exists:barbeiros,id',
            'id_agendamento' => 'required|integer|exists:agendamentos,id',
        ]);

        // Se quiser salvar quem criou essa relação, pode adicionar created_by aqui

        $realiza = Realiza::create($data);

        return redirect()
            ->route('realiza.show', $realiza)
            ->with('success', 'Relação criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $realiza = Realiza::findOrFail($id);
        return view('realiza.show', ['realiza' => $realiza]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $realiza = Realiza::findOrFail($id);
        return view('realiza.edit', compact('realiza'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $realiza = Realiza::findOrFail($id);

        $data = $request->validate([
            'id_barbeiro'   => 'required|integer|exists:barbeiros,id',
            'id_agendamento' => 'required|integer|exists:agendamentos,id',
        ]);

        $realiza->update($data);

        return redirect()
            ->route('realiza.show', $realiza)
            ->with('success', 'Relação atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $realiza = Realiza::findOrFail($id);
        $realiza->delete();

        return redirect()
            ->route('realiza.index')
            ->with('success', 'Relação excluída com sucesso!');
    }
}
