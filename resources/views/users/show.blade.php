<header>
    <h1>Usuário</h1>
</header>

<h2>{{ $user->name }}</h2>
<ul>
    @foreach ($tickets as $ticket)
        <li>
            <a href="/admin/tickets/{{ $ticket->id }}">
                {{ $ticket->title }}
            </a>
        </li>
    @endforeach

</ul>
