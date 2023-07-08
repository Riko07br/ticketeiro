@props(['user'])
<a href="/users/{{ $user->id }}">
    <div class="flex flex-col items-center justify-between overflow-hidden shadow bg-gray-200 h-24 w-56 rounded-xl ">
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
        <p>{{ $user->name }} </p>
        <div class="flex row w-full h-8 bg-blue-400">
            <button type="button" class="w-1/2 text-base hover:bg-blue-600">
                <b>
                    <i class="fa-sharp fa-solid fa-ticket-simple pr-1"></i>
                    Tickets
                </b>
            </button>
            <button type="button" class="w-1/2 text-base hover:bg-blue-600">
                <b>
                    <i class="fa-solid fa-pen-to-square pr-1"></i>
                    Editar
                </b>
            </button>
        </div>
    </div>
</a>
