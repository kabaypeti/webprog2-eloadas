<?php
namespace App\Http\Controllers\Database;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GenericDbController;
use App\Models\Pizza;
use App\Services\DbService;
use Illuminate\Http\Request;
use Override;

class PizzaController extends GenericDbController
{
    
    public function __construct(
        protected DbService $db
    )
    {}
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->storeModel($request, ['nev', 'kategorianev', 'vegetarianus']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->updateModel($request, ['kategorianev', 'vegetarianus'], $id);
    }
    
    #[Override]
    protected function getModel(): string
    {
        return Pizza::class;
    }
}
