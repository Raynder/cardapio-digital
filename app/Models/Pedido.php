<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    private $produtos = [];

    public function buildProdutos($nome_cliente = ''){
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

        $this->total = $total;
        $this->qtd_itens = $qtd_itens;
        $this->produtos = array_merge($produtos, $bebidas);
        $this->produtos[0]['nome_cliente'] = $nome_cliente;
        $this->pedido_json = json_encode($this->produtos);
        $this->nome_cliente = $nome_cliente;
        $this->status = 1;
        $this->mesa = $_SESSION['user']['mesa'];
        // $_SESSION['produtos'] = [];


    }

    public function getTotal(){
        return $this->total;
    }

    public function getQtdItens(){
        return $this->qtd_itens;
    }

    public function getProdutos(){
        return $this->produtos;
    }

    public function getMesa(){
        return $this->mesa;
    }
}
