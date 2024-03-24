<x-app-layout>
    <?php if (!empty(session('message'))) { ?>
        <div id="message" class="transition ease-in-out bg-{{session('color')}}-100 border border-{{session('color')}}-400 text-{{session('color')}}-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Atenção!</strong>
            <span class="block sm:inline">{{ session('message')}}</span>
            <span id="close-message" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>
        </div>
    <?php } ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm p-5 justify-items-center sm:rounded-lg">
                <div class="flex items-center justify-center h-full">
                    <div class="col-md-8">
                        <h1 class="text-3xl font-medium text-center">{{$user->name}}</h1>

                        <div class="">
                            <form method="POST" class="mt-4 grid grid-cols-2 gap-4" action="{{ route('admin.users.update', ['id' =>$user->id]) }}">
                                @csrf
                                @method('PUT')

                                <input type="hidden" class="pointer-events-none p-2 border-slate-300 rounded" name="id" value="{{ $user->id }}">
                                <div class="form-group flex flex-column">
                                    <label for="user_name">Nome</label>
                                    <input type="text" class="pointer-events-none" name="name" value="{{ $user->name }}">
                                </div>
                                <div class="form-group flex flex-column">
                                    <label for="email">E-mail</label>
                                    <input type="text" class="pointer-events-none p-2 border-slate-300 rounded" name="email" value="{{ $user->email }}">
                                </div>
                                <div class="form-group flex flex-wrap align-center">
                                    <label class="w-full" for="email">Admin</label>
                                    <div class="flex gap-2 items-center"><input type="radio" name="admin" value="1" required class="p-2 border-slate-300 rounded">Sim</div>
                                    <div class="ml-4 flex gap-2 items-center"><input type="radio" name="admin" value="0" class="p-2 border-slate-300 rounded">Não</div>
                                </div>
                                <div class="form-group text-center col-span-2">
                                    <button class="btn btn-primary bg-blue-700" type="submit">Enviar</button>
                                </div>

                            </form>
                            <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" class="w-full text-center" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?')">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger mt-4 bg-red-700" type="submit">Excluir Usuário</button>
                            </form>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const closeMessage = document.getElementById('close-message');
        const message = document.getElementById('message');

        closeMessage.addEventListener('click', function() {
            message.style.display = 'none';
        })
    })
</script>