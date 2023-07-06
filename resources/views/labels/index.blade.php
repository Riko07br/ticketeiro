<x-layout>
    <x-layout-header>
        Etiquetas
        <x-layout-button href="/labels/create">
            <i class="fa-solid fa-plus pr-3"></i>
            Criar etiqueta
        </x-layout-button>
    </x-layout-header>

    <x-layout-content>
        @if (count($labels) == 0)
            <h2>Sem etiquetas</h2>
        @else
            <ul class="pr-5 space-y-1">
                @foreach ($labels as $label)
                    <li class="flex justify-between items-center bg-gray-200  pl-3">
                        <div>{{ $label->title }} <a
                                class="rounded w-3 px-1 bg-blue-400">{{ $label->tickets->count() }}</a>
                        </div>
                        <x-layout-button href="/labels/{{ $label->id }}/edit">Editar</x-layout-button>
                    </li>
                @endforeach
            </ul>
        @endif
    </x-layout-content>
</x-layout>
