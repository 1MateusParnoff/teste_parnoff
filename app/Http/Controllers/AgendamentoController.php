<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Agendamento;
use App\Models\Cliente;
use App\Models\Barbeiro;

class AgendamentoController extends Controller
{
    public function index()
    {
        $agendamentos = Agendamento::where('created_by', Auth::id())->with(['cliente', 'barbeiro'])->get();

        return view('agendamento.index', compact('agendamentos'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $barbeiros = Barbeiro::all();

        return view('agendamento.create', compact('clientes', 'barbeiros'));
    }

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

    public function show(string $id)
    {
        $agendamento = Agendamento::with(['cliente', 'barbeiro'])->findOrFail($id);

        if ($agendamento->created_by !== Auth::id()) {
            abort(403);
        }

        return view('agendamento.show', compact('agendamento'));
    }

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
