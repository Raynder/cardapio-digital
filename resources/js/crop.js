const { default: Form } = require("./forms");

const Crop = {

    iniciarCrop: function (pasta, elem, retangulo = [1, 1]) {
        //1 = Quadrado, 2 = Retangulo, vazio = livre
        $('#_'+elem).ijaboCropTool({
            setRatio: retangulo,
            processUrl: '/admin/crop/salvar/'+pasta,
            withCSRF: ['_token', $('meta[name="csrf-token"]').attr('content')],
            
            onSuccess: function(message, element, status) {
                const form = $('#_'+elem).closest('form');
                form.append('<input type="hidden" name="'+elem+'" value="'+message+'">');

                $('[for="_'+elem+'"]').attr('src', window.location.origin+'/'+message);
                Crop.excluirCrop(message);
            },
            onError(message, element, status) {
               toastr.error(message);
            }
        });
    },

    salvarCrop: function (img, url, url2, token){
        //pegar todos os dados do formulario
        var dados = $('form').serialize();
        dados += '&img='+img;
        dados += '&_token='+token;
        
        $.ajax({
            url: url,
            type: 'POST',
            data: dados,
            success: function(data) {
                if(data.length > 0){
                    toastr.success(data);
                    setTimeout(function(){
                        window.location.href = url2;
                    }, 2000);
                }
                else{
                    toastr.error(data);
                }
            }
        });
    },
    excluirCrop: function(cropDir){
        Form.beforeunloadFuncs.push(cropDir);
    },

    cancelarExcluirCrop: function(){
        Form.beforeunloadFuncs = [];
    },

    eventoEcluir: function(cropDir){
        // deletar arquivo cropDir
        $.ajax({
            url: '/admin/crop/excluir',
            type: 'POST',
            data: {
                cropDir: cropDir,
                _token: $('meta[name="csrf-token"]').attr('content')
            }
        });
    },
    formCrop: function(formId){
        $('form#'+formId)[0].addEventListener('submit', function(e){
            e.preventDefault();
            debugger
            Crop.cancelarExcluirCrop();

            var formData = new FormData(this);
            $.ajax({
                url: this.action,
                type: this.method,
                data: formData,
                processData: false,
                contentType: false,
                success: function(data){
                    window.location.reload();
                }
            });
        });
    }


}

export default Crop;