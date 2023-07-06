<x-layout>
    <x-layout-header>
        Etiquetas
    </x-layout-header>

    <x-layout-content>
        @if (count($labels) == 0)
            <h2>Sem etiquetas</h2>
        @else
            <ul class="pr-5 space-y-1">
                <li class="bg-gray-200 pl-3 mb-5">
                    <form method="POST" action="/labels" enctype="multipart/form-data" class="inline-block">
                        @csrf
                        <div class="inline-block h-min w-60 py-5 pr-2">
                            <label for="title" class="text-sm mb-1">Nova etiqueta</label>
                            <input type="text" name="title" class="border border-gray-200 rounded p-2 w-full"
                                placeholder="Etiqueta" value="{{ old('title') }}" />
                            @error('title')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="text-base h-10 rounded bg-blue-400 right-0 hover:bg-blue-600">
                            <b class="px-5">
                                <i class="fa-solid fa-plus pr-3"></i>
                                Adicionar
                            </b>
                        </button>
                    </form>
                </li>

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
