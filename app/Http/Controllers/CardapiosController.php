<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardapiosController extends Controller
{
    public function index()
    {
        return view('app.cardapios.index');
    }
}
