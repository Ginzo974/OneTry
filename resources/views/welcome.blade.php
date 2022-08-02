<x-guest-layout>
    <div class="mx-5 my-2">
        @if (session('success'))
        <p class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800">{{
            session('success') }}</p>
        @endif
        @if (session('error'))
        <p class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800">{{
            session('error') }}</p>
        @endif
    </div>
    <!-- Main Hero Content -->
    <div class=" container max-w-lg px-4 py-32 mx-auto text-left bg-center bg-no-repeat bg-cover md:max-w-none
            md:text-center"
        style="background-image: url('https://pixabay.com/get/g5580edf799bc63ce6da97f262f5ab1ec92e7b39b7749c41234e48d75866839f86c91f64fc8cd8c8ae459ab22b834ec76129775d64b451537e00a953fc5f7321763bc0ee1c613be888fcbe8a3e5f04dc6_1920.jpg')">
        <h1
            class="font-mono text-3xl font-extrabold text-transparent bg-clip-text bg-white md:text-center sm:leading-none lg:text-5xl">
            <span class="inline md:block">Bienvenue à OneTry</span>
        </h1>
        <div class="flex flex-col items-center mt-12 text-center">
            <span class="relative inline-flex w-full md:w-auto">
                <a href="{{route('res.page_res')}}" type="button"
                    class="inline-flex items-center justify-center px-6 py-2 text-base font-bold leading-6 text-white bg-orange-600 rounded-full lg:w-full md:w-auto hover:bg-orange-500 focus:outline-none">
                    Faire une Réservation
                </a>
        </div>
    </div>
    <!-- End Main Hero Content -->
    <section class="px-2 py-32 bg-white md:px-0">
        <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5">
            <div class="flex flex-wrap items-center sm:-mx-3">
                <div class="w-full md:w-1/2 md:px-3">
                    <div class="w-full pb-6 space-y-4 sm:max-w-md lg:max-w-lg lg:space-y-4 lg:pr-0 md:pb-0">
                        <!-- <h1
          class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl"
        > -->
                        <h3 class="text-xl">Notre Histoire
                        </h3>
                        <!-- </h1> -->
                        <p class="mx-auto text-base text-gray-500 sm:max-w-md lg:text-xl md:max-w-3xl">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus nemo incidunt
                            praesentium, ipsum
                            culpa minus eveniet, id nesciunt excepturi sit voluptate repudiandae. Explicabo, incidunt
                            quia.
                            Repellendus mollitia quaerat est voluptas!
                        </p>
                        <div class="relative flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <div class="w-full h-auto overflow-hidden rounded-md shadow-xl sm:rounded-xl">
                        <img src="/images/traffic.jpg">
                    </div>
                </div>
            </div>
    </section>
    <section class="mt-8 bg-white">
        <div class="mt-4 text-center">
            <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-orange-500">
                Nos Voitures </h2>
        </div>
        <br>
        <div class="container w-full px-5 py-6 mx-auto">
            <div class="grid lg:grid-cols-4 gap-y-6">
                @foreach ($specials as $voiture)
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
    </section>
</x-guest-layout>