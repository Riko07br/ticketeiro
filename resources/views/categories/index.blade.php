<x-layout>
    <x-layout-header>
        Todas as categorias

        <x-layout-button href="/categories/create">
            <i class="fa-solid fa-plus pr-3"></i>
            Criar categoria
        </x-layout-button>
    </x-layout-header>

    <x-layout-content>
        @if (count($categories) == 0)
            <h2>Sem categorias</h2>
        @else
            <ul>
                @foreach ($categories as $category)
                    <li>
                        {{ $category->title }} - <a href="/categories/{{ $category->id }}/edit">editar</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </x-layout-content>

</x-layout>
