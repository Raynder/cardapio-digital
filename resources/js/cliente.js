import Alertas from "./alertas";

const Cliente = {

    ambiente: window.location.href.split(window.location.origin)[1].split('/')[1],
    produto: {
        id: 0,
        nome_cliente: '',
        preco: 0,
        descricao: '',
        img: '',
        ingredientes: [],
        ingredientesRemovidos: []
    },

    getProduto: function () {
        return this.produto;
    },

    setProduto: function (id, nome, preco, descricao, img) {
        this.produto.id = id;
        this.produto.nome = nome;
        this.produto.preco = preco;
        this.produto.descricao = descricao;
        this.produto.img = img;
    },

    pushIngrediente: function (id, nome, quantidade) {
        let ingrediente = {
            id: id,
            nome: nome,
            quantidade: quantidade
        }

        this.produto.ingredientes.push(ingrediente);
    },

    pullIngrediente: function (id) {
        let ingrediente = this.produto.ingredientes.find(ingrediente => ingrediente.id == id);
        this.produto.ingredientes.splice(this.produto.ingredientes.indexOf(ingrediente), 1);
        return ingrediente;
    },

    pushIngredienteRemovido: function (ingrediente) {
        this.produto.ingredientesRemovidos.push(ingrediente);
    },

    addProduto: function () {
        let id;
        let ingredienteRemovido;

        document.querySelectorAll('[type="checkbox"]').forEach(function (item){
            id = item.id.split('-')[1];
            
            if(!item.checked){
                ingredienteRemovido = Cliente.pullIngrediente(id);
                Cliente.pushIngredienteRemovido(ingredienteRemovido);
            }
        })

        

        let dados;
        dados = {
            produto: this.produto,
            _token: $('meta[name="csrf-token"]').attr('content')
        }
        
        $.ajax({
            url: window.location.origin+'/'+this.ambiente+'/produtos/salvar',
            type: 'POST',
            data: dados,
            success: function(data) {
                Alertas.alertaSucesso('Produto salvo com sucesso!');
                setTimeout(function(){
                    window.location.href = window.location.origin+'/'+this.ambiente+'';
                }, 2000);
            },
            error: function(data) {
                Alertas.alertaErro('Erro ao salvar produto!');
            }
        });
    },

    removeProduto: function (elem) {
        parent = elem.parentElement.parentElement;

        let id = parent.id.split('-')[1];

        $.ajax({
            url: window.location.origin+'/'+this.ambiente+'/carrinho/remover'+'/'+id,
            type: 'GET',
            success: function(data) {
                Alertas.alertaSucesso(data);
            },
            error: function(data) {
                Alertas.alertaErro(data);
            }
        });

        parent.parentElement.remove();
    },

    addBebida: function (id) {
        let dados = {
            id: id,
            _token: $('meta[name="csrf-token"]').attr('content')
        }

        Alertas.alertaSimNao('Deseja adicionar o produto ao carrinho?',function(){
            $.ajax({
                url: window.location.origin+'/'+this.ambiente+'/bebidas',
                type: 'post',
                data: dados,
                success: function(data) {
                    Alertas.alertaSucesso(data);
                },
                error: function(data) {
                    Alertas.alertaErro(data);
                }
            });
        });
    
    },

    removeBebida: function (elem) {
        parent = elem.parentElement.parentElement;
        // pegar oq tem depois de window.location.origin
        urlFinal = window.location.href.split(window.location.origin)[1];

        let id = parent.id.split('-')[1];

        $.ajax({
            url: window.location.origin+'/'+this.ambiente+'/bebidas/remover'+'/'+id,
            type: 'post',
            data: {
                id: id,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                Alertas.alertaSucesso(data);
            },
            error: function(data) {
                Alertas.alertaErro(data);
            }
        });

        parent.parentElement.remove();
    },

    finalizarCarrinho: function (nome = '') {
        $.ajax({
            url: window.location.origin+'/'+this.ambiente+'/carrinho/finalizar/'+nome,
            type: 'GET',
            success: function(data) {
                Alertas.alertaSucesso(data);
                setTimeout(function(){
                    window.location.href = window.location.origin+'/'+this.ambiente+'';
                }, 2000);
            },
            error: function(data) {
                Alertas.alertaErro(data);
            }
        });
    }
}

export default Cliente;