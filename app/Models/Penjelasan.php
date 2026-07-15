<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjelasan extends Model
{
    protected $table = 'penjelasan';
    protected $fillable = ['konten'];
}