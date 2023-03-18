<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersConstroller;

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

Route::get('/', function () {
    return view('Entre');
});

Route::get('/entre', function () {
    return view('Entre');
});

Route::get('/recherche_liste', function () {
    return view('Recherche_liste');
});

Route::get('/merci', function () {
    return view('Merci');
});

Route::get('/Parametre', function () {
    return view('Parametre');
});

Route::post("Play_Pause",[UsersConstroller::class,'getData']);
//Route::view("login","Parametre");