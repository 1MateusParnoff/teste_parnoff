<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barbearia;

class BarbeariaController extends Controller
{
    public function index()
    {
        $barbearias = Barbearia::all();
        return view('barbearias.index', compact('barbearias'));
    }

    public function create()
    {
        return view('barbearias.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome'     => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
            'email'    => 'required|string|email|max:255',
            'endereco' => 'required|string|max:500',
        ]);

        $barbearia = Barbearia::create($data);

        return redirect()
            ->route('barbearias.show', $barbearia)
            ->with('success', 'Barbearia criada com sucesso!');
    }

    public function show($id)
    {
        $barbearia = Barbearia::findOrFail($id);
        return view('barbearias.show', compact('barbearia'));
    }

    public function edit($id)
    {
        $barbearia = Barbearia::findOrFail($id);
        return view('barbearias.edit', compact('barbearia'));
    }

    public function update(Request $request, $id)
    {
        $barbearia = Barbearia::findOrFail($id);

        $data = $request->validate([
            'nome'     => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
            'email'    => 'required|string|email|max:255',
            'endereco' => 'required|string|max:500',
        ]);

        $barbearia->update($data);

        return redirect()
            ->route('barbearias.show', $barbearia)
            ->with('success', 'Barbearia atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $barbearia = Barbearia::findOrFail($id);
        $barbearia->delete();

        return redirect()
            ->route('barbearias.index')
            ->with('success', 'Barbearia excluída com sucesso!');
    }
}
