<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;

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
// Page d'accueil
Route::get('/', function () {
    return view('accueil');
});

// Authentification
Route::post('/add-client',[ClientController::class,'store'])->name('client.store');
Route::post('/add-client',[ClientController::class,'store'])->name('client.store');
Route::get('/home/client',[ClientController::class,'homeClient'])->name('homeClient');
Route::post('/connexion',[LoginController::class,'addLogin'])->name('login.addLogin');

// Mon compte profile enseigne
Route::get('/mon-compte/{user}/edit',[RestaurantController::class,'edit'])->name('moncompte');
Route::patch('/mon-compte/{user}/update',[RestaurantController::class, 'update'])->name('restaurant.updateCompte');

// Mon compte profile client
Route::get('/mon-compte-client/{user}/edit',[ClientController::class,'edit'])->name('moncompteClient');
Route::patch('/mon-compte-client/{user}/update',[ClientController::class, 'update'])->name('client.updateCompte');

// Verification Compte
Route::get('/verification/{verification}',[ClientController::class, 'verify'])->name('verification_user');

// admin
Route::get('/admin',[AdminController::class,'admin']);
Route::get('approved/{user}',[AdminController::class,'approved'])->name('approved');

Route::post('/add-restaurant',[RestaurantController::class,'store'])->name('restaurant.store');
Route::get('/home/restaurant',[RestaurantController::class,'homeRestaurant'])->name('accueilRestaurant');

// Etablissement

Route::get('/search-Etablissement',[RestaurantController::class,'search']);

Route::get('/search-automatic',[RestaurantController::class,'searchAutomatic']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Auth::routes();

