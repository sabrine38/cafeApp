<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    public function index()
    {
        return view('SuperAdmin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'emailS' => 'required|email',
            'mot_de_passeS' => 'required',
        ]);

        $superadmin = SuperAdmin::where('emailS', $request->input('emailS'))->first();

        if ($superadmin && Hash::check($request->input('mot_de_passeS'), $superadmin->mot_de_passeS)) {
            // Authentification réussie, enregistrer l'utilisateur en session
            session(['superadmin' => $superadmin]);

            // Rediriger vers le tableau de bord ou une autre page appropriée
            return redirect()->route('dashboard');
        }

        return redirect()->back()->withErrors(['emailS' => 'Erreur d\'email ou de mot de passe '])->withInput($request->only('emailS'));
    }

    public function dashboard()
    {
        return view('SuperAdmin.dashboard');
    }

    public function create()
    {
        $superAdmins = SuperAdmin::all();
        return view('SuperAdmin.create', compact('superAdmins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:utilisateurs,email',
            'motpass' => 'required|string',
            'Confirm_mot_de_pass' => 'required|same:mot_de_passV',
            'telephone' => 'nullable|string',
            'adress' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            //'id_cafe' => 'nullable|integer',
            'type_utilisateur' => 'required|string',
            'super_admin_id' => 'exists:super_admins,id'
        ]);

        // Hash the password
        $hashedPassword = Hash::make($request->input('motpass'));

        Utilisateur::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'motpass' => $hashedPassword,
            'Confirm_mot_de_pass' => $request->input('Confirm_mot_de_pass'),
            'telephone' => $request->input('telephone') ?? '0',
            'adress' => $request->input('adress') ?? '0',
            'image' => $request->input('image') ?? '0',
            //'id_cafe' => $request->input('id_cafe') ?? 0,
            'type_utilisateur' => $request->input('type_utilisateur'),
            'super_admin_id' => $request->input('super_admin_id')
        ]);

        return redirect()->route('SuperAdmin.create')->with('success', 'Vendeur ajouté avec succès.');
    }

    public function indexVendeurs()
    {
        $utilisateurs = utilisateurs::all();
        return view('SuperAdmin.listeVendeur', compact('utilisateurs'));
    }
}
