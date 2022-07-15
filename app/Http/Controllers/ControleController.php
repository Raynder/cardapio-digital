<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

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
        $pedidoJson = json_decode($pedido->pedido_json);
        
        $totalPedido = 0;

        $html = '<h2 class="tituloMesa">Pedido mesa: '.$pedido->mesa.'</h2><br>';
        $html .= '<hr>';
        foreach($pedidoJson as $item){
            $html .= '<div class="itemLinha"><div class="itemNome">'.$item->nome.'</div> <div class="centro">- - - - - - - -</div><div class="itemValor"> R$ '.$item->preco.'</div></div>';
            $preco = str_replace(',', '.', $item->preco);
            $totalPedido += $preco;

            if(isset($item->ingredientesRemovidos)){
                $html .= '<br><div><p class="tituloIngredientes">Ingredientes removidos:</p>';
                foreach($item->ingredientesRemovidos as $ingrediente){
                    $html .= '<p class="ingrediente">'.$ingrediente->nome.'</p>';
                }
                $html .= '</div>';
            }
            $html .= '<hr>';
            
            
        }
        $html .= '<br><p class="tituloTotal">Total: R$ '.$totalPedido.'</p>';

        return $html;
    }
}