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
    },

    addIngredienteProduto: function() {
        var produto = $('#id').val();
        var ingrediente = $('#ingrediente').val();
        var quantidade = $('#ingrediente').next().val();

        $.ajax({
            url: 'addIngrediente',
            type: 'POST',
            data: {
                idProduto: produto,
                idIngrediente: ingrediente,
                quantidade: quantidade,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                toastr.success('Ingrediente adicionado com sucesso!', 'Sucesso');
                setTimeout(function() {
                    Ingredientes.consultarIngredientesProdutos();
                }, 1000);
            },
            error: function(data) {
                toastr.error('Erro ao adicionar ingrediente!', 'Erro');
            }
        });
    },

    consultarIngredientesProdutos: function() {
        var produto = $('#id').val();
        $.ajax({
            url: 'consultarIngredientes',
            type: 'POST',
            data: {
                idProduto: produto,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                //limpar tabela 
                $('#ingredientesProduto').html('');
                // para cada item em data adicionar na tabela
                $.each(data, function(index, value) {
                    $('#ingredientesProduto').append(
                        '<tr>' +
                        '<td>' + value.nome + '</td>' +
                        '<td>' + value.quantidade + '</td>' +
                        '<td>' +
                        '<button type="button" onclick="Ingredientes.removerIngredienteProduto(' + value.id + ')" class="btn btn-danger btn-sm">' +
                        '<i class="fas fa-trash"></i>' +
                        '</button>' +
                        '</td>' +
                        '</tr>'
                    );
                });
            },
            error: function(data) {
                toastr.error('Erro ao consultar ingredientes!', 'Erro');
            }
        });
    },

    removerIngredienteProduto: function(id) {
        $.ajax({
            url: 'removeIngredienteProduto',
            type: 'POST',
            data: {
                id: id,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                toastr.success('Ingrediente removido com sucesso!', 'Sucesso');
                setTimeout(function() {
                    Ingredientes.consultarIngredientesProdutos();
                }, 1000);
            },
            error: function(data) {
                toastr.error('Erro ao remover ingrediente!', 'Erro');
            }
        });
    }
}

$(document).ready(function() {
    // alterar medida
    $('#medida').on('change', function() {
        Ingredientes.alteraMedida($(this).val());
    });

    // consultar medidas
    $('#ingrediente').on('change', function() {
        Ingredientes.consultarMedidas($(this).val());
    });

    // adicionar ingrediente ao produto
    $('#addIngredienteProduto').on('click', function() {
        Ingredientes.addIngredienteProduto();
    }
    );
});

export default Ingredientes;