<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\VendeurController;
use App\Http\Controllers\UtilisateurController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/welco', function () {
     return view('welcome');
    });
Route::get('/', [SuperAdminController::class, 'index'])->name('login');
Route::post('/login', [SuperAdminController::class, 'login'])->name('superadmin.login');
Route::get('/dashboard', [SuperAdminController::class, 'dashboard'])->name('dashboard');
Route::get('superadmin/create', [SuperAdminController::class, 'create'])->name('SuperAdmin.create');
Route::post('/superadmin/store', [SuperAdminController::class, 'store'])->name('SuperAdmin.store');
Route::get('/superadmin/liste-vendeurs', [SuperAdminController::class, 'indexVendeurs'])->name('listeVendeurs');



Route::get('/login1', [VendeurController::class, 'index'])->name('login1');
Route::post('/login1', [VendeurController::class, 'conexion'])->name('vendeur.login');
Route::get('/dashboard1', [VendeurController::class, 'dashboard'])->name('dashboard1');
Route::post('/logout1', [VendeurController::class, 'logout'])->name('logout1');

Route::get('/', [UtilisateurController::class, 'index'])->name('login');
Route::post('/login', [UtilisateurController::class, 'login'])->name('user.login');
Route::get('/dashboard', [UtilisateurController::class, 'dashboard'])->name('dashboard');

