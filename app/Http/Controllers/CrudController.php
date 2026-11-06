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
}
