<?php
namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\Rendeles;
use App\Services\GenericDbService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

use function Termwind\render;

class DiagramController extends Controller
{ 

    public function __construct(
        protected GenericDbService $db
    ) {
        $this->db = $db;
    }
    
    public function show() {
        $result = Rendeles::
            selectRaw('pizzanev, SUM(darab) AS darab')
                ->groupBy('pizzanev')
                ->get()
                ->toArray();
                
        $pizzanev = [];
        $darab = [];
        
        foreach ($result as $entry) {
            array_push($pizzanev, $entry['pizzanev']);
            array_push($darab, $entry['darab']);
        }
        
        return view('db_diagram', [
            'data_pizzanev' => $pizzanev,
            'data_darab' => $darab
        ]);
    }
}
