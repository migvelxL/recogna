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
                        <h1 class="text-3xl font-medium text-center">Adicionar máquinas</h1>

                        <div class="">
                            <form method="POST" enctype="multipart/form-data" class="mt-4 flex flex-column gap-4" action="{{ route('admin.maquinas.store') }}">
                                @csrf

                                <div class="form-group flex flex-column">
                                    <label for="name">Nome da máquina</label>
                                    <input type="text" name="name" class="p-2 border-slate-300 rounded">
                                </div>
                                <div class="form-group flex flex-column">
                                    <label for="description">Descrição</label>
                                    <textarea name="description" class="resize-none p-2 border-slate-300 rounded" maxlength="500" id="" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group flex flex-column">
                                    <label for="image">Imagem do local</label>
                                   <input type="file" name="image" id="image" required class="p-2 border-slate-300 rounded">
                                </div>
                                <div class="form-group text-center">
                                    <button class="btn btn-primary bg-blue-700" type="submit">Enviar</button>
                                </div>
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