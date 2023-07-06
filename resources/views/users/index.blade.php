<x-layout>
    <x-layout-header>
        Todos os usuários
    </x-layout-header>

    <x-layout-content>
        @if (count($users) == 0)
            <h1>Sem tickets</h1>
        @else
            <ul>
                @foreach ($users as $user)
                    <li>
                        <a href="/users/{{ $user->id }}">
                            {{ $user->name }} - {{ $user->role->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </x-layout-content>

</x-layout>
