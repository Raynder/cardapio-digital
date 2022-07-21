@extends('layouts.admin.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Relatorios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Relatorios</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Grupos de produtos ativos</h3>
                            <select onchange="consultarGrupoProdutos(this)" class="btn btn-success btn-sm float-right" id="filtro" name="filtro">
                                <option value="">Tudo</option>
                            </select>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="input-group input-group-sm">
                                    <select class="form-control" id="produto" name="produto">
                                        <option>Selecione</option>
                                    </select>
                                    <select class="form-control" id="grupo" name="grupo">
                                        <option>Selecione</option>
                                    </select>
                                    <span class="input-group-append">
                                        <button type="button" onclick="addProdutoGrupo()" class="btn btn-info btn-flat">Add!</button>
                                    </span>
                                </div>

                            </div>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Grupo</th>
                                        <th>Produto</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody id="grupoProdutos">
                                    
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
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
        consultarGrupoProdutos();
    }, 2000);

    function addProdutoGrupo() {
        var produto = $('#produto').val();
        var grupo = $('#grupo').val();

        $.ajax({
            url: '{{ route('grupos.addProduto') }}',
            type: 'POST',
            data: {
                idProduto: produto,
                idGrupo: grupo,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                if(data.status){
                    toastr.success(data.msg, 'Sucesso');
                    setTimeout(function() {
                        consultarGrupoProdutos();
                    }, 1000);
                }
                else{
                    toastr.error(data.msg, 'Erro');
                }
            },
            error: function(data) {
                toastr.error('Erro desconhecido!', 'Erro');
            }
        });
    }

    function consultarGrupoProdutos(element = ''){
        //pegar valor do select
        filtro = $('#filtro').val();
        //buscar todos os dados em grupos_produtos
        $.ajax({
            url: '{{ route('grupos.consultarProduto') }}',
            type: 'GET',
            data: {
                filtro: filtro,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                //limpar tabela 
                $('#grupoProdutos').html('');
                // para cada item em data adicionar na tabela
                $.each(data, function(index, value) {
                    $('#grupoProdutos').append(
                        '<tr>' +
                        '<td>' + value.grupo + '</td>' +
                        '<td>' + value.produto + '</td>' +
                        '<td>' +
                        '<button type="button" onclick="removerGrupoProduto(' + value.id + ')" class="btn btn-danger btn-sm">' +
                        '<i class="fas fa-trash"></i>' +
                        '</button>' +
                        '</td>' +
                        '</tr>'
                    );
                });
            },
            error: function(data) {
                toastr.error('Erro ao buscar relações!', 'Erro');
            }
        });
    }

    function removerGrupoProduto(id) {
        $.ajax({
            url: '{{ route('grupos.removeGrupoProduto') }}',
            type: 'POST',
            data: {
                id: id,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                toastr.success('Relação removida com sucesso!', 'Sucesso');
                setTimeout(function() {
                    consultarGrupoProdutos();
                }, 1000);
            },
            error: function(data) {
                toastr.error('Erro ao remover relação!', 'Erro');
            }
        });
    }
</script>