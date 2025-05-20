<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cliente;

class ClienteController extends Controller
{
    
    public function index()
    {
        
        $clientes = Cliente::where('created_by', Auth::id())->get();

        return view('cliente.index', compact('clientes'));
    }

    public function create()
    {
        return view('cliente.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome'      => 'required|string|max:255',
            'celular'   => 'required|string|max:20',
            'email'     => 'required|email|max:255',
            'id_agendamentos' => 'nullable|integer', 
        ]);

        $data['created_by'] = Auth::id();

        $cliente = Cliente::create($data);

        return redirect()
            ->route('cliente.show', $cliente)
            ->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function show(string $id)
    {
        $cliente = Cliente::findOrFail($id);

        if ($cliente->created_by !== Auth::id()) {
            abort(403);
        }

        return view('cliente.show', compact('cliente'));
    }

    public function edit(string $id)
    {
        $cliente = Cliente::findOrFail($id);

        if ($cliente->created_by !== Auth::id()) {
            abort(403);
        }

        return view('cliente.edit', compact('cliente'));
    }

    public function update(Request $request, string $id)
    {
        $cliente = Cliente::findOrFail($id);

        if ($cliente->created_by !== Auth::id()) {
            abort(403);
        }

        $data = $request->validate([
            'nome'      => 'required|string|max:255',
            'celular'   => 'required|string|max:20',
            'email'     => 'required|email|max:255',
            'id_agendamentos' => 'nullable|integer',
        ]);

        $cliente->update($data);

        return redirect()
            ->route('cliente.show', $cliente)
            ->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $cliente = Cliente::findOrFail($id);

        if ($cliente->created_by !== Auth::id()) {
            abort(403);
        }

        $cliente->delete();

        return redirect()
            ->route('cliente.index')
            ->with('success', 'Cliente excluído com sucesso!');
    }
}
