<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategoria extends Model
{
    protected $connection = 'mysql_pizza';
    protected $table = 'kategoria';

    protected $primaryKey = 'nev';
    protected $keyType = 'string';
    
    public $timestamps = false;
    
    protected $fillable = ['nev', 'ar'];
}
