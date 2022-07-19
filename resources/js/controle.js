import Alertas from "./alertas";

const Controle = {

    listarPedido: function(){
        $.ajax({
            url: window.location.origin+'/controle/listar-pedido',
            type: 'GET',
            success: function(data){
                var html = '';
                var pedido;
                for(var i = 0; i < data.length; i++){
                    pedido = data[i];
                    html += '<div class="cart-row" onclick="Controle.imprimirPedido('+pedido.id+')">';
                    html += '<div onclick="Controle.removerPedido('+pedido.id+')" class="cart-row-cell pic">';
                    html += '<a>-</a>';
                    html += '<span><img src="img/mesa.png" alt="" width="50"></span>';
                    html += '</div>';
                    html += '<div class="cart-row-cell desc">';
                    // se existir pedido.nome
                    if(pedido.nome_cliente){
                        html += '<h5>'+pedido.nome_cliente+'</h5>';
                    }
                    else{
                        html += '<h5>Sem nome</h5>';
                    }
                    html += '<p># Mesa '+pedido.mesa+'</p>';
                    html += '</div>';
                    html += '<div class="cart-row-cell quant">';
                    html += '<ul>';
                    html += 'itens: ';
                    html += '<li>'+pedido.qtd_itens+'</li>';
                    html += '</ul>';
                    html += '</div>';
                    html += '<div class="cart-row-cell amount">';
                    html += '<p>R$'+pedido.total+'</p>';
                    html += '</div>';
                    html += '</div>';
                }
                $('#listar').html(html);
            }
        });
    },

    removerPedido: function(id){
        $.ajax({
            url: window.location.origin+'/controle/remover-pedido/'+id,
            type: 'GET',
            success: function(data){
                Alertas.alertaSucesso(data);
                Controle.listarPedido();
            },
            error: function(data){
                Alertas.alertaErro(data);
            }
        });
    },

    imprimirPedido: function(id){
        Alertas.alertaSimNao('Deseja imprimir o pedido?', function(){
            $.ajax({
                url: window.location.origin+'/controle/imprimir-pedido/'+id,
                type: 'GET',
                success: function(data){
                    $('#printf').contents().find('body').html(data);
                    // $('body').html(data);
                    window.frames['printf'].focus();
                    window.frames['printf'].print();
    
                    setTimeout(function() {
                        $('#printf').contents().find('body').html('');
                    }, 8000);
                }
            });
        });
    }
}

export default Controle;