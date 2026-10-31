<?php
namespace App\Http\Controllers\Database;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GenericDbController;
use App\Models\Kategoria;
use App\Services\GenericDbService;
use Illuminate\Http\Request;
use Override;

class KategoriaController extends GenericDbController
{
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->storeModel($request, ['nev', 'ar']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->updateModel($request, ['ar'], $id);
    }
    
    #[Override]
    protected function getModel(): string
    {
        return Kategoria::class;
    }
}
