<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    protected $fillable = [
        'id_vol',
        'quantite'];

    public function panierVolName() {
        return $this->belongsTo(Vol::class, 'id_vol');
    }
}

