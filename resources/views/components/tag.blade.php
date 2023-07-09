@props(['prop', 'type'])

@switch($type)
    @case('category')
        <div class="flex flex-row space-x-1 text-xs">
            @foreach ($prop as $category)
                <div class="border border-black h-fit px-2 rounded-xl">
                    {{ $category->title }}
                </div>
            @endforeach

        </div>
    @break

    @case('label')
        <div class="flex flex-row space-x-1 text-xs">
            @foreach ($prop as $label)
                <div class="border border-black h-fit px-2 text-center">
                    {{ $label->title }}
                </div>
            @endforeach
        </div>
    @break

    @case('priority')
        @php
            switch ($prop->id) {
                case 1:
                    $bgcolor = 'bg-green-300';
                    break;
                case 2:
                    $bgcolor = 'bg-green-500';
                    break;
                case 3:
                    $bgcolor = 'bg-yellow-500';
                    break;
                case 4:
                    $bgcolor = 'bg-orange-500';
                    break;
                default:
                    $bgcolor = 'bg-red-500';
                    break;
            }
        @endphp
        <div class="{{ $bgcolor }} w-fit h-fit p-2 text-center text-xs rounded">
            <b>{{ $prop->title }}</b>
        </div>
    @break

    @case('stat')
        <div>
            <div class="bg-black text-white h-fit px-2 text-center text-xs">
                <b>{{ $prop->title }}</b>
            </div>
        </div>
    @break

    @default
@endswitch
