require('./bootstrap');

const Form = {
    build_form: function (rota) {
        route = rota.toLowerCase();
        route = route.split(' ')
        route[1] = route[1].charAt(0).toUpperCase() + route[1].slice(1);
        route = route.join('');
    
        $.ajax({
            url: 'modals/' + route,
            type: 'GET',
            dataType: 'html',
            success: function(data) {
                $('#modal-body').html(data);
                $('.modal-title').html(rota);
                $('#modal-save').attr('onclick', 'save_' + route + '()');
            }
        })
    },

    salvarForm: function(form, url, redirect, alvo, genero) {
        // verificar se todos os campos com atributo required estão preenchidos, senão retornar mensagem de sucesso
        if ($(form).find('input[required]').filter(function() {
                return this.value == '';
            }).length > 0) {
            toastr.error('Preencha todos os campos!', 'Erro');
            return false;
        } else {
            // verificar se existe um id
            if ($('#id').val() != '') {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: $(form).serialize(),
                    success: function(data) {
                        toastr.success(alvo+' atualizad'+genero+' com sucesso!', 'Sucesso');
                        setTimeout(function() {
                            window.location.href = redirect;
                        }, 2000);
                    },
                    error: function(data) {
                        toastr.error('Erro ao atualizar '+alvo+'!', 'Erro');
                    }
                });
            } else {
                document.querySelector('.salvar').click();
            }
        }
    }
}

export default Form;
