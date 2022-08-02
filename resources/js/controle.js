import Alertas from "./alertas";

const Controle = {

    qtd_pedidos: 0,
    leitura: false,

    listarPedido: function(){
        $.ajax({
            url: window.location.origin+'/controle/listar-pedido',
            type: 'GET',
            success: function(data){
                var html = '';
                var pedido;
                var dataLength = data.length;
                for(var i = 0; i < dataLength; i++){
                    pedido = data[i];
                    html += '<div id="'+pedido.id+'" class="cart-row">';
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

                if (dataLength > Controle.qtd_pedidos || dataLength < Controle.qtd_pedidos){
                    if(Controle.leitura != false && dataLength > Controle.qtd_pedidos) {
                        $('#audio')[0].play();
                    }

                    if(dataLength != Controle.qtd_pedidos) {
                        console.log(dataLength, Controle.qtd_pedidos);
                        $('#listar').html(html);
                        let contador = 0;
                        $('.cart-row-cell').each(function(index, element) {
                            if (contador > 0) {
                                $(element).click(function() {
                                    let id = $(element).parent().attr('id');
                                    Controle.imprimirPedido(id);
                                });
                            }
                            contador = contador + 1;
                            if(contador == 4){
                                contador = 0;
                            }
                        });
                    }

                    Controle.qtd_pedidos = dataLength;
                    Controle.leitura = true;
                }

            }
        });
    },

    removerPedido: function(id){
        Alertas.alertaSimNao('Remover pedido?', function(){
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
        })
    },

    concluirPedido: function(id){
        $.ajax({
            url: window.location.origin+'/controle/concluir-pedido/'+id,
            type: 'GET',
            success: function(data){
                Alertas.alertaSucesso(data)
                Controle.listarPedido();
            },
            error: function(data){
                Alertas.alertaErro(data)
            }
        })
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

                    setTimeout(function(){
                        Alertas.alertaSimNao('Impressão concluida?', function(){
                            Controle.concluirPedido(id);
                        });
                    }, 1000);
                }
            });
        });
    },

    finalizarPedido: function($id){
        Alertas.alertaSimNao('Pedido pago?', function(){
            $.ajax({
                url: window.location.origin+'/admin/dashboard/finalizar-pedido/'+$id,
                type: 'GET',
                success: function(data){
                    Alertas.alertaSucesso(data);
                },
                error: function(data){
                    Alertas.alertaErro(data);
                }
            })
        })
    }
}

export default Controle;