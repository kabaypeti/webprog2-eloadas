<?php

namespace App\Http\Controllers;

use App\Models\Uzenet;
use Illuminate\Http\Request;

class UzenetController extends Controller
{
    public function index()
    {
        $uzenetek = Uzenet::orderBy('created_at', 'desc')->get();

        return view('uzenetek', [
            'uzenetek' => $uzenetek
        ]);
    }

    public function create()
    {
        return view('uzenet');
    }

    public function store(Request $request)
    {
        $request->validate([
            'szoveg' => 'required|string',
        ], [
            'szoveg.required' => 'Az üzenet szövegének kitöltése kötelező.',
        ]);

        $nev = auth()->check() ? auth()->user()->name : 'Vendég';

        Uzenet::create([
            'felhasznalo' => $nev,
            'szoveg'      => $request->input('szoveg'),
        ]);

        return view('uzenet_siker');
    }
}
