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
        <label for="stat_id">Status: </label>
        <select name="stat_id" id="stat_id">
            @foreach ($stats as $stat)
                <option value="{{ $stat->id }}" @if ($ticket->stat->id == $stat->id) selected @endif>
                    {{ $stat->title }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="priority_id">Prioridade: </label>
        <select name="priority_id" id="priority_id">
            @foreach ($priorities as $priority)
                <option value="{{ $priority->id }}" @if ($ticket->priority->id == $priority->id) selected @endif>
                    {{ $priority->title }}
                </option>
            @endforeach
        </select>
    </div>

    @if (auth()->user()->role->title == 'admin')
        <div>
            <label for="agent_id">Agente: </label>
            <select name="agent_id" id="agent_id">
                @foreach ($agents as $agent)
                    <option value="{{ $agent->id }}" @if ($ticket->agent && $ticket->agent->id == $agent->id) selected @endif>
                        {{ $agent->name }}
                    </option>
                @endforeach
            </select>
        </div>
    @endif

    <div>
        <button>
            Confirmar edição
        </button>

        <a href="/{{ auth()->user()->role->title }}/tickets/{{ $ticket->id }}"> Voltar </a>
    </div>
</form>
