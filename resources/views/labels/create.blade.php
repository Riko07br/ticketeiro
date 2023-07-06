<x-layout>
    <x-layout-header>
        Criar etiqueta
    </x-layout-header>

    <x-layout-content>
        <form method="POST" action="/labels" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="title">Nome da etiqueta</label>
                <input type="text" name="title" placeholder="Etiqueta" value="{{ old('title') }}" />
                @error('title')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <button>
                    Criar etiqueta
                </button>

                <a href="/labels"> Voltar </a>
            </div>
        </form>
    </x-layout-content>

</x-layout>
