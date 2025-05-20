<x-layouts.app>
  <div>
    <h1>{{ $disciplina->nome }}</h1>

    @if($disciplina->descricao)
      <p>{{ $disciplina->descricao }}</p>
    @endif

    <div>
      <a href="{{ route('disciplinas.create') }}">Nova Disciplina</a>
      <a href="{{ url()->previous() }}">Voltar</a>
    </div>
  </div>
</x-layouts.app>