<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Cliente_dos extends Controller
{
    function index(){
        return view('cliente.index');
    }
}
