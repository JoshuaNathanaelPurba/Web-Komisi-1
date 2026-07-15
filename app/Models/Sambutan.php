<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sambutan extends Model
{
    protected $table = 'sambutan';

    protected $fillable = [
        'nama',
        'jabatan',
        'periode',
        'kata_sambutan',
        'foto'
    ];
}