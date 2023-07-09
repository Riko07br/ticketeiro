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
                <x-layout-button href="/users/{{ $user->id }}/edit">Editar</x-layout-button>
            </div>
            <div class="flex flex-col p-4 w-full h-fit space-y-1 border border-gray-700 rounded-lg">
                <p class="text-xl">Tickets</p>
                <ul class="space-y-1">
                    @foreach ($tickets as $ticket)
                        <li>
                            <x-ticket-card :ticket='$ticket' />
                        </li>
                    @endforeach

                </ul>
            </div>

        </div>
    </x-layout-content>

</x-layout>
