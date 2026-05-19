<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Airport;
use App\Models\Passenger;
use App\Models\Vol;
use App\Models\Panier;
use App\Models\Reservation;




class MyController extends Controller
{

    public function showVolHome(){
    $listAirport = Vol::with(['airportDepart', 'airportArrival'])->get();
    return view('home', ['list' => $listAirport]);
    }


    
}
