<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Uzenet;

class UzenetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Uzenet::create([
            'felhasznalo' => 'Felhasználó',
            'szoveg' => 'Üzenet',
        ]);
    }
}
