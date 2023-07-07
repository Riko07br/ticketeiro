<x-layout>
    <x-layout-header>
        Categorias

        <x-layout-button href="/categories/create">
            <i class="fa-solid fa-plus pr-3"></i>
            Criar categoria
        </x-layout-button>
    </x-layout-header>

    <x-layout-content>
        @if (count($categories) == 0)
            <h2>Sem categorias</h2>
        @else
            <ul class="pr-5 space-y-1">
                @foreach ($categories as $category)
                    <li class="flex justify-between items-center bg-gray-200  pl-3">
                        <div>
                            {{ $category->title }}
                        </div>
                        <x-layout-button href="/categories/{{ $category->id }}/edit">Editar</x-layout-button>
                    </li>
                @endforeach
            </ul>
        @endif
    </x-layout-content>

</x-layout>
