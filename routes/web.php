<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\ControllerAuth;
use App\Http\Controllers\ControllerAdministrator;
use App\Http\Controllers\ControllerPassenger;
use App\Http\Controllers\ControllerAirport;
use App\Http\Controllers\ControllerVol;
use App\Http\Controllers\ControllerPanier;
use App\Models\Airport;




Route::get('/', [ControllerVol::class, 'searchVols'])->name('search.vols');

Route::get('/createairport', [ControllerAirport::class, 'createAirport']);
Route::get('/listairport', [ControllerAirport::class, 'listAirport']);

Route::post('/confirmationpanier', [ControllerPanier::class, 'createPanier'])->name('panier');
Route::post('/panier', [ControllerPanier::class, 'createPanier'])->name('panierconf');
Route::post('/Panier', [ControllerPanier::class, 'showPanier'])->name('showpanier');



Route::get('/createvolform', [ControllerVol::class, 'createVolForm']);
Route::get('/createvol', [ControllerVol::class, 'createVol']);
Route::get('/listvol', [ControllerVol::class, 'listVol']);



Route::get('/formVol', function() {
    $list = Airport::all();
    return view('form', ['list' => $list]);
});
Route::post('/formVol', [ControllerVol::class, 'afficheVol'])->name('formvol');



Route::get('/modify', [ControllerVol::class, 'showModifyPage']);

Route::post('/modifyVol', [ControllerVol::class, 'showPage'])->name('modify');

Route::post('/volmodifiedrecap', [ControllerVol::class, 'modifiedVolShow'])->name('modifiedvol');

Route::post('/delete', [ControllerVol::class, 'deleteVol'])->name('deletePage');

Route::post('/summary', [ControllerPassenger::class, 'createPassenger'])->name('recap');

Route::get('/recapitulatif', [ControllerPassenger::class, 'recapitulatifPassenger'])->name('recapitulatif.passenger');


Route::post('/registration', [ControllerPanier::class, 'reservation'])->name('registration');

Route::get('/listpassenger', [ControllerPassenger::class, 'listReservations'])->name('recherche.reservations');

Route::get('/listpanier', [ControllerPanier::class, 'listPanier']);

Route::get('/listreservation', [ControllerPassenger::class, 'listReservationShow']);

Route::get('/seatstaken', [ControllerVol::class, 'showAll'])->name('seatstaken');

Route::get('/seatsavailable', [ControllerVol::class, 'seats'])->name('seatsavailable');




//routes get et post pour la création d'un compte 
Route::get('/create', [ControllerAuth::class, 'createForm']); 
Route::post('/create', [ControllerAuth::class, 'create'])->name('auth.createLogin');

//routes get et post pour se logger 
Route::get('/login', [ControllerAuth::class, 'login']);
Route::post('/login', [ControllerAuth::class, 'doLogin'])->name('auth.login');

//route de la page qui affiche le compte 
Route::get('/compte', [ControllerAuth::class, 'account'])->middleware('auth')->name('auth.compte');

//route pour le logout
Route::delete('/logout', [ControllerAuth::class, 'logout'])->name('auth.logout');
