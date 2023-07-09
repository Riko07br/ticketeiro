@props(['ticket'])

<div class="flex flex-col space-y-2 text-xs w-full p-2 bg-gray-200">
    <div class="flex flex-row justify-between space-x-1 items-center">
        <a href="/users/{{ $ticket->user->id }}" class="p-1 rounded hover:bg-blue-600">
            <i class="fa-solid fa-user pr-1"></i>
            {{ $ticket->user->name }}
        </a>
        @if ($ticket->agent)
            <a href="/users/{{ $ticket->agent->id }}" class="p-1 rounded hover:bg-blue-600">
                <i class="fa-solid fa-image-portrait pr-1"></i>
                {{ $ticket->agent->name }}
            </a>
        @else
            <a class="p-1 rounded hover:bg-blue-600">
                <i class="fa-solid fa-image-portrait pr-1"></i>
                Não definido
            </a>
        @endif
    </div>

    <a href="/{{ auth()->user()->role->title }}/tickets/{{ $ticket->id }}"
        class="text-base pb-2 w-full text-blue-400 hover:text-blue-600">
        {{ $ticket->title }}
    </a>

    <x-tag type='stat' :prop='$ticket->stat' />
    <x-tag type='priority' :prop='$ticket->priority' />
    <div class="flex flex-row space-x-1">
        @foreach ($ticket->categories as $category)
            <div class="border border-black h-fit px-2 rounded-xl">
                {{ $category->title }}
            </div>
        @endforeach

    </div>
    <div class="flex flex-row space-x-1">
        @foreach ($ticket->labels as $label)
            <div class="border border-black h-fit px-2 text-center">
                {{ $label->title }}
            </div>
        @endforeach
    </div>
</div>
