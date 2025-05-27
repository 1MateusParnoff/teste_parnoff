@extends('layouts.app')

@section('content')
    <h1>Lista de Barbeiros</h1>

    <a href="{{ route('barbeiro.create') }}">Novo Barbeiro</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Especialidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barbeiros as $barbeiro)
                <tr>
                    <td>{{ $barbeiro->id }}</td>
                    <td>{{ $barbeiro->nome }}</td>
                    <td>{{ $barbeiro->especialidade }}</td>
                    <td>
                        <a href="{{ route('barbeiro.show', $barbeiro->id) }}">Ver</a>
                        <a href="{{ route('barbeiro.edit', $barbeiro->id) }}">Editar</a>
                        <form action="{{ route('barbeiro.destroy', $barbeiro->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
