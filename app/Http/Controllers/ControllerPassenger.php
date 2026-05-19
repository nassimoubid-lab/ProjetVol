<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Airport;
use App\Models\Passenger;
use App\Models\Vol;
use App\Models\Panier;
use App\Models\Reservation;

class ControllerPassenger extends Controller{

    public function createPassenger(Request $request){

        $first_name = $request->get('first_name');
        $last_name = $request->get('last_name');
        $email = $request->get('email');

        $passenger = new Passenger();
        $passenger->first_name = $first_name;
        $passenger->last_name = $last_name;
        $passenger->email = $email;

        $passenger->save();

        $passenger_id = $passenger->id;
        $panier = Panier::all();
        
        foreach ($panier as $elt) {
            $quantite = $elt->quantite;
            $vol_id = $elt->id_vol;
            while ($quantite > 0) {
                $reservation = new Reservation();
                $reservation->vol_id = $vol_id;
                $reservation->passenger_id = $passenger_id;
                $reservation->save();
                $quantite = $quantite - 1;
            }
            $elt->delete();
        }

        session(['passenger_id' => $passenger->id]);
        return redirect()->route('recapitulatif.passenger');
            }
    
    public function listPassenger(){
        $listpassenger = Passenger::all();
        return $listpassenger;
    }

    public function listReservation(){
        $listreservation = Reservation::all();
        return $listreservation;
    }
    
    public function listReservationShow(){
        $listreservation = Reservation::with('resPassenger', 'resVol')->get();
        return view('listpassenger', ['listreservation' => $listreservation]);
    }

    public function listReservations(Request $request){
        $vols = Vol::all();
        $query = Reservation::with('resPassenger', 'resVol');

        if ($request->has('vol_id') && !empty($request->vol_id)) {
            $query->where('vol_id', $request->vol_id);
        }

        $listreservation = $query->get();

        return view('listpassenger', ['listreservation' => $listreservation, 'vols' => $vols]);
    }

    public function listSeatsShow(){
        $listseats = Reservation::with('resPassenger', 'resVol')->get();
        return view('listseats', ['listseats' => $listseats]);
    }

    public function recapitulatifPassenger()
    {
        $passenger_id = session('passenger_id');
    
        $reservations = Reservation::with(['resVol.airportDepart', 'resVol.airportArrival'])
                                    ->where('passenger_id', $passenger_id)
                                    ->get();
    
        return view('recappanier', ['reservations' => $reservations]);
    }
    
}
