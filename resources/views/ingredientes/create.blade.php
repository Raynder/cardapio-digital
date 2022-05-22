@extends('layouts.admin.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ingredientes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Ingredientes</li>
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
                            <h3 class="card-title">Formulario de ingredientes</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form action="{{ isset($ingrediente) ? route('ingredientes.update', $ingrediente->id) : route('ingredientes.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do ingrediente" value="{{ isset($ingrediente) ? $ingrediente->nome : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="medida">Medida</label>
                                    <!-- kg, lt, un -->
                                    <select class="form-control" id="medida" name="medida">
                                        <option value="" selected>Selecione uma medida</option>
                                        <option value="kg" {{ isset($ingrediente) && $ingrediente->medida == 'kg' ? 'selected' : '' }}>Kg</option>
                                        <option value="lt" {{ isset($ingrediente) && $ingrediente->medida == 'lt' ? 'selected' : '' }}>Lt</option>
                                        <option value="un" {{ isset($ingrediente) && $ingrediente->medida == 'un' ? 'selected' : '' }}>Un</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="quantidade">Quantidade</label>
                                    <input type="text" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade do ingrediente" value="{{ isset($ingrediente) ? $ingrediente->quantidade : '' }}">
                                </div>
                                <input type="hidden" name="id" value="{{ isset($ingrediente) ? $ingrediente->id : '' }}" id="id">
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