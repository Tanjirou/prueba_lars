<?php

namespace App\Livewire;

use App\Models\BedRoom;
use Livewire\Component;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;

class ReservationComponent extends Component
{
    public $bedRooms;
    public Reservation $reservation;
    protected $rules = [
        'reservation.bedroom_id' => 'required',
        'reservation.user_id' => 'required'
    ];
    public function mount(){
        $this->bedRooms = BedRoom::where('version', null)->get();
    }
    public function reservation(){
        $this->validate();
        $numberBedRoom = $this->reservation->bedroom_id;
        $this->reservation->save();
        $timestamp = now()->timestamp;
        DB::table('bed_rooms')
            ->where('id', $numberBedRoom)
            ->update(['version', $timestamp]);
            session()->flash('mens', 'La reservacion se realizo correctamente.');
        $this->mount();
    }
    public function render()
    {

        return view('livewire.reservation-component')->layout('layouts.app');
    }
}
