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
    }

}

export default Alertas;