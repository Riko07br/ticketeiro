<header>
    <h1>Editar Categoria</h1>
</header>

<h3>Editando categoria: {{ $category->title }}</h3>

<form method="POST" action="/categories/{{ $category->id }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Nome da categoria</label>
        <input type="text" name="title" value="{{ $category->title }}" />
        @error('title')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <button>
            Confirmar edição
        </button>

        <a href="/categories"> Voltar </a>
    </div>
</form>
