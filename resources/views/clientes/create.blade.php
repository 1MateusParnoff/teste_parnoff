<x-layouts.app>
  <div>
    <h1>Novo Cliente</h1>

    <form action="{{ route('clientes.store') }}" method="POST">
      @csrf

      <div>
        <label for="nome">Nome</label><br>
        <input
          type="text"
          name="nome"
          id="nome"
          value="{{ old('nome') }}"
          placeholder="Ex: João Silva"
          required
        >
      </div>

      <div style="margin-top:1em;">
        <label for="celular">Celular</label><br>
        <input
          type="text"
          name="celular"
          id="celular"
          value="{{ old('celular') }}"
          placeholder="(00) 00000-0000"
          required
        >
      </div>

      <div style="margin-top:1em;">
        <label for="email">Email</label><br>
        <input
          type="email"
          name="email"
          id="email"
          value="{{ old('email') }}"
          placeholder="email@exemplo.com"
          required
        >
      </div>

      <div style="margin-top:1em;">
        <label for="id_agendamentos">ID Agendamento</label><br>
        <input
          type="number"
          name="id_agendamentos"
          id="id_agendamentos"
          value="{{ old('id_agendamentos') }}"
          required
        >
      </div>

      <div style="margin-top:1em;">
        <button type="submit">Criar Cliente</button>
      </div>
    </form>
  </div>
</x-layouts.app>
