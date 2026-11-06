<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uzenet extends Model
{
    protected $table = 'uzenet';

    protected $fillable = ['felhasznalo', 'szoveg'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
