<?php

namespace app\Actions;

class CriarImpressaoAction
{
    public function __invoke($pedido)
    {
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