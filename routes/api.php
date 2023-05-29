<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('pasien', [App\Http\Controllers\PasienController::class, 'index']);
Route::post('pasien', [App\Http\Controllers\PasienController::class, 'store']);
Route::get('pasien/{id_pasien}', [App\Http\Controllers\PasienController::class, 'show']);
Route::put('pasien/{id_pasien}', [App\Http\Controllers\PasienController::class, 'update']);
Route::delete('pasien/{id_pasien}', [App\Http\Controllers\PasienController::class, 'delete']);