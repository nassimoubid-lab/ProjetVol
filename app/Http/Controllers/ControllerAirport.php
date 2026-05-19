<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Airport;
use App\Models\Passenger;
use App\Models\Vol;
use App\Models\Panier;
use App\Models\Reservation;



class ControllerAirport extends Controller
{
    public function createAirport(){
        $airport = new Airport();
        $airport -> name = 'Charles de Gaules';
        $airport -> code = 'CDG';
        $airport->save();

        $airport2 = new Airport();
        $airport2 -> name = 'Orly';
        $airport2 -> code = 'ORY';
        $airport2->save();

        $airport3 = new Airport();
        $airport3 -> name = 'Beijing';
        $airport3 -> code = 'BJG';
        $airport3->save();

        $airport4 = new Airport();
        $airport4 -> name = 'Rome';
        $airport4 -> code = 'RME';
        $airport4->save();

        $listairport = Airport :: all();
        return $listairport;
    } 

    public function listAirport(){
        $listairport = Airport :: all();
        return $listairport;
    }

    
}
