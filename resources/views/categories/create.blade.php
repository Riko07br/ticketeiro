<x-layout>
    <x-layout-header>
        Criar categoria
    </x-layout-header>

    <x-layout-content>
        <form method="POST" action="/categories" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="title">Nome da categoria</label>
                <input type="text" name="title" placeholder="Categoria" value="{{ old('title') }}" />
                @error('title')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <button>
                    Criar categoria
                </button>

                <a href="/categories"> Voltar </a>
            </div>
        </form>

    </x-layout-content>
</x-layout>
