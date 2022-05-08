<?php

use App\Http\Controllers\api\FormationController;
<<<<<<< HEAD
=======
use App\Http\Controllers\api\demandesController;
>>>>>>> dba52884a2f317915a37e498bf17e33ad64dfd98
use App\Http\Controllers\api\UtilisateurController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
 
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
<<<<<<< HEAD
 

Route::post('/l', [AuthController::class,'login']);


//Route::resource('/clients', ClientController::class);

Route::apiResource('formations',FormationController::class);
//Route::get('utilisateurs',[UtilisateurController::class,'index']);
//Route::post('/register', [AuthController::class, 'register']);
?>
=======



//Route::apiResource('/formations',[FormationController::class,'index']);
Route::get('/formations',[FormationController::class,'index']);
Route::prefix('/formation')->group(function(){
    Route::post('/store',[FormationController::class,'store']);
    Route::put('/{id}',[FormationController::class,'update']);
    Route::delete('/{id}',[FormationController::class,'destroy']);
    Route::get('/{id}',[FormationController::class,'show']);
});

 

Route::post('/l', [AuthController::class,'login']);




//Route::get('utilisateurs',[UtilisateurController::class,'index']);
//Route::post('/register', [AuthController::class, 'register']);

>>>>>>> dba52884a2f317915a37e498bf17e33ad64dfd98
