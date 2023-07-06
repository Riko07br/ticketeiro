<x-layout>
    <x-layout-header>
        Editar Etiqueta
    </x-layout-header>

    <x-layout-content>
        <h3>Editando etiqueta: {{ $label->title }}</h3>
        <form method="POST" action="/labels/{{ $label->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="title">Nome da etiqueta</label>
                <input type="text" name="title" value="{{ $label->title }}" />
                @error('title')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <button>
                    Confirmar edição
                </button>

                <a href="/labels"> Voltar </a>
            </div>
        </form>
    </x-layout-content>

</x-layout>
