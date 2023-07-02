<header>
    <h1>Todas as etiquetas</h1>
</header>

<a href="/labels/create">
    <b>Criar etiqueta</b>
</a>

@if (count($labels) == 0)
    <h2>Sem etiquetas</h2>
@else
    <ul>
        @foreach ($labels as $label)
            <li>
                {{ $label->title }} - <a href="">editar</a>
            </li>
        @endforeach
    </ul>
@endif
