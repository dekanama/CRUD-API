<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MakulController;
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
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/mahasiswas', [MahasiswaController::class, 'index']);
    Route::post('/mahasiswas', [MahasiswaController::class, 'store']);
    Route::get('/mahasiswas/{mahasiswa}', [MahasiswaController::class, 'show']);
    Route::put('/mahasiswas/{mahasiswa}', [MahasiswaController::class, 'update']);
    Route::delete('/mahasiswas/{mahasiswa}', [MahasiswaController::class, 'destroy']);

    Route::get('/dosens', [DosenController::class, 'index']);
    Route::post('/dosens', [DosenController::class, 'store']);
    Route::get('/dosens/{dosen}', [DosenController::class, 'show']);
    Route::put('/dosens/{dosen}', [DosenControllerr::class, 'update']);
    Route::delete('/dosens/{dosen}', [DosenController::class, 'destroy']);

    Route::get('/makuls', [MakulController::class, 'index']);
    Route::post('/makuls', [MakulController::class, 'store']);
    Route::get('/makuls/{makul}', [MakulController::class, 'show']);
    Route::put('/makuls/{makul}', [MakulController::class, 'update']);
    Route::delete('/makuls/{makul}', [MakulController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);