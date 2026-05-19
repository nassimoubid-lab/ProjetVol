<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Vol extends Model
{
    protected $fillable = [
        'name',
        'airport_depart',
        'airport_arrival',
        'departure_time',
        'arrival_time',
        'seats',
        'price',
    ];

    public function airportDepart() {
        return $this->belongsTo(Airport::class, 'airport_depart_id');
    }

    public function airportArrival() {
        return $this->belongsTo(Airport::class, 'airport_arrival_id');
    }

    public function paniers()
    {
        return $this->hasMany(Panier::class, 'id_vol');
    }



}
