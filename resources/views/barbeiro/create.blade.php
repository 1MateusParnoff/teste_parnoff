<x-layouts.app :title="__('Criar barbeiro')" :dark-mode="auth()->user()->pref_dark_mode">
  <div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Novo Barbeiro</h1>

    <form action="{{ route('barbeiros.store') }}" method="POST" class="space-y-4">
      @csrf

      <div>
        <label for="nome" class="block font-medium">Nome</label>
        <input
          type="text"
          name="nome"
          id="nome"
          value="{{ old('nome') }}"
          placeholder="Ex: João da Silva"
          class="border rounded px-3 py-2 w-full"
          required
        >
      </div>

      <div>
        <label for="especialidade" class="block font-medium">Especialidade</label>
        <select name="especialidade" id="especialidade" class="border rounded px-3 py-2 w-full" required>
          <option value="">Selecione</option>
          <option value="Corte" {{ old('especialidade') == 'Corte' ? 'selected' : '' }}>Corte</option>
          <option value="Barba" {{ old('especialidade') == 'Barba' ? 'selected' : '' }}>Barba</option>
          <option value="Sobrancelha" {{ old('especialidade') == 'Sobrancelha' ? 'selected' : '' }}>Sobrancelha</option>
        </select>
      </div>

      <div class="flex gap-4">
        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
          Criar Barbeiro
        </button>
        <a href="{{ route('barbeiros.index') }}" class="text-blue-600 hover:underline">
          Cancelar
        </a>
      </div>
    </form>
  </div>
</x-layouts.app>
