<header>
    <h1>Editar Usuário</h1>
</header>

<form method="POST" action="/users/{{ $user->id }}" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">Nome</label>
        <input type="text" name="name" placeholder="Nome completo" value="{{ old('name') }}" />
        @error('name')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <label for="role_id">Tipo de acesso: </label>
    <select name="role_id" id="role_id">
        <option value="2" @if ($user->role->id == '2') selected @endif>Agente</option>
        <option value="3" @if ($user->role->id == '3') selected @endif>Usuário</option>
    </select>

    <div>
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" />
        @error('email')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="password">Senha</label>
        <input type="text" name="password" value="{{ old('password') }}" />
        @error('password')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <button>
            Editar
        </button>

        <a href="/users">Voltar</a>
    </div>
</form>
