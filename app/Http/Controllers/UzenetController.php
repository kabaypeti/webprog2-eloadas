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
}
