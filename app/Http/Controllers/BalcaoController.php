<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Grupo;
use App\Models\Produto;
use App\Models\Cliente;

use Illuminate\Http\Request;

class BalcaoController extends Controller
{
    public function index()
    {
        $grupos = Grupo::all();
        $produtos = Produto::all();
        $cliente = Cliente::all()->first();
        $maisPedidos = $produtos->sortByDesc('pedidos')->take(9);

        session_start();
        // session_destroy();

        if(!isset($_SESSION['user'])){
            $_SESSION['user']['mesa'] = 3;
        }
        // dd($_SESSION);

        return view('balcao.home.index', compact('grupos', 'produtos', 'cliente', 'maisPedidos'));
    }

    public function addProduto(Request $request)
    {
        $produto = Produto::find($request->id);
        
        session_start();
    }
}
