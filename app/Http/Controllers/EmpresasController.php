<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    public function index()
    {
        return view('app.empresas.index');
    }
}
