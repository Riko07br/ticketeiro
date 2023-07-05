<header>
    <h1>Ticket</h1>
</header>

<table>
    <tr>
        <td>Título</td>
        <td>{{ $ticket->title }}</td>
    </tr>
    <tr>
        <td>Descrição</td>
        <td>{{ $ticket->description }}</td>
    </tr>
    <tr>
        <td>Categorias</td>
        <td>
            @foreach ($ticket->categories as $category)
                {{ $category->title }} /
            @endforeach
        </td>
    </tr>
    <tr>
        <td>Labels</td>
        <td>
            @foreach ($ticket->labels as $label)
                {{ $label->title }} /
            @endforeach
        </td>
    </tr>
    <tr>
        <td>Status</td>
        <td>{{ $ticket->stat->title }}</td>
    </tr>
    <tr>
        <td>Prioridade</td>
        <td>{{ $ticket->priority->title }}</td>
    </tr>

    @if (auth()->user()->role->title == 'admin')
        <tr>
            <td>Usuário: </td>
            <td><a href="/admin/users/{{ $ticket->user->id }}">{{ $ticket->user->name }}</a></td>
        </tr>

        <tr>
            <td>Agente: </td>
            <td>
                @if ($ticket->agent)
                    <a href="/admin/users/{{ $ticket->agent->id }}">{{ $ticket->agent->name }}</a>
                @else
                    Sem agente definido
                @endif
            </td>
        </tr>

        <tr>
            <td><a href="/admin/tickets/{{ $ticket->id }}/edit">Editar</a></td>
            <td>
                <form method="POST" action="/{{ auth()->user()->role->title }}/tickets/{{ $ticket->id }}">
                    @csrf
                    @method('DELETE')
                    <button>Deletar</button>
                </form>
            </td>
        </tr>
    @endif

    @if (auth()->user()->role->title == 'agent')
        <tr>
            <td>Usuário: </td>
            <td>{{ $ticket->user->name }}</td>
        </tr>
        <tr>
            <td><a href="/{{ auth()->user()->role->title }}/tickets/{{ $ticket->id }}/edit">Editar</a></td>
            <td>
            </td>
        </tr>
    @endif
</table>
