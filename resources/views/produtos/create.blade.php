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
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Formulario de produtos</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form action="{{ isset($produto) ? route('produtos.update', $produto->id) : route('produtos.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do produto" value="{{ isset($produto) ? $produto->nome : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="descricao">Descrição</label>
                                    <textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Descrição do produto">{{ isset($produto) ? $produto->descricao : '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="preco">Preço</label>
                                    <input type="text" class="form-control" id="preco" name="preco" placeholder="Preço do produto" value="{{ isset($produto) ? $produto->preco : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="_imgProduto">Imagem</label>
                                    <!-- previw -->
                                    @if(isset($produto))
                                    <img src="{{ asset($produto->img) }}" alt="{{ $produto->nome }}" class="img-fluid" width="40px" style="margin:20px">
                                    @endif
                                    <input type="file" class="form-control-file" id="_imgProduto" name="_imgProduto">
                                </div>
                                <input type="hidden" name="id" value="{{ isset($produto) ? $produto->id : '' }}" id="id">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </form>
                            
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