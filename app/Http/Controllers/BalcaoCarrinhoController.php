<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Pix;

class BalcaoCarrinhoController extends Controller
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

        return view('balcao.carrinho.index', compact('produtos', 'bebidas','total', 'cliente'));
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
        $model = new Pedido();
        $model->buildProdutos($nome);
        $model->save();

        return "Pedido finalizado com sucesso!";        
    }

    public function gerarQrCode($nome = ''){
        $model = new Pedido();
        $model->buildProdutos($nome);
        $model->save();
        
        $pix = new Pix();
        $pix->gerarCobrancaPix($model->getTotal(), $model->getProdutos(), $model->id);

        return json_encode([
            'msg' => 'Pedido salvo, gerando QR Code...',
            'id' => $model->id
        ]);
    }
}
