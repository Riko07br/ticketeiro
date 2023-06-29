@if (count($tickets) == 0)
    <h1>Sem tickets</h1>
@else
    @foreach ($tickets as $ticket)
        <a href="/tickets/{{ $ticket->id }}">
            <h1>{{ $ticket->title }}</h1>
        </a>
        <p>{{ $ticket->description }}</p>
    @endforeach

@endif
