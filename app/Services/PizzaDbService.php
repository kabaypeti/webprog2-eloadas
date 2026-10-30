<?php

namespace App\Services;

use App\Models\Kategoria;
use App\Models\Pizza;
use App\Models\Rendeles;
use ArrayAccess;
use ArrayObject;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PizzaDbService {
    
    /**
     * @var array<Model>
     */
    private array $models;
    private Builder $schema;
    
    private const COLUMN_NAMES = [
        'kategoria' => [
            'nev' => 'Kategória neve',
            'ar' => 'Ár'
        ],
        'pizza' => [
            'nev' => 'Pizza neve',
            'kategorianev' => 'Kategória neve',
            'vegetarianus' => 'Vegetáriánus?'
        ],
        'rendeles' => [
            'pizzanev' => 'Pizza neve',
            'darab' => 'Darab',
            'felvetel' => 'Felvétel dátuma',
            'kiszallitas' => 'Kiszállítás dátuma'
        ]
    ];
    
    public function __construct()
    {
        $this->schema = Schema::connection(env('DB_CONNECTION2'));
        $this->models = [
            'kategoria' => new Kategoria(),
            'pizza' => new Pizza(),
            'rendeles' => new Rendeles()
        ];
    }
    
    /** 
     * @return array<string>
    */
    public function get_column_names(string $table_name): array {
        $column_names = [];
        if (array_search($table_name, array_keys($this->models)) !== false) {
            $column_names = $this->schema->getColumnListing($table_name);
            $find = array_search($table_name, array_keys(self::COLUMN_NAMES));
            if ($find !== false) {
                $column_names = self::COLUMN_NAMES[$table_name];
            }
        }
        return $column_names;
    }
    
    public function get_table(string $table_name): EloquentBuilder|null {
        if (array_search($table_name, array_keys($this->models)) !== false) {
            return $this->models[$table_name]->query();
        }
        return null;
    }

}