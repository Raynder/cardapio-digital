<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

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

    public function finalizar($nome = ''){
        session_start();

        $produtos = $_SESSION['produtos'];
        $total = 0;
        $qtd_itens = 0;
        // remover dos produtos os campos descricao,img
        foreach($produtos as $key => $produto){
            unset($produtos[$key]['descricao']);
            unset($produtos[$key]['img']);
            $total += str_replace(',', '.', $produto['preco']);
            $qtd_itens ++;
        }
        $mesa = $_SESSION['user']['mesa'];

        $produtos_json = json_encode($produtos);
        $pedido = new Pedido();
        $pedido->mesa = $mesa;
        $pedido->nome_cliente = $nome;
        $pedido->total = $total;
        $pedido->qtd_itens = $qtd_itens;
        $pedido->status = 1;
        $pedido->pedido_json = $produtos_json;
        $pedido->save();
        // $_SESSION['produtos'] = [];

        return "Pedido finalizado com sucesso!";        
    }
}
