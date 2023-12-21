<?php

namespace App\Http\Controllers;

use App\Models\BedRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BedRoomController extends Controller
{
    public function index(){
        $bedRooms = BedRoom::all();
        return view('bedrooms.index', compact('bedRooms'));
    }
    public function create(){
        $bedRoom= BedRoom::select('id')->orderByDesc('id')->first();
        return view('bedrooms.create', compact('bedRoom'));
    }
    public function store(Request $request){
        $data = $request->validate([
            'number_bed' => ['required','numeric'],
            'number_bath' => ['required','numeric']
        ]);
        BedRoom::create([
            'number_bed' => $data['number_bed'],
            'number_bath' => $data['number_bath']
        ]);

        return redirect()->action([BedRoomController::class, 'index'])->with('message-success','Habitación registrada exitosamente');
    }
}
