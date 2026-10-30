<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $connection = 'mysql_pizza';
    protected $table = 'pizza';
    
    protected $primaryKey = 'nev';
    protected $keyType = 'string';
    
    protected $fillable = ['nev', 'kategorianev', 'vegetarianus'];
    
    protected $attributes = [
        'nev' => 'Névtelen pizza',
        'vegetarianus' => false,
    ];
    
    protected function vegetarianus(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $value == 1 ? "Igen" : "Nem",
        );
    }
}
