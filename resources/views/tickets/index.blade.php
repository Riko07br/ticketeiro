<header>
    <h1>Todos os tickets</h1>
</header>

<a href="/{{ auth()->user()->role->title }}/tickets/create">
    <b>Criar ticket</b>
</a>

@if (count($tickets) == 0)
    <h2>Sem tickets</h2>
@else
    <ul>
        @foreach ($tickets as $ticket)
            <li>
                <a href="/{{ auth()->user()->role->title }}/tickets/{{ $ticket->id }}">
                    {{ $ticket->title }}
                </a>
            </li>
        @endforeach
    </ul>
@endif
