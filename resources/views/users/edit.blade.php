<x-layout>
    <x-layout-header>
        Editar Usuário
    </x-layout-header>

    <x-layout-content>
        <div class="bg-gray-200 pl-3 mr-5 mb-5">
            <form method="POST" action="/users/{{ $user->id }}" enctype="multipart/form-data"
                class="flex flex-col w-96 space-y-2 pb-2">
                @csrf
                @method('PUT')
                <div>
                    <label for="name" class="text-sm mb-1">Nome</label>
                    <input type="text" name="name" value="{{ $user->name }}" placeholder=""
                        class="border border-gray-200 rounded p-2 w-full" />
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="role_id" class="text-sm mb-1">Tipo de acesso: </label>
                    <select name="role_id" id="role_id" class="bg-white rounded p-2 w-full">
                        <option value="2" @if ($user->role->id == '2') selected @endif>Agente</option>
                        <option value="3" @if ($user->role->id == '3') selected @endif>Usuário</option>
                    </select>
                </div>
                <div>
                    <label for="email" class="text-sm mb-1">E-mail</label>
                    <input type="text" name="email" value="{{ $user->email }}" placeholder=""
                        class="border border-gray-200 rounded p-2 w-full" />
                    @error('email')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="text-sm mb-1">Senha</label>
                    <input type="password" name="password" value="" placeholder="Deixe vazio para não alterar"
                        class="border border-gray-200 rounded p-2 w-full" />
                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror
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
