<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class AdminController extends Controller
{
    public function pedidos(){
        $pedidos = Pedido::where('status', 2)->get();
        return view('dashboard.index', compact('pedidos'));
    }
}
