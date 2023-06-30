<h1>Usuário</h1>
<h2>{{ $user->name }}</h2>
<ul>
    @foreach ($tickets as $ticket)
        <li>
            <a href="/tickets/{{ $ticket->id }}">
                {{ $ticket->title }}
            </a>
        </li>
    @endforeach

</ul>
