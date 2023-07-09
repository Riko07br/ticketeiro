<x-layout>
    <x-layout-header>
        Editar ticket
    </x-layout-header>

    <x-layout-content>
        <div class="bg-gray-200 pl-3 mr-5 mb-5">
            <form method="POST" action="/{{ auth()->user()->role->title }}/tickets/{{ $ticket->id }}"
                enctype="multipart/form-data" class="flex flex-col w-96 space-y-2 pb-2">
                @csrf
                @method('PUT')

                @if (auth()->user()->role->id == '1')
                    <div>
                        <label for="agent_id" class="text-sm mb-1">Agente designado</label>
                        <select name="agent_id" id="agent_id" class="bg-white rounded p-2 w-full">
                            <option value="" @if (!$ticket->agent) selected @endif>
                                --Selecione um agente--
                            </option>
                            @foreach ($agents as $agent)
                                <option value="{{ $agent->id }}" @if ($ticket->agent && $ticket->agent->id == $agent->id) selected @endif>
                                    {{ $agent->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif
                <div class="h-min">
                    <label for="title" class="text-sm mb-1">Título</label>
                    <input type="text" name="title" value="{{ $ticket->title }}" placeholder=""
                        class="border border-gray-200 rounded p-2 w-full" />
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="stat_id" class="text-sm mb-1">Status</label>
                    <select name="stat_id" id="role_id" class="bg-white rounded p-2 w-full">
                        @foreach ($stats as $stat)
                            <option value="{{ $stat->id }}" @if ($ticket->stat->id == $stat->id) selected @endif>
                                {{ $stat->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="priority_id" class="text-sm mb-1">Prioridade</label>
                    <select name="priority_id" id="priority_id" class="bg-white rounded p-2 w-full">
                        @foreach ($priorities as $priority)
                            <option value="{{ $priority->id }}" @if ($ticket->priority->id == $priority->id) selected @endif>
                                {{ $priority->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="h-min">
                    <label for="description" class="text-sm mb-1">Descrição</label>
                    <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" placeholder="">{{ $ticket->description }}</textarea>
                    @error('description')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col h-min">
                    <p class="text-sm">Categorias</p>
                    <div class="">
                        @foreach ($categories as $category)
                            <input type="checkbox" name="categories[]" id="category-{{ $category->id }}"
                                value="{{ $category->id }}" @if (in_array($category->id, $ticket->categories->pluck('id')->toArray())) checked @endif>
                            <label for="category-{{ $category->id }}">{{ $category->title }}</label>
                        @endforeach
                    </div>
                </div>

                <div class="flex flex-col h-min">
                    <p class="text-sm ">Etiquetas</p>
                    <div class="">
                        @foreach ($labels as $label)
                            <input type="checkbox" name="labels[]" id="label-{{ $label->id }}"
                                value="{{ $label->id }}" @if (in_array($label->id, $ticket->labels->pluck('id')->toArray())) checked @endif>
                            <label for="category-{{ $label->id }}">{{ $label->title }}</label>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="text-base h-10 w-fit rounded bg-blue-400 right-0 hover:bg-blue-600">
                    <b class="px-5">
                        <i class="fa-solid fa-thumbs-up pr-3"></i>
                        Confirmar edição
                    </b>
                </button>
            </form>
        </div>
    </x-layout-content>
</x-layout>
