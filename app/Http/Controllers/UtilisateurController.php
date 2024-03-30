<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\utilisateur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
class UtilisateurController extends Controller
{
    public function index()
    {
        return view('user.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'motpass' => 'required',
        ]);

        $user = utilisateur::where('email', $request->input('email'))->first();

        if ($user && Hash::check($request->input('motpass'), $user->motpass)) {
            session(['user' => $user]);
            return redirect()->route('dashboard');
        }
        return redirect()->back()->withErrors(['email' => 'Eroor de email ou password '])->withInput($request->only('email'));
    }
    public function dashboard(){
        $user = session('user');

        if ($user) {
            if ($user->type_utilisateur === 'superAdmin') {
                return view('superAdmin.dashboard');
            } elseif ($user->type_utilisateur === 'client') {
                return view('client.dashboard');
            } elseif ($user->type_utilisateur === 'vendeur') {
                return view('Vendeurs.dashboard');
            }
        }
        return redirect()->route('login')->withErrors(['error' => 'Utilisateur non autorisé']);
    }
}