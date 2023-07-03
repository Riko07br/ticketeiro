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
    @endauth
    <h2>
        <a href="/users">Usuários</a>
        <a href="/tickets">Tickets</a>
        <a href="/categories">Categorias</a>
        <a href="/labels">Etiquetas</a>
    </h2>

    @auth
        <form class="inline" method="POST" action="/auth/logout">
            @csrf
            <button type="submit">
                Sair
            </button>
        </form>
    @endauth
</body>

</html>
