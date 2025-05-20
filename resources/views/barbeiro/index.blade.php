<x-layouts.app>
<div>
  <h1>Agendamentos - Barbeiro</h1>

  {{-- Mensagem de Sucesso ou Erro --}}
  @if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
  @elseif(session('error'))
    <div style="color: red;">{{ session('error') }}</div>
  @endif

  @if($clientes->isEmpty())
    <p>Não há agendamentos disponíveis no momento.</p>
  @else
    <table style="width: 100%; border-collapse: collapse;">
      <thead>
        <tr>
          <th>Cliente</th>
          <th>Serviço</th>
          <th>Data e Hora</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($clientes as $cliente)
          <tr>
            <td>{{ $cliente->nome }}</td>
            <td>{{ $cliente->servico }}</td>
            <td>{{ \Carbon\Carbon::parse($cliente->horario)->format('d/m/Y H:i') }}</td>
            <td>
              <!-- Ver detalhes do agendamento -->
              <a href="{{ route('barbeiro.show', $cliente->id) }}">Ver</a>

              <!-- Editar agendamento -->
              <a href="{{ route('barbeiro.edit', $cliente->id) }}">Editar</a>

              <!-- Cancelar agendamento -->
              <form action="{{ route('barbeiro.cancelar', $cliente->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" style="background-color: red; color: white;">Cancelar</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @endif
</div>
</x-layouts.app>
