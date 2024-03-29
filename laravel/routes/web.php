<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ClientController;
use App\Http\Controllers\api\EtudiantController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\api\UtilisateurController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------

| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Route::resource('/etudiants', EtudiantController::class);
Route::resource('/clients', ClientController::class);
?>



