<x-layouts.app>
<div>
  <h1>Barbeiro</h1>
  {{-- <a href="{{ route('barbeiro.index') }}">Voltar</a> --}}

  <form action="{{ route('barbeiro.store') }}" method="POST">
    @csrf

    <div>
      <label for="nome">Barbeiro</label><br>
      <input
        type="text"
        name="nome"
        id="nome"
        value="{{ old('nome') }}"
        placeholder="Ex: Introdução à Programação"
        required
      >
    </div>

    <div style="margin-top:1em;">
      <label for="descricao">Descrição</label><br>
      <textarea
        name="descricao"
        id="descricao"
        rows="4"
        placeholder="Cortes Disponiveis"
      ></textarea>
    </div>

    <div style="margin-top:1em;">
      <button type="submit">Criar barbeiro</button>
    </div>
  </form>
</div>

</x-layouts.app>
