<x-layout>
    <x-layout-header>
        Tickets
        {{-- <button type="button" class="text-base h-10 rounded bg-blue-400 right-0 hover:bg-blue-600"
            href="/{{ auth()->user()->role->title }}/tickets/create">
            <b class="px-5">Criar ticket</b>
        </button> --}}
        <x-layout-button href="/{{ auth()->user()->role->title }}/tickets/create">
            <i class="fa-solid fa-plus pr-3"></i>
            Criar ticket
        </x-layout-button>

    </x-layout-header>

    <x-layout-content>

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
    </x-layout-content>
</x-layout>
