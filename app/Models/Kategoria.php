<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategoria extends Model
{
    protected $connection = 'pizza_db';
    protected $table = 'kategoria';

    protected $primaryKey = 'nev';
    protected $keyType = 'string';
}
