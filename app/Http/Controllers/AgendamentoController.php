<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Agendamento;
use App\Models\Cliente;
use App\Models\Barbeiro;

class AgendamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Se quiser filtrar só os agendamentos criados pelo usuário logado, mantenha a condição abaixo,
        // caso contrário, remova o where.
        $agendamentos = Agendamento::where('created_by', Auth::id())->with(['cliente', 'barbeiro'])->get();

        return view('agendamento.index', compact('agendamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        $barbeiros = Barbeiro::all();

        return view('agendamento.create', compact('clientes', 'barbeiros'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'data_hora'     => 'required|date_format:Y-m-d H:i:s',
            'status'        => 'required|string|max:255',
            'id_barbeiro'   => 'required|integer|exists:barbeiros,id',
            'id_cliente'    => 'required|integer|exists:clientes,id',
        ]);

        $data['created_by'] = Auth::id();

        $agendamento = Agendamento::create($data);

        return redirect()
            ->route('agendamento.show', $agendamento)
            ->with('success', 'Agendamento criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $agendamento = Agendamento::with(['cliente', 'barbeiro'])->findOrFail($id);

        // Verifica se o usuário é o criador (pode remover se quiser acesso aberto)
        if ($agendamento->created_by !== Auth::id()) {
            abort(403);
        }

        return view('agendamento.show', compact('agendamento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $agendamento = Agendamento::findOrFail($id);

        if ($agendamento->created_by !== Auth::id()) {
            abort(403);
        }

        $clientes = Cliente::all();
        $barbeiros = Barbeiro::all();

        return view('agendamento.edit', compact('agendamento', 'clientes', 'barbeiros'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $agendamento = Agendamento::findOrFail($id);

        if ($agendamento->created_by !== Auth::id()) {
            abort(403);
        }

        $data = $request->validate([
            'data_hora'     => 'required|date_format:Y-m-d H:i:s',
            'status'        => 'required|string|max:255',
            'id_barbeiro'   => 'required|integer|exists:barbeiros,id',
            'id_cliente'    => 'required|integer|exists:clientes,id',
        ]);

        $agendamento->update($data);

        return redirect()
            ->route('agendamento.show', $agendamento)
            ->with('success', 'Agendamento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $agendamento = Agendamento::findOrFail($id);

        if ($agendamento->created_by !== Auth::id()) {
            abort(403);
        }

        $agendamento->delete();

        return redirect()
            ->route('agendamento.index')
            ->with('success', 'Agendamento excluído com sucesso!');
    }
}
