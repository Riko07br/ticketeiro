<header>
    <h1>Criar categoria</h1>
</header>

<form method="POST" action="/categories/store" enctype="multipart/form-data">
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

        <a href="/"> Voltar </a>
    </div>
</form>
