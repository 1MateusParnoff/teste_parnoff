<x-layouts.app>
  <div>
    <h1>{{ $barbeiro->nome }}</h1>

    @if($barbeiro->descricao)
      <p>{{ $barbeiro->descricao }}</p>
    @endif

    <div>
      <a href="{{ route('barbeiro.create') }}">Nova Disciplina</a>
      <a href="{{ url()->previous() }}">Voltar</a>
    </div>
  </div>
</x-layouts.app>