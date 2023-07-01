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

</table>
