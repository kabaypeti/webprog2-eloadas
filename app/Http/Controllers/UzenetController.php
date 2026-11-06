<?php

namespace App\Http\Controllers;

use App\Models\Uzenet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UzenetController extends Controller
{
    public function index()
    {
        $page = request('page', 1);
        $per_page = request('per_page', 10);
        $count = Uzenet::query()->getQuery()->count();
        $max_pages = ceil($count / $per_page);
        
        $uzenetek = Uzenet::orderBy('created_at', 'desc')->paginate($per_page);
        return view('uzenetek', [
            'uzenetek' => $uzenetek,
            'page' => $page,
            'per_page' => $per_page,
            'max_pages' => $max_pages,
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

        $nev = Auth::check() ? Auth::user()->name : 'Vendég';

        Uzenet::create([
            'felhasznalo' => $nev,
            'szoveg'      => $request->input('szoveg'),
        ]);

        $feedback = [];
        $feedback["message_success"] = "Sikeres üzenetküldés!";
        return view('uzenet', [ "feedback" => $feedback ]);
    }
}
