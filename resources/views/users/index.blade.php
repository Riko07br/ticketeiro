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
                    <x-card-user :user='$user' />
                @endforeach
            </div>
        @endif
    </x-layout-content>

</x-layout>
