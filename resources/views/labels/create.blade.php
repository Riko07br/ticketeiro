<header>
    <h1>Criar etiqueta</h1>
</header>

<form method="POST" action="/labels/store" enctype="multipart/form-data">
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

        <a href="/"> Voltar </a>
    </div>
</form>
