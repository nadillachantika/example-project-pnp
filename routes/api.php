<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('berita')->group(function () {
    Route::get('/', [BeritaController::class, 'index']);
    Route::post('/', [BeritaController::class, 'store']);
    Route::delete('/{id}', [BeritaController::class, 'destroy']);
    Route::put('/{id}', [BeritaController::class, 'update']);
});
