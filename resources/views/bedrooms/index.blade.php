<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de habitaciones') }}
        </h2>
    </x-slot>
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('message-success'))
                <div class="bg-green-500">
                    <p class="font-bold text-center text-lg text-white">{{ session('message-success') }}</p>
                </div>
            @endif
            <section class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
                <a href="{{ route('bedrooms.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear</a>
                <h1 class="text-center font-bold text-2xl">Habitaciones</h1>

                <div class="flex justify-center ">
                    @if ($bedRooms->count() > 0)
                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                    <div class="overflow-hidden">
                                        <table class="min-w-full text-left text-sm font-light">
                                            <thead class="border-b font-medium dark:border-neutral-500">
                                                <tr>
                                                    <th scope="col" class="px-6 py-4">Habitación</th>
                                                    <th scope="col" class="px-6 py-4">Número de camas</th>
                                                    <th scope="col" class="px-6 py-4">Número de baños</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($bedRooms as $bedRoom)
                                                    <tr class="text-center">
                                                        <td>{{ $bedRoom->id }}</td>
                                                        <td>{{ $bedRoom->number_bed }}</td>
                                                        <td>{{ $bedRoom->number_bath }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <p class="font-bold text-2xl text-center">No hay habitaciones cargadas</p>
                    @endif
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
