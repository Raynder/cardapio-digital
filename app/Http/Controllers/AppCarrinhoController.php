<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Pix;

class AppCarrinhoController extends Controller
{
    public function index(){
        $pix = new Pix();
        
        session_start();

        $cliente = Cliente::all()->first();
        $total = 0;
        if(isset($_SESSION['produtos'])){
            $produtos = $_SESSION['produtos'];
            foreach($produtos as $produto){
                $produto['preco'] = str_replace(',', '.', $produto['preco']);
                $total += $produto['preco'];
            }
        } else {
            $produtos = [];
        }

        if(isset($_SESSION['bebidas'])){
            $bebidas = $_SESSION['bebidas'];
            foreach($bebidas as $bebida){
                $total += $bebida['preco'];
            }
        }
        else{
            $bebidas = [];
        }

        return view('app.carrinho.index', compact('produtos', 'bebidas','total', 'cliente'));
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

        $total = 0;
        $qtd_itens = 0;
        $produtos = [];
        $bebidas = [];
        
        if(isset($_SESSION['produtos'])){
            // remover dos produtos os campos descricao,img
            $produtos = $_SESSION['produtos'];
            foreach($produtos as $key => $produto){
                unset($produtos[$key]['descricao']);
                unset($produtos[$key]['img']);
                $total += str_replace(',', '.', $produto['preco']);
                $qtd_itens ++;
            }
        }
        
        if(isset($_SESSION['bebidas'])){
            $bebidas = $_SESSION['bebidas'];
            foreach($bebidas as $key => $bebida){
                $total += $bebida['preco'];
                $qtd_itens ++;
            }
        }
        
        // juntar produtos e bebidas no mesmo array
        $produtos = array_merge($produtos, $bebidas);
        
        $mesa = $_SESSION['user']['mesa'];

        $produtos_json = json_encode($produtos);
        // $pedido = new Pedido();
        // $pedido->mesa = $mesa;
        // $pedido->nome_cliente = $nome;
        // $pedido->total = $total;
        // $pedido->qtd_itens = $qtd_itens;
        // $pedido->status = 1;
        // $pedido->pedido_json = $produtos_json;
        // $pedido->save();
        // $_SESSION['produtos'] = [];

        $pix = new Pix();
        $pix->gerarCobrancaPix($total, $produtos);

        return "Pedido finalizado com sucesso!";        
    }
}
