@props(['href'])

<a href="{{ $href }}">
    <button class='transition rounded text-left w-40 py-3 pl-3 hover:bg-blue-600' type="button">
        <b>
            {{ $slot }}
        </b>
    </button>
</a>
