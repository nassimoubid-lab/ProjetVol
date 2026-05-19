<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panier;
use App\Models\Vol;

class ControllerPanier extends Controller{

    public function createPanier(Request $request)
    {
        $vol_id = $request->get('vol_id');
        $quantite = $request->get('quantity');
    
        $panier = Panier::where('id_vol', $vol_id)->first();
    
        if ($panier) {
            $panier->quantite += $quantite;
        } else {
            $panier = new Panier();
            $panier->id_vol = $vol_id;
            $panier->quantite = $quantite;
        }
    
        $panier->save();
    
        session()->flash('ajout', 'Produit ajouté au panier !');
    
        return redirect()->back();
    }
    


    public function showPanier(){
        $panier = Panier::all(); 
        return view('panier', ['list' => $panier]);
    }

    public function reservation(){
        return view('registration');
    }

    public function listPanier(){
        $listpanier = Panier::all();
        return $listpanier;
    }
}

