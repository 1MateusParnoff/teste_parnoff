<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicos = Servico::all();
        return view('servicos.index', compact('servicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servicos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome'       => 'required|string|max:255',
            'descricao'  => 'nullable|string',
            'preco'      => 'required|numeric',
            'duracao'    => 'required|date_format:H:i:s',
        ]);

        $servico = Servico::create($data);

        return redirect()
            ->route('servicos.show', $servico)
            ->with('success', 'Serviço criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $servico = Servico::findOrFail($id);
        return view('servicos.show', ['servico' => $servico]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $servico = Servico::findOrFail($id);
        return view('servicos.edit', compact('servico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $servico = Servico::findOrFail($id);
        $data = $request->validate([
            'nome'       => 'required|string|max:255',
            'descricao'  => 'nullable|string',
            'preco'      => 'required|numeric',
            'duracao'    => 'required|date_format:H:i:s',
        ]);

        $servico->update($data);

        return redirect()
            ->route('servicos.show', $servico)
            ->with('success', 'Serviço atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $servico = Servico::findOrFail($id);
        $servico->delete();

        return redirect()
            ->route('servicos.index')
            ->with('success', 'Serviço excluído com sucesso!');
    }
}
