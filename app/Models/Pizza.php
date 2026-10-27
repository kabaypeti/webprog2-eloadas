<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $connection = 'pizza_db';
    protected $table = 'pizza';
    
    protected $primaryKey = 'nev';
    protected $keyType = 'string';
}
