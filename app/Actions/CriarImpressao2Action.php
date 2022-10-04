<?php

namespace App\Actions;

class CriarImpressao2Action
{
    public function __invoke($pedido)
    {
        $pedidoJson = json_decode($pedido->pedido_json);
        
        $totalPedido = 0;

        $html = '<h2 class="tituloMesa">Codigo do pedido: '.$pedido->id.'</h2>';
        $html .= '<hr>';
        foreach($pedidoJson as $item){
            $html .= '<div class="itemLinha" style="font-size: 12px;"><p>'.$item->nome.'<span style="float:right;">R$ '.$item->preco.'</span></p></div>';
            $preco = str_replace(',', '.', $item->preco);
            $totalPedido += $preco;

            if(isset($item->ingredientesRemovidos)){
                $html .= '<div><p style="font-size: 13px; font-weight: 900;" class="tituloIngredientes">Ingredientes removidos:</p>';
                foreach($item->ingredientesRemovidos as $ingrediente){
                    $html .= '<p style="font-size: 12px;" class="ingrediente">'.$ingrediente->nome.'</p>';
                }
                $html .= '</div>';
            }
            $html .= '<hr>';
            
            
        }
        $html .= '<p class="tituloTotal">Total: R$ '.$totalPedido.'</p>';
        return $html;
    }
}