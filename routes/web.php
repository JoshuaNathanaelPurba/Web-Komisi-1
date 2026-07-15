<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    $penjelasan = \App\Models\Penjelasan::first();
    return view('beranda', compact('penjelasan'));
});

Route::get('/beranda', function () {
    $penjelasan = \App\Models\Penjelasan::first();
    return view('beranda', compact('penjelasan'));
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
    Route::post('/penjelasan/tambah', [DashboardController::class, 'storePenjelasan'])->name('admin.penjelasan.store');
    Route::get('/penjelasan/edit', function () { 
        $penjelasan = \App\Models\Penjelasan::first();
        return view('penjelasan-edit', compact('penjelasan')); 
    })->name('admin.penjelasan.edit');
    Route::put('/penjelasan/edit', [DashboardController::class, 'updatePenjelasan'])->name('admin.penjelasan.update');
    Route::delete('/penjelasan/hapus', function () {
        $penjelasan = \App\Models\Penjelasan::first();
        if ($penjelasan) {
            $penjelasan->delete();
        }
        return redirect()->route('beranda')->with('success', 'Penjelasan berhasil dihapus!');
    })->name('admin.penjelasan.destroy');

    Route::get('/sambutan/tambah', function () { return view('sambutan-tambah'); })->name('admin.sambutan.create');
    Route::post('/sambutan/tambah', [DashboardController::class, 'storeSambutan'])->name('admin.sambutan.store');
    Route::get('/sambutan/edit', function () { return view('sambutan-edit'); })->name('admin.sambutan.edit');
    Route::put('/sambutan/edit', [DashboardController::class, 'updateSambutan'])->name('admin.sambutan.update');

    Route::get('/proker/tambah', function () { return view('proker-tambah'); })->name('admin.proker.create');
    Route::post('/proker/tambah', [DashboardController::class, 'storeProker'])->name('admin.proker.store');
    Route::get('/proker/edit', function () { return view('proker-edit'); })->name('admin.proker.edit');
    Route::put('/proker/edit', [DashboardController::class, 'updateProker'])->name('admin.proker.update');
    
    Route::get('/foto-komisi/tambah', function () { return view('foto-tambah'); })->name('admin.foto.create');
    Route::post('/foto-komisi/tambah', [DashboardController::class, 'storeFoto'])->name('admin.foto.store');
    Route::get('/foto-komisi/edit', function () { return view('foto-edit'); })->name('admin.foto.edit');
    Route::put('/foto-komisi/edit', [DashboardController::class, 'updateFoto'])->name('admin.foto.update');
});
    

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

require __DIR__.'/auth.php';