<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proker extends Model
{
    protected $table = 'prokers'; 

    protected $fillable = [
        'nama_proker',
        'penjelasan_proker',
        'foto_proker',
    ];
}