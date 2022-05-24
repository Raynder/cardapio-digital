@extends('layouts.admin.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Produtos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Produtos</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form style="padding: 0;display: flex;" action="" method="POST" enctype="multipart/form-data">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Formulario de produtos</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                @csrf
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" required="required" id="nome" name="nome" placeholder="Nome do produto" value="{{ isset($produto) ? $produto->nome : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="descricao">Descrição</label>
                                    <textarea class="form-control" required="required" id="descricao" name="descricao" rows="3" placeholder="Descrição do produto">{{ isset($produto) ? $produto->descricao : '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="preco">Preço</label>
                                    <input type="text" class="form-control" required="required" id="preco" name="preco" placeholder="Preço do produto" value="{{ isset($produto) ? $produto->preco : '' }}">
                                </div>
                                <div class="form-group">
                                    @if(isset($produto))
                                    <img src="{{ asset($produto->img) }}" alt="{{ $produto->nome }}" class="img-fluid" width="40px" style="margin:20px">
                                    @endif
                                    <input type="file" class="form-control-file hidden salvar" id="_imgProduto" name="_imgProduto">
                                </div>
                                <input type="hidden" name="id" value="{{ isset($produto) ? $produto->id : '' }}" id="id">
                                <button type="button" onclick="salvarForm('{{ isset($produto) ? route('produtos.update', $produto->id) : route('produtos.store') }}','{{route('produtos')}}')" class="btn btn-primary">Salvar</button>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    @if(isset($produto))
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Ingredientes</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="input-group input-group-sm">
                                    <select class="form-control" id="ingrediente" name="ingrediente">
                                        <option>Selecione</option>
                                        @foreach($ingredientes as $ingrediente)
                                        <option value="{{ $ingrediente->id }}">{{ $ingrediente->nome }}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" placeholder="Quantidade" class="form-control">
                                    <span class="input-group-append">
                                        <button type="button" onclick="addIngredienteProduto()" class="btn btn-info btn-flat">Add!</button>
                                    </span>
                                </div>

                            </div>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Ingrediente</th>
                                        <th>Qtd</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody id="ingredientesProduto">
                                    
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card -->
                    </div>
                    @endif
                </form>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

<script>
    setTimeout(function() {
        consultarIngredientesProdutos();
    }, 2000);

    function salvarForm(url, redirect) {
        // verificar se todos os campos com atributo required estão preenchidos, senão retornar mensagem de sucesso
        if ($('form').find('input[required]').filter(function() {
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
                    data: $('form').serialize(),
                    success: function(data) {
                        toastr.success('Produto atualizado com sucesso!', 'Sucesso');
                        setTimeout(function() {
                            window.location.href = redirect;
                        }, 2000);
                    },
                    error: function(data) {
                        toastr.error('Erro ao atualizar produto!', 'Erro');
                    }
                });
            } else {
                document.querySelector('.salvar').click();
            }
        }
    }

    function addIngredienteProduto() {
        var produto = $('#id').val();
        var ingrediente = $('#ingrediente').val();
        var quantidade = $('#ingrediente').next().val();

        $.ajax({
            url: '{{ route('produtos.addIngrediente') }}',
            type: 'POST',
            data: {
                idProduto: produto,
                idIngrediente: ingrediente,
                quantidade: quantidade,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                toastr.success('Ingrediente adicionado com sucesso!', 'Sucesso');
                setTimeout(function() {
                    consultarIngredientesProdutos();
                }, 1000);
            },
            error: function(data) {
                toastr.error('Erro ao adicionar ingrediente!', 'Erro');
            }
        });
    }

    function consultarIngredientesProdutos(){
        var produto = $('#id').val();
        $.ajax({
            url: '{{ route('produtos.consultarIngredientes') }}',
            type: 'POST',
            data: {
                idProduto: produto,
                _token: '{{ csrf_token() }}'
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
                        '<button type="button" onclick="removerIngredienteProduto(' + value.id + ')" class="btn btn-danger btn-sm">' +
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
    }

    function removerIngredienteProduto(id) {
        $.ajax({
            url: '{{ route('produtos.removeIngredienteProduto') }}',
            type: 'POST',
            data: {
                id: id,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                toastr.success('Ingrediente removido com sucesso!', 'Sucesso');
                setTimeout(function() {
                    consultarIngredientesProdutos();
                }, 1000);
            },
            error: function(data) {
                toastr.error('Erro ao remover ingrediente!', 'Erro');
            }
        });
    }
</script>