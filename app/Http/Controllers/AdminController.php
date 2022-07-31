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

    public function finalizarPedido($id){
        if(Pedido::find($id)->delete()){
            return 'Pedido finalizado com sucesso!';
        }
        return 'Erro ao finalizar pedido!';
    }

    public function relatorios(){
        $pedidos = Pedido::onlyTrashed()->get();
        return view('dashboard.relatorio', compact('pedidos'));
    }

    public function criar_relatorio(Request $request){
        $pedidos = Pedido::onlyTrashed()->get();
    }
}
