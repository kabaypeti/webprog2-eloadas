<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rendeles extends Model
{
    protected $table = 'rendeles';
    protected $connection = 'mysql_pizza';
    
    public $timestamps = false;
    
    protected $fillable = ['pizzanev', 'darab', 'felvetel', 'kiszallitas'];
}
