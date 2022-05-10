<?php
use App\Http\Controllers\api\SeanceController;
use App\Http\Controllers\api\FormationController;
use App\Http\Controllers\api\demandesController;
use App\Http\Controllers\api\UserController;
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
Route::get('/seances',SeanceController::class);
//Route::get('/seances',[SeanceController::class,'index']);
//Route::apiResource('/formations',[FormationController::class,'index']);
Route::get('/admin/formations',[FormationController::class,'index']);
Route::get('/participant/formations',[FormationController::class,'index']);
Route::get('/responsable/formations',[FormationController::class,'responsableindex']);
Route::get('/formateur/formations',[FormationController::class,'formateurindex']);
Route::prefix('/formation')->group(function(){
    Route::post('/store',[FormationController::class,'store']);
    Route::put('/{id}',[FormationController::class,'update']);
    Route::delete('/{id}',[FormationController::class,'destroy']);
    Route::get('/{id}',[FormationController::class,'show']);
});



Route::get('/demandes',[demandesController::class,'index']);
Route::post('/demandes/store',[demandesController::class,'store']);
Route::put('/demandes/{id}',[demandesController::class,'update']);
Route::delete('/demandes/{id}',[demandesController::class,'destroy']);
Route::get('/demandes/{id}',[demandesController::class,'getDemande']);



Route::get('/users',[UserController::class,'index']);


