<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth; 

class ControllerAuth extends Controller
{

    //fonction qui affiche la vue pour la création d'un compte 
    public function createForm(){
        return view('auth.createLogin'); 
    }

    //fonction pour la prémière création d'un compte
    public function create(Request $request){
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email', 
            'password'=>'required|min:4'
        ]); 

        User::create([
            'name'=>$request->input('name'), 
            'email'=>$request->input('email'), 
            'password'=>Hash::make($request->input('password'))
        ]); 

        //echo "Registration successfull"; 
        return redirect()->route('auth.login')->with('success', 'Registration successful. Please log in.');

    }

    

    //fonction qui affiche la page du compte 
    public function account(){
        return view('auth.account'); 
    }

    //Les fonctions liées à l'authentification commencent ici 
    
    //fonction qui affiche la page de login
    public function login(){
        return view('auth.login'); 
    }
    
    //fonction qui vérifie les données saisies pour le login et redirige vers la page du compte 
    public function doLogin(Request $request){
        
        $request->validate([
            'email'=>'required|email', 
            'password'=>'required|min:4'
        ]); 
        
        $credentials = [
            'email'=>$request->input('email'), 
            'password'=>$request->input('password')
        ]; 
        
        if(Auth::attempt($credentials)){
            $request->session()->regenerate(); 
            return redirect()->route('auth.compte'); 
            } 
        else { //si on arrive ici, ca veut dire qu'il ne s'est pas connecté donc on le redirige quelques part 
            return redirect()->route('auth.login')->withErrors([
            'invalid'=>"Invalid email or password"
            ]);  
        }
    }

    public function logout(){
        Auth::logout(); 
        return to_route('auth.login'); 
    }
}
