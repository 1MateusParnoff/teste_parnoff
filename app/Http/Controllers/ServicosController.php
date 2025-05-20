<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;

class ServicoController extends Controller
{
    public function index()
    {
        $servicos = Servico::all();
        return view('servicos.index', compact('servicos'));
    }

    public function create()
    {
        return view('servicos.create');
    }

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

    public function show($id)
    {
        $servico = Servico::findOrFail($id);
        return view('servicos.show', ['servico' => $servico]);
    }

    public function edit($id)
    {
        $servico = Servico::findOrFail($id);
        return view('servicos.edit', compact('servico'));
    }

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

    public function destroy($id)
    {
        $servico = Servico::findOrFail($id);
        $servico->delete();

        return redirect()
            ->route('servicos.index')
            ->with('success', 'Serviço excluído com sucesso!');
    }
}
