const Utils = {

    executeAjaxRemoverTr: function(url, tr){
        $.ajax({
            url: url,
            type: 'GET',
            success: function(data){
                Alertas.alertaSucesso(data);
                // remover elemento da tabela pelo id 
                $('#'+tr).remove();
            },
            error: function(data){
                Alertas.alertaErro(data);
            }
        });
    },

    build_relatorio: function(url) {
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html',
            success: function(data) {
                $('#modal-body').html(data);
                $('#modal-save').attr('onclick', 'window.print()');
            }
        })
    }

}
export default Utils;