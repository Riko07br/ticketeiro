<aside class="sticky h-full top-0 w-48 shadow">
    <ul class="flex-col space-y-4 py-5 h-full ">
        @auth
            <x-sidebar-item href="/{{ auth()->user()->role->title }}/tickets">
                <i class="fa-sharp fa-solid fa-ticket-simple pr-3"></i>
                Tickets
            </x-sidebar-item>

            @if (auth()->user()->role->id == '1')
                <x-sidebar-item href="/users"><i class="fa-sharp fa-solid fa-users pr-3"></i>
                    Usuários
                </x-sidebar-item>
                <x-sidebar-item href="/categories"><i class="fa-solid fa-list pr-3"></i>
                    Categorias
                </x-sidebar-item>
                <x-sidebar-item href="/labels"><i class="fa-solid fa-tags pr-3"></i>
                    Etiquetas
                </x-sidebar-item>
            @endif

            <x-sidebar-item href="/about">
                <i class="fa-regular fa-circle-question pr-3"></i>
                Sobre
            </x-sidebar-item>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class='transition rounded text-left w-40 py-3 pl-3 hover:bg-red-500'>
                    <i class="fa-solid fa-arrow-right-from-bracket pr-3"></i><b>Sair</b>
                </button>
            </form>
        @else
            <x-sidebar-item href="{{ route('login') }}">
                Login
            </x-sidebar-item>

            <x-sidebar-item href="/about">
                <i class="fa-regular fa-circle-question pr-3"></i>
                Sobre
            </x-sidebar-item>
        @endauth

    </ul>
</aside>
