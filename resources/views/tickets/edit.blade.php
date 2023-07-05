<header>
    <h1>Editar ticket</h1>
</header>

<h3>Editando ticket: {{ $ticket->id }}</h3>

<form method="POST" action="/{{ auth()->user()->role->title }}/tickets/{{ $ticket->id }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Título</label>
        <input type="text" name="title" placeholder="Título do ticket" value="{{ $ticket->title }}" />
        @error('title')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description">Descrição</label>
        <textarea name="description" rows="10" placeholder="">{{ $ticket->description }}</textarea>
        @error('description')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <a>Selecione as categorias</a>
        @foreach ($categories as $category)
            <input type="checkbox" name="categories[]" id="category-{{ $category->id }}" value="{{ $category->id }}"
                @if (in_array($category->id, $ticket->categories->pluck('id')->toArray())) checked @endif>
            <label for="category-{{ $category->id }}">{{ $category->title }}</label>
        @endforeach
    </div>

    <div>
        <a>Selecione as etiquetas</a>
        @foreach ($labels as $label)
            <input type="checkbox" name="labels[]" id="label-{{ $label->id }}" value="{{ $label->id }}"
                @if (in_array($label->id, $ticket->labels->pluck('id')->toArray())) checked @endif>
            <label for="label-{{ $label->id }}">{{ $label->title }}</label>
        @endforeach
    </div>

    <div>
        <button>
            Confirmar edição
        </button>

        <a href="/"> Voltar </a>
    </div>
</form>
