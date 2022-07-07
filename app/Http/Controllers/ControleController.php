<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControleController extends Controller
{
    public function index(){
        return view('controle.index');
    }
}
