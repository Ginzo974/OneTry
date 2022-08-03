<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.voitures.create') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Ajouter</a>
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Modèle de la voiture
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Description de la voiture
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Image
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Prix
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Statut
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Modif/Supp
                                </th>
                            </tr>
                        </thead>
                        </tr>
                        @foreach ($voitures as $voiture)
                        <tbody>
                            <tr class="bg-gray-50 border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $voiture->name }}
                                </th>
                                <td class="py-4 px-6">
                                    {{ $voiture->description }}
                                </td>
                                <td class="py-4 px-6">
                                    <img src="{{ Storage::url($voiture->image) }}" class="w-50 h-50 rounded">
                                </td>
                                <td class="py-4 px-6">
                                    {{ $voiture->prix }}€
                                </td>
                                <td class="py-4 px-6">
                                    {{ $voiture->status }}
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.voitures.edit', $voiture->id) }}"
                                            class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded lg text-white">Modifier</a>
                                        <form class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded lg text-white"
                                            method="POST" action="{{ route('admin.voitures.destroy', $voiture->id) }}"
                                            onsubmit="return confirm('Êtes vous sûr de vouloir supprimer?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
</x-admin-layout>