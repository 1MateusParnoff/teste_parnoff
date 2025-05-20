<x-layouts.app :title="__('Editar barbeiro')" :dark-mode="auth()->user()->pref_dark_mode">
  <div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Editar barbeiro</h1>

    <form action="{{ route('barbeiros.update', $barbeiro) }}" method="POST" class="space-y-4">
      @csrf
      @method('PUT')

      <div>
        <label for="nome" class="block font-medium">Nome</label>
        <input
          type="text"
          name="nome"
          id="nome"
          value="{{ old('nome', $barbeiro->nome) }}"
          class="border rounded px-3 py-2 w-full"
          required
        >
      </div>

      <div>
        <label for="especialidade" class="block font-medium">Especialidade</label>
        <select name="especialidade" id="especialidade" class="border rounded px-3 py-2 w-full" required>
          <option value="">Selecione</option>
          <option value="Corte" {{ old('especialidade', $barbeiro->especialidade) == 'Corte' ? 'selected' : '' }}>Corte</option>
          <option value="Barba" {{ old('especialidade', $barbeiro->especialidade) == 'Barba' ? 'selected' : '' }}>Barba</option>
          <option value="Sobrancelha" {{ old('especialidade', $barbeiro->especialidade) == 'Sobrancelha' ? 'selected' : '' }}>Sobrancelha</option>
        </select>
      </div>

      <div class="flex gap-4">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
          Atualizar
        </button>
        <a href="{{ route('barbeiros.show', $barbeiro) }}" class="text-blue-600 hover:underline">
          Cancelar
        </a>
      </div>
    </form>
  </div>
</x-layouts.app>
