<?php

namespace App\Http\Controllers;

use App\Models\Ende;
use Illuminate\Http\Request;

class EndeController extends Controller
{
    public function index() 
    {
        $ende = Ende::orderByRaw('CAST(song_number AS UNSIGNED) ASC')->get();
        return view ('content.daftar-ende', compact('ende'));
    }
}
