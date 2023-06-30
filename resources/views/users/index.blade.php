<h1>Todos os usuários</h1>
@if (count($users) == 0)
    <h1>Sem tickets</h1>
@else
    <ul>
        @foreach ($users as $user)
            <li>
                <a href="/users/{{ $user->id }}">
                    {{ $user->name }}
                </a>
            </li>
        @endforeach
    </ul>
@endif
