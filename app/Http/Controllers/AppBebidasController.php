<?php

namespace App\Http\Controllers;

use App\Models\Bebida;
use App\Models\Cliente;
use Illuminate\Http\Request;

class AppBebidasController extends Controller
{
    public function index()
    {
        $bebidas = Bebida::all();
        $cliente = Cliente::find(1);
        return view('app.bebidas.index', compact('bebidas', 'cliente'));
    }
}
