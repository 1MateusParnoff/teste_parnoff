@extends('layouts.app')

@section('content')
    <h1>Detalhes do Barbeiro</h1>

    <p><strong>Nome:</strong> {{ $barbeiro->nome }}</p>
    <p><strong>Especialidade:</strong> {{ $barbeiro->especialidade }}</p>

    <a href="{{ route('barbeiro.index') }}">Voltar</a>
@endsection
