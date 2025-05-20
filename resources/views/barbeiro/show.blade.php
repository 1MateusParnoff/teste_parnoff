<x-layouts.app>
  <div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">{{ $barbeiro->nome }}</h1>

    <p class="text-gray-700 mb-4">
      <strong>Especialidade:</strong> {{ $barbeiro->especialidade }}
    </p>

    <div class="flex gap-4">
      <a href="{{ route('barbeiro.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
        Novo Barbeiro
      </a>
      <a href="{{ url()->previous() }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
        Voltar
      </a>
    </div>
  </div>
</x-layouts.app>
