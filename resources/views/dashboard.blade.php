<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
                @if(auth()->user()->user_type_id == 1)
                <h1 class="text-center font-bold text-2xl">Administración</h1>
                @else
                <h1 class="text-center font-bold text-2xl">Panel de opciones</h1>
                @endif
                <div class="md:flex md:justify-around mt-3">
                    @if(auth()->user()->user_type_id == 1)
                    <a href="{{route('bedrooms.index')}}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Habitaciones</a>
                    @endif

                    <a href="{{(auth()->user()->user_type_id == 1) ? route('reservation.index') : route('reservation.component')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ">Reservaciones</a>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
