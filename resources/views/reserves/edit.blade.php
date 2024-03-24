<x-app-layout class="bg-black">
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
                        <h1 class="text-3xl font-medium text-center">{{$reserve->space_name}}</h1>

                        <div class="">
                            <form method="POST" class="mt-4 grid grid-cols-2 gap-4" action="{{ route('reserve.update', ['id' =>$reserve->id]) }}">
                                @csrf
                                @method('PUT')

                                <input type="hidden" class="pointer-events-none p-2 border-slate-300 rounded" name="user_id" value="{{ auth()->id() }}">
                                <div class="form-group flex flex-column">
                                    <label for="user_name">Nome</label>
                                    <input type="text" class="pointer-events-none p-2 border-slate-300 rounded" name="user_name" value="{{ auth()->user()->name }}">
                                </div>
                                
                                <div class="form-group flex flex-column">
                                    <label for="email">E-mail</label>
                                    <input type="text" class="pointer-events-none p-2 border-slate-300 rounded" name="email" value="{{ auth()->user()->email }}">
                                </div>
                                <input type="hidden" class="pointer-events-none p-2 border-slate-300 rounded" name="space_id" value="{{$reserve->space_id}}">

                                <div class="form-group flex flex-column">
                                    <label for="space_name">Local</label>
                                    <input type="text" class="pointer-events-none p-2 border-slate-300 rounded" name="space_name" value="{{ $reserve->space_name }}">
                                </div>
                                <div class="form-group flex flex-column">
                                    <label for="name">Data da reserva: (formato: mês / dia / ano)</label>
                                    <input id="allocation" autofocus type="date" value="{{ $reserve->allocation }}" class="form-control @error('data') is-invalid @enderror p-2 border-slate-300 rounded" name="allocation" required autocomplete="allocation" autofocus>
                                    @error('data')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group flex flex-column">
                                    <label for="type">Tipo de evento</label>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex justify-content-between items-center gap-2"><input type="radio" name="type" id="wedding" value="wedding" required>Casamento</div>
                                        <div class="d-flex justify-content-between items-center gap-2"><input type="radio" name="type" id="birthday" value="birthday">Aniversário</div>
                                        <div class="d-flex justify-content-between items-center gap-2"><input type="radio" name="type" id="default" value="default">Outros</div>
                                    </div>
                                </div>
                                <div class="form-group text-center col-span-2">
                                    <button class="btn btn-primary bg-blue-700" type="submit">Enviar</button>
                                </div>

                            </form>
                            <form method="POST" action="{{ route('reserve.destroy', $reserve->id) }}" class="w-full text-center" onsubmit="return confirm('Tem certeza que deseja excluir esta reserva?')">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger mt-4 bg-red-700" type="submit">Excluir Reserva</button>
                            </form>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    </div>
</x-app-layout>