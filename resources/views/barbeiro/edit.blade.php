@extends('layouts.app')

@section('content')
    <h1>Editar Barbeiro</h1>

    <form action="{{ route('barbeiro.update', $barbeiro->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome', $barbeiro->nome) }}">
        </div>

        <div>
            <label for="especialidade">Especialidade:</label>
            <select name="especialidade" id="especialidade">
                <option value="">Selecione</option>
                <option value="Corte" {{ old('especialidade', $barbeiro->especialidade) == 'Corte' ? 'selected' : '' }}>Corte</option>
                <option value="Barba" {{ old('especialidade', $barbeiro->especialidade) == 'Barba' ? 'selected' : '' }}>Barba</option>
                <option value="Sobrancelha" {{ old('especialidade', $barbeiro->especialidade) == 'Sobrancelha' ? 'selected' : '' }}>Sobrancelha</option>
            </select>
        </div>

        <div>
            <button type="submit">Salvar</button>
            <a href="{{ route('barbeiro.index') }}">Cancelar</a>
        </div>
    </form>
@endsection
