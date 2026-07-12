<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('beranda');
});

Route::get('/beranda', function () {
    return view('beranda');
})->name('beranda');

Route::get('/profil', function () {
    return view('profil');
})->name('profil');

Route::get('/struktur', function () {
    return view('struktur');
})->name('struktur');

Route::get('/renungan', function () {
    return view('renungan');
})->name('renungan');

Route::view('/renungan/detail', 'detail-renungan')->name('renungan.detail');

Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/admin/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
});

require __DIR__.'/auth.php';