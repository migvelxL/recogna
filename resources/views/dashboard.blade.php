<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
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
            <div class="bg-white overflow-hidden shadow-sm p-5 flex flex-wrap gap-8 justify-content-center align-items-center justify-items-center sm:rounded-lg">
                <h2 class="text-3xl mb-4 font-medium w-full text-center">Computadores do laborarório</h2>
                @foreach ($maquinas as $maquina)
                <a href="/maquinas/{{$maquina->id}}" class="w-1/4 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-105 bg-blue-100 rounded-md overflow-hidden flex flex-column p-3 w-fit">
                    <img class="w-full" src="{{asset('photos') . '/' .$maquina->image}}" alt="">
                    <div class="p-4 flex align-center justify-center ">

                        <h1 class="h-fit font-light text-xl">{{ $maquina->name }}</h1>
                    </div>
                </a>
                @endforeach

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