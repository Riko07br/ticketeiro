<header>
    <h1>Todas as categorias</h1>
</header>

<a href="/categories/create">
    <b>Criar categoria</b>
</a>

@if (count($categories) == 0)
    <h2>Sem categorias</h2>
@else
    <ul>
        @foreach ($categories as $category)
            <li>
                {{ $category->title }} - <a href="/categories/{{ $category->id }}/edit">editar</a>
            </li>
        @endforeach
    </ul>
@endif
