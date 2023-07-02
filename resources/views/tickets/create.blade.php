<header>
    <h1>Criar ticket</h1>
</header>

<form method="POST" action="/tickets/store" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="user">Selecione o usuario - APAGAR</label>
        <select name="user_id" id="user">
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="title">Título</label>
        <input type="text" name="title" placeholder="Título do ticket" value="{{ old('title') }}" />
        @error('title')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description">Descrição</label>
        <textarea name="description" rows="10" placeholder="">{{ old('description') }}</textarea>
        @error('description')
            <p>{{ $message }}</p>
        @enderror
    </div>

    {{-- <div>
        <label for="category">Selecione a categoria</label>
        <select name="category_id" id="category">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
    </div> --}}

    <div>
        <a>Selecione as categorias</a>
        @foreach ($categories as $category)
            <input type="checkbox" name="categories[]" id="category-{{ $category->id }}" value="{{ $category->id }}">
            <label for="category-{{ $category->id }}">{{ $category->title }}</label>
        @endforeach
    </div>

    <div>
        <a>Selecione as etiquetas</a>
        @foreach ($labels as $label)
            <input type="checkbox" name="labels[]" id="label-{{ $label->id }}" value="{{ $label->id }}">
            <label for="label-{{ $label->id }}">{{ $label->title }}</label>
        @endforeach
    </div>


    <div>
        <button>
            Enviar ticket
        </button>

        <a href="/"> Voltar </a>
    </div>
</form>
