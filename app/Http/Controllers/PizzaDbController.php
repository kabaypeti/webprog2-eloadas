<?php
namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\User;
use App\Services\PizzaDbService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class PizzaDbController extends Controller
{
    
    public function __construct(
        protected PizzaDbService $dbservice
    ) {}
    
    public function show_all(?Request $request, ?string $table = 'pizza'): View {
        $page = $request->get('page', 1);
        $per_page = $request->get('per_page', 10);
    
        $column_names = $this->dbservice->get_column_names($table);
        $table = $this->dbservice->get_table($table);
        $count = $table->get()->count();
        $data = $table->paginate($per_page)->toArray()['data'];
        $max_pages = ceil($count / $per_page);
        
        return view('db_display', [
            'column_names' => $column_names,
            'data' => $data,
            'page' => $page,
            'per_page' => $per_page,
            'max_pages' => $max_pages,
        ]);
    }
}
