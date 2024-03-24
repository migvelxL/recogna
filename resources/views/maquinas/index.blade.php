<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-1/2 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm p-5 flex flex-column align-items-center gap-12 justify-items-center sm:rounded-lg">
                <img class="w-full" src="{{asset('photos') . '/' .$maquina->image}}" alt="">
                <div class="col-span-2 w-full flex flex-column gap-8 justify-center items-center">
                    <h1 class="text-center text-3xl font-medium">{{$maquina->name}}</h1>
                    <p class="text-center">{{$maquina->description}}</p>
                    <a href="/reserve/{{$maquina->id}}" class="w-fit px-4 py-2 rounded-md text-xl bg-blue-800 text-white">Alocar</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>