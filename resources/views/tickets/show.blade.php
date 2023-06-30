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
        <td>Categoria</td>
        <td>{{ $ticket->category->title }}</td>
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
