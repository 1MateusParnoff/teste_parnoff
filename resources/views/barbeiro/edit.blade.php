<x-layouts.app :title="__('Editar barbeiro')" :dark-mode="auth()->user()->pref_dark_mode">
  <div>
    <h1>Editar barbeiro</h1>

    <form action="{{ route('barbeiros.update', $barbeiro) }}" method="POST">
      @csrf
      @method('PUT')

      <div>
        <label for="nome">Nome</label><br>
        <input
          type="text"
          name="nome"
          id="nome"
          value="{{ old('nome', $barbeiro->nome) }}"
          required
        >
      </div>

      <div style="margin-top:1em;">
        <label for="descricao">Descrição</label><br>
        <textarea
          name="descricao"
          id="descricao"
          rows="4"
        >{{ old('descricao', $barbeiro->descricao) }}</textarea>
      </div>

      <div style="margin-top:1em;">
        <button type="submit">Atualizar</button>
        <a href="{{ route('barbeiros.show', $barbeiro) }}">Cancelar</a>
      </div>
    </form>
  </div>
</x-layouts.app>
