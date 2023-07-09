@props(['user'])

<div class="flex flex-col items-center justify-between overflow-hidden shadow bg-gray-200 h-16 w-56 rounded-xl ">
    <div class="flex flex-row w-full justify-between px-2 pt-1">
        @switch($user->role->id)
            @case(1)
                <i class="fa-solid fa-user-tie"></i>
                <div class="text-xs px-1 bg-blue-300 rounded">
                    X
                </div>
            @break

            @case(2)
                <i class="fa-solid fa-image-portrait"></i>
                <div class="text-xs px-1 bg-blue-300 rounded">
                    {{ $user->agent_tickets->count() }}
                </div>
            @break

            @default
                <i class="fa-solid fa-user"></i>
                <div class="text-xs px-1 bg-blue-300 rounded">
                    {{ $user->user_tickets->count() }}
                </div>
        @endswitch

    </div>
    <a href="/users/{{ $user->id }}" class="h-full w-full text-center">
        <b>{{ $user->name }}</b>
    </a>

</div>
