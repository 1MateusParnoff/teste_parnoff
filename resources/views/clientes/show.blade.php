<x-layouts.app>
  <div>
    <h1>{{ $cliente->nome }}</h1>

    <p>Celular: {{ $cliente->celular }}</p>
    <p>Email: {{ $cliente->email }}</p>
    <p>ID Agendamento: {{ $cliente->id_agendamentos }}</p>

    <div>
      <a href="{{ route('clientes.create') }}">Novo Cliente</a>
      <a href="{{ url()->previous() }}">Voltar</a>
    </div>
  </div>
</x-layouts.app>
