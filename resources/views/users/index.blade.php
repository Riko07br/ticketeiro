<x-layout>
    <x-layout-header>
        Usuários
    </x-layout-header>

    <x-layout-content>
        @if (count($users) == 0)
            <h1>Sem tickets</h1>
        @else
            <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-1 space-y-1 mx-1 pr-5 items-center">
                @foreach ($users as $user)
                    <x-layout-button href="/users/{{ $user->id }} ">

                        @switch($user->role->id)
                            @case(1)
                                <i class="fa-solid fa-user-tie pr-3"></i>
                            @break

                            @case(2)
                                <i class="fa-solid fa-image-portrait pr-3"></i>
                            @break

                            @default
                                <i class="fa-solid fa-user pr-3"></i>
                        @endswitch

                        {{ $user->name }}
                    </x-layout-button>
                @endforeach
            </div>
        @endif
    </x-layout-content>

</x-layout>
