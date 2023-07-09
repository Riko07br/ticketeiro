<x-layout>
    <x-layout-header>
        Tickets

        <x-layout-button href="/{{ auth()->user()->role->title }}/tickets/create">
            <i class="fa-solid fa-plus pr-3"></i>
            Criar ticket
        </x-layout-button>
    </x-layout-header>

    <x-layout-content>

        @if (count($tickets) == 0)
            <h2>Sem tickets</h2>
        @else
            <ul class="pr-5 space-y-1">
                @foreach ($tickets as $ticket)
                    <li>
                        <x-ticket-card :ticket='$ticket' />
                    </li>
                @endforeach
            </ul>
        @endif
    </x-layout-content>
</x-layout>
