<x-layout>
    <x-layout-header>
        <p>Usuário <b>#{{ $user->id }}</b></p>
    </x-layout-header>

    <x-layout-content>
        <div class="flex flex-row columns-2 space-x-4 items-stretch w-full pr-5">
            <div class="flex flex-col p-4 w-full h-fit space-y-1 border border-gray-700 rounded-lg">
                <p class="text-xl">Dados Pessoais</p>
                <div class="h-min">
                    <label for="role" class="text-sm mb-1">Privilégio</label>
                    <div id="role" class="bg-gray-300 px-2 w-full">
                        {{ $user->role->title }}
                    </div>
                </div>
                <div class="h-min">
                    <label for="name" class="text-sm mb-1">Nome</label>
                    <div id="name" class="bg-gray-300 px-2 w-full">
                        {{ $user->name }}
                    </div>
                </div>
                <div class="h-min">
                    <label for="email" class="text-sm mb-1">E-mail</label>
                    <div id="email" class="bg-gray-300 px-2 w-full">
                        {{ $user->email }}
                    </div>
                </div>
            </div>
            <div class="flex flex-col p-4 w-full h-fit space-y-1 border border-gray-700 rounded-lg">
                <p class="text-xl">Tickets</p>
                <ul class="flex flex-col space-y-1">
                    @foreach ($tickets as $ticket)
                        <a href="/admin/tickets/{{ $ticket->id }}">
                            <li class="w-full px-2 py-1 bg-gray-300 hover:bg-gray-500 hover:rounded-lg">
                                <p class="pb-2">
                                    {{ $ticket->title }}
                                </p>
                                <div class="flex flex-row justify-between w-full">
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
                                    <b class="px-2 rounded {{ $bgcolor }}">{{ $ticket->priority->title }}</b>
                                    <b class="px-2 rounded bg-black text-white">{{ $ticket->stat->title }}</b>
                                </div>
                            </li>
                        </a>
                    @endforeach

                </ul>
            </div>
        </div>
    </x-layout-content>

</x-layout>
