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
    },
    alertaSimNao: async function(mensagem, callback = null) {
        Swal.fire({
            title: mensagem,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sim",
            cancelButtonText: "Não"
        }).then((result) => {
            if (result.value) {
                console.log('Sim');
                if(callback != null){
                    callback();
                }
                return true;
            }
            console.log('Não');
            return false;
        });
    }
        
}

export default Alertas;