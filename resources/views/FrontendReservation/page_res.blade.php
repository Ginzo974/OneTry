<x-guest-layout>
    @if ($message = Session::get('error'))
    <div
        class="alert alert-danger alert-block p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800">
        <strong>{{ $message }}</strong>
    </div>
    @endif


    <div class="container w-full px-5 py-6 mx-auto">
        <div class="flex items-center justify-center min-h-screen bg-gray-100">
            <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
                <div class="flex justify-center">
                    <img id="logo" src="/images/onetry1.png">
                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path
                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                    </svg>
                </div>

                <h3 class="text-2xl font-bold text-center">Faire une réservation</h3>
                <div class="mt-4">
                    <form method="POST" action="{{ route('pageResa') }}">
                        {{-- <form method="POST" action="{{ route('res.store.pageres') }}"> --}}
                            @csrf
                            <input></input>
                            <div class="sm:col-span-6">
                                <label for="nom" class="block text-sm font-medium text-gray-700"> Nom
                                </label>
                                <div class="mt-1">
                                    <input type="text" id="nom" name="nom" required
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('nom') border-red-400 @enderror" />
                                </div>
                                @error('nom')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="sm:col-span-6">
                                <label for="prenom" class="block text-sm font-medium text-gray-700"> Prénom
                                </label>
                                <div class="mt-1">
                                    <input type="text" id="prenom" name="prenom" required
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5  @error('prenom') border-red-400 @enderror" />
                                </div>
                                @error('prenom')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-6 pt-5">
                                <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                                <div class="mt-1">
                                    <input type="email" id="email" name="email" required
                                        class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md  @error('email') border-red-400 @enderror "></textarea>
                                </div>
                                @error('email')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror

                                <div class="sm:col-span-6">
                                    <label for="num_tel" class="block text-sm font-medium text-gray-700"> Numéro de
                                        téléphone
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" id="num_tel" name="num_tel" required
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('num_tel') border-red-400 @enderror " />
                                    </div>
                                    @error('num_tel')
                                    <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="sm:col-span-6">
                                    <label for="date_res" class="block text-sm font-medium text-gray-700"> Date de
                                        réservation </label>
                                    <div class="mt-1">
                                        <input type="date" id="date_res" name="date_res" required
                                            min="{{ $min_date->format('Y-m-d')}}" class="block w-full appearance-none bg-white border border-gray-400 rounded-md  
                                    py-2 px-3 text-base leading-normal transition duration-150 ease-in-out
                                    sm:text-sm sm:leading-5 @error('date_res') border-red-400 @enderror " />
                                    </div>
                                    @error('date_res')
                                    <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="sm:col-span-6">
                                    <label for="voitures_id"
                                        class="block text-sm font-medium text-gray-700 @error('voitures_id') border-red-400 @enderror">
                                        Veuillez
                                        choisir une voiture
                                    </label>
                                    <div class="mt-1">
                                        @foreach ($voitures as $voiture)
                                        <label>
                                            <input type="radio" name="voitures_id" required
                                                value="{{ $voiture->id }}">{{$voiture->name}}

                                            <img src="{{ Storage::url($voiture->image) }}" class="w-50 h-40 rounded">

                                        </label>

                                        @endforeach
                                        @error('voitures_id')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mt-6 p-4 flex justify-end">
                                        <button type="submit"
                                            class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Envoyer</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div>
                        </div>
                </div>
            </div>
        </div>
</x-guest-layout>