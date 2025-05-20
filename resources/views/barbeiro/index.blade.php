<x-layouts.app>
  <div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Lista de Barbeiros</h1>

    <a href="{{ route('barbeiro.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded mb-4 inline-block">
      Adicionar Barbeiro
    </a>

    <ul>
      @foreach($barbeiros as $barbeiro)
        <li class="mb-2">
          <a href="{{ route('barbeiro.show', $barbeiro) }}" class="text-blue-600 hover:underline">
            {{ $barbeiro->nome }} - {{ $barbeiro->especialidade }}
          </a>
        </li>
      @endforeach
    </ul>
  </div>
</x-layouts.app>
