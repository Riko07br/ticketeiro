<x-layout>
    <x-layout-header>
        Usuário
    </x-layout-header>

    <x-layout-content>
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
    </x-layout-content>

</x-layout>
