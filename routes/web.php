<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\InformationController;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    return view('landingpage.home');
})->name('landingpage.home');

Route::get('/landingpage/profile', function(){
    return view('landingpage.profile');
})->name('landingpage.profile');

Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('admin/informasi', [InformationController::class, 'index'])->name('admin.informasi');
Route::get('admin/informasi/create', [InformationController::class, 'create'])->name('admin.informasi.create');
Route::post('admin/informasi/store', [InformationController::class, 'store'])->name('admin.informasi.store');
Route::get('admin/informasi/edit/{id}', [InformationController::class, 'edit'])->name('admin.informasi.edit');
Route::put('admin/informasi/update/{id}', [InformationController::class, 'update'])->name('admin.informasi.update');
Route::get('admin/informasi/delete/{id}', [InformationController::class, 'destroy'])->name('admin.informasi.delete');
