<x-layouts.app :title="__('Editar Disciplina')" :dark-mode="auth()->user()->pref_dark_mode">
  <div>
    <h1>Editar Disciplina</h1>

    <form action="{{ route('disciplinas.update', $disciplina) }}" method="POST">
      @csrf
      @method('PUT')

      <div>
        <label for="nome">Nome</label><br>
        <input
          type="text"
          name="nome"
          id="nome"
          value="{{ old('nome', $disciplina->nome) }}"
          required
        >
      </div>

      <div style="margin-top:1em;">
        <label for="descricao">Descrição</label><br>
        <textarea
          name="descricao"
          id="descricao"
          rows="4"
        >{{ old('descricao', $disciplina->descricao) }}</textarea>
      </div>

      <div style="margin-top:1em;">
        <button type="submit">Atualizar</button>
        <a href="{{ route('disciplinas.show', $disciplina) }}">Cancelar</a>
      </div>
    </form>
  </div>
</x-layouts.app>
