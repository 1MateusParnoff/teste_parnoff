<x-layouts.app>
<div>
  <h1>Nova Disciplina</h1>
  {{-- <a href="{{ route('disciplinas.index') }}">Voltar</a> --}}

  <form action="{{ route('disciplinas.store') }}" method="POST">
    @csrf

    <div>
      <label for="nome">Nome da Disciplina</label><br>
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
        placeholder="Descreva brevemente o conteúdo da disciplina"
      ></textarea>
    </div>

    <div style="margin-top:1em;">
      <button type="submit">Criar Disciplina</button>
    </div>
  </form>
</div>

</x-layouts.app>
