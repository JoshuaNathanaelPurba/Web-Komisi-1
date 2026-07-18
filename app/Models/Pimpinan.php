<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pimpinan extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'pimpinans';

    // Kolom yang diizinkan untuk diisi secara massal
    protected $fillable = [
        'foto',
        'jabatan',
        'nama',
        'jurusan_angkatan',
    ];
}