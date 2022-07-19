<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Actions\CriarImpressaoAction;

class ControleController extends Controller
{
    public function index(){
        return view('controle.index');
    }

    public function listarPedido(){
        $pedidos = Pedido::all();
        return response()->json($pedidos);
    }

    public function removerPedido($id){
        $pedido = Pedido::find($id);
        $pedido->delete();
        return "Pedido removido com sucesso!";
    }

    public function imprimirPedido($id){
        $pedido = Pedido::find($id);
        
        $html = (new CriarImpressaoAction())($pedido);

        return $html;
    }
}