@extends('layouts.app')

@section('content')
    <h1>Criar Barbeiro</h1>

    <form action="{{ route('barbeiro.store') }}" method="POST">
        @csrf

        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome') }}">
        </div>

        <div>
            <label for="especialidade">Especialidade:</label>
            <select name="especialidade" id="especialidade">
                <option value="">Selecione</option>
                <option value="Corte" {{ old('especialidade') == 'Corte' ? 'selected' : '' }}>Corte</option>
                <option value="Barba" {{ old('especialidade') == 'Barba' ? 'selected' : '' }}>Barba</option>
                <option value="Sobrancelha" {{ old('especialidade') == 'Sobrancelha' ? 'selected' : '' }}>Sobrancelha</option>
            </select>
        </div>

        <div>
            <button type="submit">Criar</button>
            <a href="{{ route('barbeiro.index') }}">Cancelar</a>
        </div>
    </form>
@endsection
