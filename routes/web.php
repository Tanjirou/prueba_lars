<?php

use App\Http\Controllers\BedRoomController;
use App\Http\Controllers\ReservationController;
use App\Jobs\Reservation;
use Illuminate\Support\Facades\Route;
use App\Livewire\ReservationComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/habitaciones', [BedRoomController::class, 'index'])->middleware('auth')->name('bedrooms.index');
route::get('/habitaciones/crear', [BedRoomController::class, 'create'])->middleware('auth')->name('bedrooms.create');
route::post('/habitaciones/crear', [BedRoomController::class, 'store'])->middleware('auth')->name('bedrooms.store');
route::get('/reservaciones', ReservationController::class)->name('reservation.index');
route::get('/reservacion', ReservationComponent::class)->name('reservation.component');


