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
    }
}

export default Form;
