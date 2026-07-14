<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;


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

Route::get('/detail-renungan', function () {
    return view('detail-renungan');
})->name('detail-renungan');

Route::get('/galeri', function () {
    return view('galeri');
})->name('galeri');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');    
    });
    Route::get('/penjelasan/tambah', function () { return view('penjelasan-tambah'); })->name('admin.penjelasan.create');
    Route::get('/penjelasan/edit', function () { return view('penjelasan-edit'); })->name('admin.penjelasan.edit');

    Route::get('/sambutan/tambah', function () { return view('sambutan-tambah'); })->name('admin.sambutan.create');
    Route::get('/sambutan/edit', function () { return view('sambutan-edit'); })->name('admin.sambutan.edit');

    Route::get('/proker/tambah', function () { return view('proker-tambah'); })->name('admin.proker.create');
    Route::get('/proker/edit', function () { return view('proker-edit'); })->name('admin.proker.edit');
    
    Route::get('/foto-komisi/tambah', function () { return view('foto-tambah'); })->name('admin.foto.create');
    Route::get('/foto-komisi/edit', function () { return view('foto-edit'); })->name('admin.foto.edit');
});
    

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

require __DIR__.'/auth.php';