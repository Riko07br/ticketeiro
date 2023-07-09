<x-layout>
    <x-layout-header>
        Registro
    </x-layout-header>

    <x-layout-content>
        <div class="bg-gray-200 pl-3 mr-5 mb-5">
            <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data"
                class="flex flex-col w-96 space-y-2 pb-2">
                @csrf
                <div>
                    <label for="name" class="text-sm mb-1">Nome</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Nome completo"
                        class="border border-gray-200 rounded p-2 w-full" />
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="email" class="text-sm mb-1">E-mail</label>
                    <input type="text" name="email" value="{{ old('email') }}" placeholder="Digite seu e-mail"
                        class="border border-gray-200 rounded p-2 w-full" />
                    @error('email')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="text-sm mb-1">Senha</label>
                    <input type="password" name="password" value="{{ old('password') }}"
                        placeholder="Mínimo 6 carateres" class="border border-gray-200 rounded p-2 w-full" />
                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="text-sm mb-1">Senha</label>
                    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"
                        placeholder="Repita a senha" class="border border-gray-200 rounded p-2 w-full" />
                    @error('password_confirmation')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="text-base h-10 w-fit rounded bg-blue-400 right-0 hover:bg-blue-600">
                    <b class="px-5">
                        <i class="fa-solid fa-person-circle-plus pr-3"></i>
                        Cadastrar
                    </b>
                </button>
                <div>
                    <u>
                        <a href="{{ route('login') }}" class="text-blue-400 hover:text-blue-600">
                            Já tenho cadastro
                        </a>
                    </u>
                </div>
            </form>
        </div>
    </x-layout-content>
</x-layout>
