<x-layout>
    <x-layout-header>
        Registro
    </x-layout-header>

    <x-layout-content>
        <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name">Nome</label>
                <input type="text" name="name" placeholder="Nome completo" value="{{ old('name') }}" />
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" />
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password">Senha</label>
                <input type="password" name="password" value="{{ old('password') }}" />
                @error('password')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation">Confirme a senha</label>
                <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" />
                @error('password_confirmation')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button>
                    Cadastrar
                </button>

                <a href="{{ route('login') }}"> Já tenho cadastro </a>
            </div>
        </form>
    </x-layout-content>
</x-layout>
