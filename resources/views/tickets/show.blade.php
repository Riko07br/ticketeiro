<x-layout>
    <x-layout-header>
        <p>Ticket: <b>#{{ $ticket->id }}</b></p>
    </x-layout-header>
    <x-layout-content>

        <div class="flex flex-col space-y-2 p-2 mr-5 bg-gray-200">
            <x-ticket-card :ticket='$ticket' />
            <div class="">
                {{ $ticket->description }}
            </div>
            <x-layout-button href="/admin/tickets/{{ $ticket->id }}/edit">
                Editar
            </x-layout-button>
        </div>
    </x-layout-content>
</x-layout>
