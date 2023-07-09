<x-layout>
    <x-layout-header>
        Login
    </x-layout-header>

    <x-layout-content>
        <div class="bg-gray-200 pl-3 mr-5 mb-5">
            <form method="POST" action="{{ route('authenticate') }}" class="flex flex-col w-96 space-y-2 pb-2">
                @csrf
                <div>
                    <label for="email" class="text-sm mb-1">E-mail</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Digite seu e-mail"
                        class="border border-gray-200 rounded p-2 w-full" />
                    @error('email')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="text-sm mb-1">Senha</label>
                    <input type="password" name="password" value="{{ old('password') }}" placeholder="Digite sua senha"
                        class="border border-gray-200 rounded p-2 w-full" />
                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="text-base h-10 w-fit rounded bg-blue-400 right-0 hover:bg-blue-600">
                    <b class="px-5">
                        <i class="fa-solid fa-door-open pr-3"></i>
                        Entrar
                    </b>
                </button>
                <div>
                    <u>
                        <a href="{{ route('register') }}" class="text-blue-400 hover:text-blue-600">
                            Não tenho cadastro
                        </a>
                    </u>
                </div>
            </form>
        </div>
    </x-layout-content>
</x-layout>
