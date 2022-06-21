const Ingredientes = {
    alteraMedida: function(medida) {
        if (medida == 'lt') {
            // atribuir mascara ao input
            $('#quantidade').mask('000.000,00', {reverse: true});
        }
        if (medida == 'kg') {
            // atribuir mascara ao input
            $('#quantidade').mask('000.000,00', {reverse: true});
        }
        else if (medida == 'un') {
            // remover mascara do input
            $('#quantidade').unmask();
        }
    },

    consultarMedidas: function(Ingrediente) {
        $.ajax({
            url: '/ingredientes/medidas/' + Ingrediente,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // exibir medidas
                $('#medida').html(data.medidas);
            },
            error: function(data) {
                // exibir erro
                $('#medida').html(data.responseText);
            }
        });
    }

}

export default Ingredientes;