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

    public function find($id) {
        $bebida = Bebida::find($id);

        return response()->json($bebida);
    }

    public function store(Request $request){
        $bebida = Bebida::find($request->id)->only('id', 'nome', 'preco', 'img');
        
        session_start();
        unset($_SESSION['bebidas']);
        $_SESSION['bebidas'][] = $bebida;
        return 'Bebida adicionada com sucesso!';
    }
}
