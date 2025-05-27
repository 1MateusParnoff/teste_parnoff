<x-layouts.app :title="__('Meus Clientes')">
  <div>
    <div>
      <h1>Meus Clientes</h1>
      <a href="{{ route('clientes.create') }}">+ Novo Cliente</a>
    </div>

    @if($clientes->isEmpty())
      <p>Nenhum cliente cadastrado.</p>
    @else
      <table border="1" cellpadding="8" cellspacing="0">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Celular</th>
            <th>Email</th>
            <th>ID Agendamento</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach($clientes as $cliente)
            <tr>
              <td>{{ $cliente->nome }}</td>
              <td>{{ $cliente->celular }}</td>
              <td>{{ $cliente->email }}</td>
              <td>{{ $cliente->id_agendamentos }}</td>
              <td>
                <a href="{{ route('clientes.show', $cliente) }}">Ver</a>
                |
                <a href="{{ route('clientes.edit', $cliente) }}">Editar</a>
                |
                <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" style="display:inline" onsubmit="return confirm('Tem certeza que deseja excluir este cliente?')">
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
