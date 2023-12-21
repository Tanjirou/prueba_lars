<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservación') }}
        </h2>
    </x-slot>
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('mens'))
                <div class="bg-green-500">
                    <p class="font-bold text-center text-lg text-white">{{ session('mens') }}</p>
                </div>
            @endif
            <section class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">

                <h1 class="text-center font-bold text-2xl">Habitaciones</h1>

                <div class="flex justify-center ">
                    @if ($bedRooms)
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
                                                    <th scope="col" class="px-6 py-4">Reservado</th>
                                                    <th scope="col" class="px-6 py-4">Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($bedRooms as $bedRoom)
                                                    <tr class="text-center">
                                                        <td>{{ $bedRoom->id }}</td>
                                                        <td>{{ $bedRoom->number_bed }}</td>
                                                        <td>{{ $bedRoom->number_bath }}</td>
                                                        <td>{{is_null($bedRoom->version) ? 'No' : 'Si'}}</td>
                                                        <td><form wire:submit.prevent="reservation" method="post">
                                                            <input type="hidden" wire:model="reservation.bedroom_id" name="reservation.bedroom_id" value="{{$bedRoom->id}}">
                                                            <input type="hidden" wire:model="reservation.user_id" name="reservation.user_id" value="{{auth()->user()->id}}">
                                                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded "><i class="fas fa-check"></i></button>
                                                        </form></td>
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
</div>
