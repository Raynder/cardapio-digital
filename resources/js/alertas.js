const Alertas = {

    alertaSucesso: async function(mensagem) {
        Swal.fire({
            title: mensagem,
            icon: "success",
            button: "Ok"
        });
    },
    alertaErro: async function(mensagem) {
        Swal.fire({
            title: mensagem,
            icon: "error",
            button: "Ok"
        });
    },

    alertaRequisicao: async function(mensagem, funcaoThen) {
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
            if(result.value != undefined && result.value != null && result.value != '') {
                funcaoThen(result.value);
            }
            else{
                funcaoThen('sem nome');
            }
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