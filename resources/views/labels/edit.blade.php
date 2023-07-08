<x-layout>
    <x-layout-header>
        <p>Editar etiqueta: <b> #{{ $label->id }}</b></p>
    </x-layout-header>

    <x-layout-content>
        <div class="text-xl pb-3">
            Nome atual: <b>{{ $label->title }}</b>
        </div>
        <div class="bg-gray-200 pl-3 mr-5 mb-5">
            <form method="POST" action="/labels/{{ $label->id }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="inline-block h-min w-60 py-5 pr-2">
                    <label for="title" class="text-sm mb-1">Renomear etiqueta</label>
                    <input type="text" name="title" value="{{ $label->title }}"
                        class="border border-gray-200 rounded p-2 w-full" />
                    @error('title')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="text-base h-10 rounded bg-blue-400 right-0 hover:bg-blue-600">
                    <b class="px-5">
                        <i class="fa-solid fa-thumbs-up pr-3"></i>
                        Confirmar
                    </b>
                </button>
            </form>
        </div>
    </x-layout-content>

</x-layout>
