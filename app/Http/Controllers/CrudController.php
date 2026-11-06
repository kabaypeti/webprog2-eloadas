<?php

namespace App\Http\Controllers;
use App\Services\DbService;
use App\Models\Kategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class CrudController extends Controller
{
    protected string $modelClass = Kategoria::class;

    public function __construct(
        protected DbService $db
    ) {
        $this->db = $db;
    }
    
    public function getModel(): string
    {
        return $this->modelClass;
    }

    public function index() {
        $page = request('page', 1);
        $per_page = request('per_page', 10);
        
        $model = $this->getModel();
        
        $column_names = $this->db->get_formatted_column_names((new $model)->getTable());
        $count = $model::query()->count();
        $data = $model::query()->paginate($per_page)->toArray()['data'];
        $max_pages = ceil($count / $per_page);
        
        return view('crud', [
            'column_names' => $column_names,
            'data' => $data,
            'page' => $page,
            'per_page' => $per_page,
            'max_pages' => $max_pages,
        ]);
        
    }

    public function create()
    {
        return view('crud_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nev' => 'required|string|unique:kategoria,nev',
            'ar'  => 'required|numeric',
        ], [
            'nev.required' => 'A kategória nevének kitöltése kötelező.',
            'nev.unique'   => 'Ez a kategória név már létezik az adatbázisban.',
            'ar.required'  => 'Az ár kitöltése kötelező.',
            'ar.numeric'   => 'Az ár mezőbe csak számot írhatsz.',
        ]);

        $table = (new $this->modelClass)->getTable();
        $columns = Schema::getColumnListing($table);

        $columns = array_diff($columns, ['created_at', 'updated_at']);

        $this->db->store(new $this->modelClass, $request, $columns);

        return redirect()->route('crud.kategoria.index');
    }
}
