<x-app-layout class="bg-black">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm p-5 justify-items-center sm:rounded-lg">
                <div class="flex items-center justify-center h-full">
                    <div class="col-md-8 flex flex-wrap justify-content-center gap-8">
                        <h1 class="w-full text-3xl font-medium text-center">Suas reservas</h1>
                        @foreach($reserves as $reserve)
                        <a class="text-center transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-105 bg-blue-100 rounded-md overflow-hidden flex flex-column px-4 py-3 w-fit" href="{{ route('reserve.edit', ['id' => $reserve->id]) }}">
                            <p>{{$reserve->space_name}}</p>
                            <?php
                            $data = explode('-', $reserve->allocation);
                            $newData = $data[2] . '/' . $data[1] . '/' . $data[0];
                            ?>
                            <p>{{$newData}}</p>
                        </a>
                        @endforeach

                    </div>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>