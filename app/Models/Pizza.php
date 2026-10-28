<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $connection = 'mysql_pizza';
    protected $table = 'pizza';
    
    protected $primaryKey = 'nev';
    protected $keyType = 'string';
    
    protected $fillable = ['nev', 'kategorianev', 'vegetarianus'];
}
