<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.reservations.create') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Gérer les réservations</a>
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Nom
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Prénom
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Email
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Numéro de téléphone
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Date de réservation
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Voiture sélectionné
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Modif/Supp
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row"
                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $reservation->nom }}
                                </th>
                                <td class="py-4 px-6">
                                    {{ $reservation->prenom }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $reservation->email }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $reservation->num_tel }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $reservation->date_res }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $reservation->name}}

                                </td>
                                <td class="py-4 px-6">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>


</x-admin-layout>