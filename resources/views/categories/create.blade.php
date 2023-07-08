<x-layout>
    <x-layout-header>
        Criar categoria
    </x-layout-header>

    <x-layout-content>
        <div class="bg-gray-200 pl-3 mr-5 mb-5">
            <form method="POST" action="/categories" enctype="multipart/form-data"
                class="flex flex-col w-96 space-y-2 pb-2">
                @csrf
                <div class="h-min">
                    <label for="title" class="text-sm mb-1">Nome da categoria</label>
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Categoria"
                        class="border border-gray-200 rounded p-2 w-full" />
                    @error('title')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="h-min">
                    <label for="description" class="text-sm mb-1">Descrição</label>
                    <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" placeholder="Descrição">{{ old('description') }}</textarea>
                    @error('description')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="text-base h-10 w-fit rounded bg-blue-400 right-0 hover:bg-blue-600">
                    <b class="px-5">
                        <i class="fa-solid fa-plus pr-3"></i>
                        Criar categoria
                    </b>
                </button>
            </form>
        </div>
    </x-layout-content>
</x-layout>
