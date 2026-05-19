<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'vol_id',
        'passenger_id'];

    public function resVol() {
        return $this->belongsTo(Vol::class, 'vol_id');
    }


    public function resPassenger() {
        return $this->belongsTo(Passenger::class, 'passenger_id');
    }

    

}
