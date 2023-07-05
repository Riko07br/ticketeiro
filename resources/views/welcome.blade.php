<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticketeiro</title>
</head>

<body>

    <a>
        <h1>Inicio</h1>
    </a>
    @auth
        Olá, <b>{{ auth()->user()->name }}</b>

        <h2>
            <a href="/{{ auth()->user()->role->title }}/tickets">Tickets</a>
            @if (auth()->user()->role->id == '1')
                <a href="/users">Usuários</a>
                <a href="/categories">Categorias</a>
                <a href="/labels">Etiquetas</a>
            @endif
        </h2>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">
                Sair
            </button>
        </form>
    @else
        <h2> <a href="{{ route('login') }}">Login</a></h2>
    @endauth


</body>

</html>
