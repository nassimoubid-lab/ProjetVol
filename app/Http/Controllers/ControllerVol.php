<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Airport;
use App\Models\Passenger;
use App\Models\Vol;
use App\Models\Panier;
use App\Models\Reservation;



class ControllerVol extends Controller{

    public function createVol(){

        $vol1 = new Vol();
        $vol1->name = 'Vol ORY-BJG 001';
        $vol1->airport_depart_id = 2;
        $vol1->airport_arrival_id = 3;
        $vol1->departure_time = '10:00';
        $vol1->arrival_time = '22:30';
        $vol1->departure_date = '2025-05-01';
        $vol1->arrival_date = '2025-05-01';
        $vol1->seats = 150;
        $vol1->price = 450.00;
        $vol1->save();

        $vol2 = new Vol();
        $vol2->name = 'Vol ORY-ROM 002';
        $vol2->airport_depart_id = 2;
        $vol2->airport_arrival_id = 4;
        $vol2->departure_time = '08:30';
        $vol2->arrival_time = '10:45';
        $vol2->departure_date = '2025-05-02';
        $vol2->arrival_date = '2025-05-02';
        $vol2->seats = 120;
        $vol2->price = 120.00;
        $vol2->save();

        $vol3 = new Vol();
        $vol3->name = 'Vol ORY-BJG 003';
        $vol3->airport_depart_id = 2;
        $vol3->airport_arrival_id = 3;
        $vol3->departure_time = '14:00';
        $vol3->arrival_time = '02:30';
        $vol3->departure_date = '2025-05-03';
        $vol3->arrival_date = '2025-05-04';
        $vol3->seats = 140;
        $vol3->price = 470.00;
        $vol3->save();

        $listvol = Vol :: all();
        return $listvol;

    }

    public function afficheVol(Request $request){
        $name = $request->get('name');
        $airport_depart_id = $request->get('airport_depart_id');
        $airport_arrival_id = $request->get('airport_arrival_id');
        $departure_time = $request->get('departure_time');
        $arrival_time = $request->get('arrival_time');
        $departure_date = $request->get('departure_date');
        $arrival_date = $request->get('arrival_date');
        $seats = $request->get('seats');
        $price = $request->get('price');

        $vol = new Vol();
        $vol->name = $name;
        $vol->airport_depart_id = $airport_depart_id;
        $vol->airport_arrival_id = $airport_arrival_id;
        $vol->departure_time = $departure_time;
        $vol->arrival_time = $arrival_time;
        $vol->departure_date = $departure_date;
        $vol->arrival_date = $arrival_date;
        $vol->seats = $seats;
        $vol->price = $price;
        $vol->save();

        $listVol = Vol::with(['airportDepart', 'airportArrival'])->get();


        return view('allForm', ['list'=>$listVol]);
    }

    public function listVol(){
        $listvol = Vol :: all();
        return $listvol;
    }

    public function showAll()
    {
        $listvols = Vol::with(['airportDepart', 'airportArrival'])->get();
        $listpassenger = Reservation::with(['resPassenger', 'resVol'])->get();
    
        return view('listseatstaken', ['listvols' => $listvols, 'listpassenger' => $listpassenger]);
    }

    public function showModifyPage()
    {
        $listvols = Vol::with(['airportDepart', 'airportArrival'])->get();
        return view('listVol', ['listvols' => $listvols]);
    }

    public function showPage(Request $request){
        $id_vol = $request->get("id_vol");
        $vol = Vol::find($id_vol); 
        $listvols = Vol::all();
        $airports = Airport::all();

        return view('modify', ['vol' => $vol, 'listvols' => $listvols, 'airports' => $airports]);
    }



    public function modifiedVolShow(Request $request){
        $name = $request->get('name');
        $airport_depart_id = $request->get('airport_depart_id');
        $airport_arrival_id = $request->get('airport_arrival_id');
        $departure_time = $request->get('departure_time');
        $arrival_time = $request->get('arrival_time');
        $departure_date = $request->get('departure_date');
        $arrival_date = $request->get('arrival_date');
        $seats = $request->get('seats');
        $price = $request->get('price');

        $id_vol = $request -> get("id_vol");

        $vol = Vol::find($id_vol); 
        $vol->name = $name;
        $vol->airport_depart_id = $airport_depart_id;
        $vol->airport_arrival_id = $airport_arrival_id;
        $vol->departure_time = $departure_time;
        $vol->arrival_time = $arrival_time;
        $vol->departure_date = $departure_date;
        $vol->arrival_date = $arrival_date;
        $vol->seats = $seats;
        $vol->price = $price;
        $vol->save();

        return view('recapModifiedVol',['vol'=>$vol]);

    }


    public function deleteVol(Request $request)
    {
        $id_vol = $request->get('id_vol');
        $vol = Vol::find($id_vol);

        if ($vol) {
            Panier::where('id_vol', $id_vol)->delete();
            $vol->delete();

            return view('deletedVol');
        }

    }


    public function searchVols(Request $request)
    {
        $query = Vol::with(['airportDepart', 'airportArrival']);
    
        if ($request->filled('departure_airport_id')) {
            $query->where('airport_depart_id', $request->departure_airport_id);
        }
    
        if ($request->filled('arrival_airport_id')) {
            $query->where('airport_arrival_id', $request->arrival_airport_id);
        }
    
        if ($request->filled('departure_date')) {
            $query->where('departure_date', $request->departure_date);
        }
    
        if ($request->filled('arrival_date')) {
            $query->where('arrival_date', $request->arrival_date);
        }
    
        $vols = $query->get();
        $airports = Airport::all();
        $listvols = Vol::all();
        $listpassengers = Passenger::all();
    
        return view('home', ['vols' => $vols,'airports' => $airports,'listvols' => $listvols,'listpassengers' => $listpassengers]);
    }
    

}
