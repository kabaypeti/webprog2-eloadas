<?php
namespace App\Http\Controllers\Database;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GenericDbController;
use App\Models\Rendeles;
use App\Services\GenericDbService;
use Illuminate\Http\Request;
use Override;

class RendelesController extends GenericDbController
{
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->storeModel($request, ['pizzanev', 'darab', 'felvetel', 'kiszallitas']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->updateModel($request, ['pizzanev', 'darab', 'felvetel', 'kiszallitas'], $id);
    }
    
    #[Override]
    protected function getModel(): string
    {
        return Rendeles::class;
    }
}
