<x-layout>
    <x-layout-header>
        Criar ticket
    </x-layout-header>

    <x-layout-content>
        <div class="bg-gray-200 pl-3 mr-5 mb-5">
            <form method="POST" action="/{{ auth()->user()->role->title }}/tickets" enctype="multipart/form-data"
                class="flex flex-col w-96 space-y-2 pb-2">
                @csrf
                <div class="h-min">
                    <label for="title" class="text-sm mb-1">Título</label>
                    <input type="text" name="title" value="{{ old('title') }}" placeholder=""
                        class="border border-gray-200 rounded p-2 w-full" />
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="h-min">
                    <label for="description" class="text-sm mb-1">Descrição</label>
                    <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" placeholder="">{{ old('description') }}</textarea>
                    @error('description')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col h-min">
                    <p class="text-sm">Categorias</p>
                    <div class="">
                        @foreach ($categories as $category)
                            <input type="checkbox" name="categories[]" id="category-{{ $category->id }}"
                                value="{{ $category->id }}">
                            <label for="category-{{ $category->id }}">{{ $category->title }}</label>
                        @endforeach
                    </div>
                </div>

                <div class="flex flex-col h-min">
                    <p class="text-sm ">Etiquetas</p>
                    <div class="">
                        @foreach ($labels as $label)
                            <input type="checkbox" name="labels[]" id="label-{{ $label->id }}"
                                value="{{ $label->id }}">
                            <label for="category-{{ $label->id }}">{{ $label->title }}</label>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="text-base h-10 w-fit rounded bg-blue-400 right-0 hover:bg-blue-600">
                    <b class="px-5">
                        <i class="fa-solid fa-thumbs-up pr-3"></i>
                        Criar ticket
                    </b>
                </button>
            </form>
        </div>
    </x-layout-content>
</x-layout>
