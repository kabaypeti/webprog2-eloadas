<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzaSeeder extends Seeder
{
    private static function read_seed($name): array
    {
        $path = '\\txt\\';
        $file = fopen(__DIR__.$path.$name.'.txt', 'r');
        
        $table = array();
        if ($file) {
            $columnline = fgets($file);
            if ($columnline) {
                $columns = explode("\t", trim($columnline));
                while (($line = fgets($file)) !== false) {
                    $data = explode("\t", trim($line));
                    $record = array();
                    for ($i = 0; $i < count($columns); $i++) {
                        $record[$columns[$i]] = $data[$i];
                    }
                    array_push($table, $record);
                }
            }
        }
        fclose($file);
        
        return $table;
    }    

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $table_kategoria = self::read_seed('kategoria');
        $table_pizza = self::read_seed('pizza');
        $table_rendeles = self::read_seed('rendeles');
        
        foreach (array_chunk($table_kategoria, 512, true) as $chunk) {
            DB::connection(env('DB_CONNECTION2'))->table('kategoria')->insert($chunk);
        }
        foreach (array_chunk($table_pizza, 512, true) as $chunk) {
            DB::connection(env('DB_CONNECTION2'))->table('pizza')->insert($chunk);
        }
        foreach (array_chunk($table_rendeles, 512, true) as $chunk) {
            DB::connection(env('DB_CONNECTION2'))->table('rendeles')->insert($chunk);
        }
    }
}
