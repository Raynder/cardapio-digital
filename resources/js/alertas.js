const Alertas = {

    alertaSucesso: function(mensagem) {
        Swal.fire({
            title: mensagem,
            icon: "success",
            button: "Ok"
        });
    },
    alertaErro: function(mensagem) {
        Swal.fire({
            title: mensagem,
            icon: "error",
            button: "Ok"
        });
    },
    alertaRequisicao: function(mensagem) {
        Swal.fire({
            title: mensagem,
            input: 'text',
            inputAttributes: {
              autocapitalize: 'off'
            },
            confirmButtonText: 'Continuar',
            // Se informar nome, o nome sera salvo no banco de dados
            preConfirm: (nome) => {
                return new Promise((resolve, reject) => {
                    resolve(nome);
                })
            }
        })
        .then((result) => {
            Cliente.finalizarCarrinho(result.value);
        });
    }
}

export default Alertas;