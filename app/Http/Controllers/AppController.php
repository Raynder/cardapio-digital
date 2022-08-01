<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Grupo;
use App\Models\Produto;
use App\Models\Cliente;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $grupos = Grupo::all();
        $produtos = Produto::all();
        $cliente = Cliente::all()->first();

        session_start();

        if(!isset($_SESSION['user'])){
            $_SESSION['user']['mesa'] = 2;
        }
        // dd($_SESSION);

        return view('app.home.index', compact('grupos', 'produtos', 'cliente'));
    }

    public function addProduto(Request $request)
    {
        $produto = Produto::find($request->id);
        
        session_start();
    }
}
