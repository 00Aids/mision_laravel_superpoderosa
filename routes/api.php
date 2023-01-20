<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeportesController;
use App\Http\Controllers\EntrenadorController;
use App\Http\Controllers\EquipoController;
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


Route::group(['prefix' => 'deportes', 'middleware' => ['auth', 'role:admin']], function ($router){
    Route::get('/', [DeportesController::class, 'index']);
    Route::get('/', [DeportesController::class, 'registrar']);
    Route::get('/', [DeportesController::class, 'actualizar']);
    Route::get('/', [DeportesController::class, 'eliminar']);
});

Route::group(['prefix' => 'entrenadors', 'middleware' => ['auth', 'role:admin']], function ($router){
    Route::get('/', [EntrenadorController::class, 'index']);
    Route::get('/', [EntrenadorController::class, 'registrar']);
    Route::get('/', [EntrenadorController::class, 'actualizar']);
    Route::get('/', [EntrenadorController::class, 'eliminar']);
});



Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::group([

    'prefix' => 'prueba'

], function ($router) {

    Route::post('login', 'AuthController@login');

});
