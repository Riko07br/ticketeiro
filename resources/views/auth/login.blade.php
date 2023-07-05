<header>
    <h1>Login</h1>
</header>

<form method="POST" action="{{ route('authenticate') }}">
    @csrf
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
        <button>
            Entrar
        </button>
        <a href="{{ route('register') }}"> Não tenho cadastro </a>
    </div>
</form>