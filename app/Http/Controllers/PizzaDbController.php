<?php
namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class PizzaDbController extends Controller
{
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
        ],
    ];
    
    public function show(?Request $request, ?string $table = 'pizza'): View {
        $connection = env('DB_CONNECTION2');
        $dbc = DB::connection($connection);
        $schema = $dbc->getSchemaBuilder();
        
        $no_limit = $request->no_limit;
        
        $tablecolumns = [];
        if ($schema->hasTable($table)) {
            $tablecolumns = $schema->getColumnListing($table);
            $find = array_search($table, array_keys(self::COLUMN_NAMES));
            if ($find !== false) {
                $tablecolumns = self::COLUMN_NAMES[$table];
            }
        }
        $limit = 10;
        $tabledata = self::getTableContents($table, $connection, $no_limit ? null : $limit);
        return view('db_display', [
            'tablecolumns' => $tablecolumns,
            'tabledata' => $tabledata,
            'overlimit' => self::getTableRowCount($table, $connection) > $limit
        ]);
    }
    
    private static function getTableContents(string $table_name, ?string $connection='default', ?int $limit=null) {
        $dbc = DB::connection($connection);
        $data = [];
        if ($dbc->getSchemaBuilder()->hasTable($table_name)) {
            $t = $dbc->table($table_name);
            if ($limit) {
                $t = $t->limit($limit);
            }
            $data = $t->get();
        }
        return $data;
    }
    
    private static function getTableRowCount(string $table_name, ?string $connection='default') {
        $dbc = DB::connection($connection);
        $count = 0;
        if ($dbc->getSchemaBuilder()->hasTable($table_name)) {
            $t = $dbc->table($table_name);
            $count = $t->count();
        }
        return $count;
    }
}
