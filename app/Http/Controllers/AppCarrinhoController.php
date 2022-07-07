<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppCarrinhoController extends Controller
{
    public function index(){
        session_start();

        $produtos = $_SESSION['produtos'];
        return view('app.carrinho.index', compact('produtos'));
    }

    public function remover($id){
        session_start();

        foreach($_SESSION['produtos'] as $key => $produto){
            if($produto['id'] == $id){
                unset($_SESSION['produtos'][$key]);
                return "Produto removido com sucesso!";
            }
            return "Produto não encontrado!";
        }
    }

    public function finalizar(){
        session_start();

        $produtos = $_SESSION['produtos'];
        
    }
}
