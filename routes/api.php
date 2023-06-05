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

Route::get('rm', [App\Http\Controllers\RMController::class, 'index']);
Route::post('rm', [App\Http\Controllers\RMController::class, 'store']);
Route::get('rm/{id_rm}', [App\Http\Controllers\RMController::class, 'show']);
Route::put('rm/{id_rm}', [App\Http\Controllers\RMController::class, 'update']);
Route::delete('rm/{id_rm}', [App\Http\Controllers\RMController::class, 'delete']);

Route::get('konsul', [App\Http\Controllers\KonsultasiController::class, 'index']);
Route::post('konsul', [App\Http\Controllers\KonsultasiController::class, 'store']);
Route::get('konsul/{id_konsul}', [App\Http\Controllers\KonsultasiController::class, 'show']);
Route::put('konsul/{id_konsul}', [App\Http\Controllers\KonsultasiController::class, 'update']);
Route::delete('konsul/{id_konsul}', [App\Http\Controllers\KonsultasiController::class, 'delete']);

Route::get('resep', [App\Http\Controllers\ResepController::class, 'index']);
Route::post('resep', [App\Http\Controllers\ResepController::class, 'store']);
Route::get('resep/{id_resep}', [App\Http\Controllers\ResepController::class, 'show']);
Route::put('resep/{id_resep}', [App\Http\Controllers\ResepController::class, 'update']);
Route::delete('resep/{id_resep}', [App\Http\Controllers\ResepController::class, 'delete']);

Route::get('rujuk', [App\Http\Controllers\RujukanController::class, 'index']);
Route::post('rujuk', [App\Http\Controllers\RujukanController::class, 'store']);
Route::get('rujuk/{id_rujuk}', [App\Http\Controllers\RujukanController::class, 'show']);
Route::put('rujuk/{id_rujuk}', [App\Http\Controllers\RujukanController::class, 'update']);
Route::delete('rujuk/{id_rujuk}', [App\Http\Controllers\RujukanController::class, 'delete']);