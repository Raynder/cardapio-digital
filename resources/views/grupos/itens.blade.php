@extends('layouts.admin.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Grupos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Grupos de Produtos</li>
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
                            <!-- <a href="{{ route('grupos.create') }}" class="btn btn-success btn-sm float-right">Novo grupo</a> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="input-group input-group-sm">
                                    <select class="form-control" id="produto" name="produto">
                                        <option>Selecione</option>
                                        @foreach($produtos as $produto)
                                        <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                                        @endforeach
                                    </select>
                                    <select class="form-control" id="grupo" name="grupo">
                                        <option>Selecione</option>
                                        @foreach($grupos as $grupo)
                                        <option value="{{ $grupo->id }}">{{ $grupo->nome }}</option>
                                        @endforeach
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
                                <tbody id="ingredientesProduto">
                                    
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