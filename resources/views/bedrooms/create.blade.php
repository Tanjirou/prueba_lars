<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Habitación') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
                <h1 class="text-center font-bold text-2xl">Información de la habitación</h1>
                <div class="flex justify-center">
                    <form class="shadow-md rounded px-8 pt-6 pb-8 mb-4 w-1/2" method="POST" action="{{route('bedrooms.store')}}">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="number">
                                Habitación
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="number" type="text" placeholder="number" readonly value="{{(isset($bedRoom) && !is_null($bedRoom)) ? $bedRoom->id + 1 : 1}}">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="number_bed">
                                Número de camas
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="number_bed" type="number" name="number_bed" min="1">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="number_bath">
                                Número de baños
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="number_bath" type="number" name="number_bath" min="1">
                        </div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-red-500 font-bold py-1">{{ $error }}</li>
                            @endforeach
                        </ul>
                        <input type="submit" value="Registrar"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer">
                    </form>
                </div>

            </section>
        </div>
    </div>
</x-app-layout>
