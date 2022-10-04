import Alertas from "./alertas";

const Qrcode = {

    gerarQrCode: function (nome = '') {
        $.ajax({
            url: window.location.origin+'/app/carrinho/gerarQrCode/'+nome,
            type: 'GET',
            success: function(data) {
                data = JSON.parse(data);
                console.log(data.msg);
                Alertas.alertaSucesso(data.msg);
                setTimeout(function(){
                    window.location.href = window.location.origin+'/qrcode/pedido/'+data.id
                }, 2000);
            },
            error: function(data) {
                Alertas.alertaErro(data);
            }
        });
    },

    consultarPagamentoPix: function (txid, id_pedido) {
        let intervalo = setInterval(function(){
            $.ajax({
                url: window.location.origin+'/qrcode/consultarPagamentoPix',
                type: 'post',
                data: {
                    txid: txid,
                    id_pedido: id_pedido,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if(data != false){
                        Alertas.alertaSucesso(data);
                        clearInterval(intervalo);
                        Qrcode.imprimirPedido(id_pedido);
                    }
                },
                error: function(data) {
                    Alertas.alertaErro(data);
                }
            });
        }, 5000);

    },

    imprimirPedido: function(id){
        Alertas.alertaSucesso('Imprimindo pedido...');
        $.ajax({
            url: window.location.origin+'/qrcode/imprimir-pedido/'+id,
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
    }
}

export default Qrcode;