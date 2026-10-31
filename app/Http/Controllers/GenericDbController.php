<?php
namespace App\Http\Controllers;

use App\Services\GenericDbService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

abstract class GenericDbController extends Controller
{ 

    public function __construct(
        protected GenericDbService $db
    ) {
        $this->db = $db;
    }
    
    public function index() {
        $page = request('page', 1);
        $per_page = request('per_page', 10);
        
        $model = $this->getModel();
        
        $column_names = $this->db->get_formatted_column_names((new $model)->getTable());
        $count = $model::query()->get()->count();
        $data = $model::query()->paginate($per_page)->toArray()['data'];
        $max_pages = ceil($count / $per_page);
        
        return view('db_display', [
            'column_names' => $column_names,
            'data' => $data,
            'page' => $page,
            'per_page' => $per_page,
            'max_pages' => $max_pages,
        ]);
    }
    
    public function storeModel(?Request $request, array $columns) {
        $model = $this->getModel();
        $this->db->store(new $model, $request, $columns);
    }
    
    public function show(string $id)
    {
        return $this->db->show($this->getModel(), $id);
    }
    
    protected function updateModel(Request $request, array $columns, string $id) {
        $this->db->update($this->getModel(), $request, $columns, $id);
    }
    
    public function destroy(string $id)
    {
        $this->db->destroy($this->getModel(), $id);
    }
    
    protected abstract function getModel(): string;
}
