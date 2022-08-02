<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="grid lg:grid-cols-4 gap-y-6">
            @foreach ($voitures as $voiture)
            <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                <img class="w-full h-48" src="{{Storage::url($voiture->image)}}" alt="Image" />
                <div class="px-6 py-4">
                    <h4
                        class="mb-3 text-xl font-semibold tracking-tight text-orange-600 hover:text-orange-400 uppercase">
                        {{$voiture->name}}
                    </h4>
                    <p class="leading-normal text-gray-700">{{$voiture->description}}</p>
                </div>
                <div class="flex items-center justify-between p-4">
                    <span class="text-xl text-orange-600">{{$voiture->prix}}€</span>
                </div>
            </div>



            @endforeach
        </div>

    </div>

</x-guest-layout>