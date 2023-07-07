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
                    <li class="flex justify-between items-center bg-gray-200 pl-3">
                        <div class="flex flex-row gap-1">
                            {{ $ticket->title }}
                            @php
                                $bgcolor = 'bg-green-300';
                                switch ($ticket->priority->id) {
                                    case 1:
                                        $bgcolor = 'bg-green-300';
                                        break;
                                    case 2:
                                        $bgcolor = 'bg-green-500';
                                        break;
                                    case 3:
                                        $bgcolor = 'bg-yellow-500';
                                        break;
                                    case 4:
                                        $bgcolor = 'bg-orange-500';
                                        break;
                                    default:
                                        $bgcolor = 'bg-red-500';
                                        break;
                                }
                            @endphp
                            <div class="{{ $bgcolor }} h-fit px-2 text-xs text-center rounded-xl">
                                <b>{{ $ticket->priority->title }}</b>
                            </div>
                        </div>

                        <x-layout-button href="/{{ auth()->user()->role->title }}/tickets/{{ $ticket->id }}">Editar
                        </x-layout-button>
                    </li>
                @endforeach
            </ul>
        @endif
    </x-layout-content>
</x-layout>
