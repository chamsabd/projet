<?php

use App\Http\Controllers\api\FormationController;
use App\Http\Controllers\api\demandesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



//Route::apiResource('/formations',[FormationController::class,'index']);
Route::get('/formations',[FormationController::class,'index']);
Route::prefix('/formation')->group(function(){
    Route::post('/store',[FormationController::class,'store']);
    Route::put('/{id}',[FormationController::class,'update']);
    Route::delete('/{id}',[FormationController::class,'destroy']);
    Route::get('/{id}',[FormationController::class,'show']);
});
Route::get('/demandes',[demandesController::class,'index']);
Route::post('/store',[demandesController::class,'store']);
Route::put('/{id}',[demandesController::class,'update']);
Route::delete('/{id}',[demandesController::class,'destroy']);
Route::get('/{id}',[demandesController::class,'show']);

