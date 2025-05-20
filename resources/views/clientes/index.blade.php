<x-layouts.app :title="__('Minhas Disciplinas')">
  <div>
    <div>
      <h1>Minhas Disciplinas</h1>
      <a href="{{ route('disciplinas.create') }}">+ Nova Disciplina</a>
    </div>

    @if($disciplinas->isEmpty())
      <p>Nenhuma disciplina cadastrada.</p>
    @else
      <table border="1" cellpadding="8" cellspacing="0">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach($disciplinas as $disciplina)
            <tr>
              <td>{{ $disciplina->nome }}</td>
              <td title="{{ $disciplina->descricao }}">
                {{ ($disciplina->descricao) }}
              </td>
              <td>
                <a href="{{ route('disciplinas.show', $disciplina) }}">Ver</a>
                |
                <a href="{{ route('disciplinas.edit', $disciplina) }}">Editar</a>
                |
                <form action="{{ route('disciplinas.destroy', $disciplina) }}" method="POST" style="display:inline" onsubmit="return confirm('Tem certeza que deseja excluir esta disciplina?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit">Excluir</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
</x-layouts.app>
