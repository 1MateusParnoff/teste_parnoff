<x-layouts.app>
  <div class="container-box">
    <h1 class="title">Lista de Barbeiros</h1>

    <a href="{{ route('barbeiro.create') }}" class="btn btn-green mb-4 inline-block">
      Adicionar Barbeiro
    </a>

    <ul>
      @foreach($barbeiro as $barbeiro)
        <li class="list-item">
          <span>{{ $barbeiro->nome }} - {{ $barbeiro->especialidade }}</span>

          <a href="{{ route('barbeiro.show', $barbeiro) }}" class="link ml-2">
            Ver
          </a>

          <a href="{{ route('barbeiro.edit', $barbeiro) }}" class="btn btn-blue ml-2">
            Editar
          </a>
        </li>
      @endforeach
    </ul>
  </div>
</x-layouts.app>
