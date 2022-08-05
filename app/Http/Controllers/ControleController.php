<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Produto;
use \App\Models\Ingrediente;
use App\Actions\CriarImpressaoAction;

class ControleController extends Controller
{
    public function index(){
        return view('controle.index');
    }

    public function listarPedido(){
        $pedidos = Pedido::where('status', 1)->get();
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

    public function concluirPedido($id){
        $pedido = Pedido::find($id);
        $pedido_json = json_decode($pedido->pedido_json);

        foreach($pedido_json as $item){
            if(!isset($item->img)){
                // Aumentar a quantidade para aparecer em mais pedidos
                $produto = Produto::find($item->id);
                $produto->pedidos += 1;
                $produto->save();
    
                // Remover os ingredientes do estoque
                if(isset($item->ingredientes)){
                    foreach($item->ingredientes as $ingrediente){
                        $ingrediente_id = $ingrediente->id;
                        $ingrediente_quantidade = $ingrediente->quantidade;
                        $ingredienteModel = Ingrediente::find($ingrediente_id);
                        $ingredienteModel->quantidade = $ingredienteModel->quantidade - $ingrediente_quantidade;
                        $ingredienteModel->save();
                    }
                }
            }
        }
        $pedido->status = 2;
        $pedido->save();
        return "Pedido finalizado com sucesso!";
    }
}