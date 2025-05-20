<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Realiza;

class RealizaController extends Controller
{
    
    public function index()
    {
       
        $realizacoes = Realiza::all();
        return view('realiza.index', compact('realizacoes'));
    }

    
    public function create()
    {
        return view('realiza.create');
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_barbeiro'   => 'required|integer|exists:barbeiros,id',
            'id_agendamento' => 'required|integer|exists:agendamentos,id',
        ]);


        $realiza = Realiza::create($data);

        return redirect()
            ->route('realiza.show', $realiza)
            ->with('success', 'Relação criada com sucesso!');
    }

    public function show($id)
    {
        $realiza = Realiza::findOrFail($id);
        return view('realiza.show', ['realiza' => $realiza]);
    }

    public function edit($id)
    {
        $realiza = Realiza::findOrFail($id);
        return view('realiza.edit', compact('realiza'));
    }

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

    public function destroy($id)
    {
        $realiza = Realiza::findOrFail($id);
        $realiza->delete();

        return redirect()
            ->route('realiza.index')
            ->with('success', 'Relação excluída com sucesso!');
    }
}
