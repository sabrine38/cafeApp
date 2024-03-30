<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vendeurs;


use App\Models\SuperAdmin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class VendeurController extends Controller
{
    public function index()
    {
        return view('Vendeurs.login');
    }
    public function conexion(Request $request)
{
    $request->validate([
        'EmailV' => 'required|email',
        'mot_de_passV' => 'required',
    ]);

    $vendeur = Vendeurs::where('EmailV', $request->input('EmailV'))->first();

    if ($vendeur && Hash::check($request->input('mot_de_passV'), $vendeur->mot_de_passV)) {
        // Authentification réussie, enregistrer l'utilisateur en session
        session(['vendeur' => $vendeur]);

        // Rediriger vers le tableau de bord ou une autre page appropriée
        return redirect()->route('dashboard1');
    }
    return redirect()->back()->withErrors(['EmailV' => 'Erreur d\'email ou de mot de passe'])->withInput($request->only('EmailV'));
}
    public function dashboard(){
        return view('Vendeurs.dashboard');
    }
   
   
}
