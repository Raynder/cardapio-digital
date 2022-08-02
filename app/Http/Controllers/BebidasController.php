<?php

namespace App\Http\Controllers;
use App\Models\Bebida;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BebidasController extends Controller
{
    public function index(){
        $cliente = DB::table('clientes')->first();
        $bebidas = Bebida::all();
        return view('app.bebidas.index', compact('bebidas', 'cliente'));
    }
}
