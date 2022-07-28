<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex  m-2 p-2">
                <a href="{{ route('admin.reservations.index') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Voiture index</a>
            </div>
            <div class="m-2 p-2 bg-slate-100 rounded">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <form method="POST" action="{{ route('admin.reservations.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="sm:col-span-6">
                            <label for="nom" class="block text-sm font-medium text-gray-700"> Nom
                            </label>
                            <div class="mt-1">
                                <input type="text" id="nom" name="nom"
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
                                <input type="text" id="prenom" name="prenom"
                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5  @error('prenom') border-red-400 @enderror" />
                            </div>
                            @error('prenom')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="sm:col-span-6 pt-5">
                            <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                            <div class="mt-1">
                                <input type="email" id="email" name="email"
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
                                    <input type="text" id="num_tel" name="num_tel"
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
                                    <input type="date" id="date_res" name="date_res"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('date_res') border-red-400 @enderror " />
                                </div>
                                @error('date_res')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="sm:col-span-6">
                                <label for="voitures_id"
                                    class="block text-sm font-medium text-gray-700  @error('voitures_id') border-red-400 @enderror">
                                    Veuillez
                                    choisir une voiture
                                </label>
                                <div class="mt-1">
                                    @foreach ($voitures as $voiture)
                                    <label>
                                        <input type="radio" name="voitures_id" value="{{ $voiture->id }}">
                                        {{ $voiture->name }}
                                        <img src="{{ Storage::url($voiture->image) }}" class="w-50 h-40 rounded">
                                    </label>
                                    @endforeach
                                    @error('voitures_id')
                                    <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-6 p-4">
                                    <button type="submit"
                                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Store</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>