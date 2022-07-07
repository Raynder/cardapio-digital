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
}
