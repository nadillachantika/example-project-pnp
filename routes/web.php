<?php

use App\Http\Controllers\InformasiController;
use App\Http\Controllers\InformationController;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    return view('landingpage.home');
})->name('landingpage.home');

Route::get('/landingpage/profile', function(){
    return view('landingpage.profile');
})->name('landingpage.profile');

Route::get('/admin/dashboard', function(){
    return view('admin.index');
});

Route::get('admin/informasi', [InformationController::class, 'index'])->name('admin.informasi');

Route::get('admin/informasi/create', [InformationController::class, 'create'])->name('admin.informasi.create');
