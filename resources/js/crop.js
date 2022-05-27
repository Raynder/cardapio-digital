const Crop = {

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

}

export default Crop;