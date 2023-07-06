@props(['href'])
<a href="{{ $href }}">
    <button type="button" class="text-base h-10 rounded bg-blue-400 right-0 hover:bg-blue-600">
        <b class="px-5">
            {{ $slot }}
        </b>
    </button>
</a>
