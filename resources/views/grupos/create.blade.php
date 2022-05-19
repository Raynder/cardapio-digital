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
                        <li class="breadcrumb-item active">Grupos</li>
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
                            <h3 class="card-title">Formulario de grupos</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form action="{{ route('grupos.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do grupo" value="{{ isset($grupo) ? $grupo->nome : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="_imgGrupo">Imagem</label>
                                    <!-- previw -->
                                    @if(isset($grupo))
                                    <img src="{{ asset($grupo->img) }}" alt="{{ $grupo->nome }}" class="img-fluid" width="40px" style="margin:20px">
                                    @endif
                                    <input type="file" class="form-control-file" id="_imgGrupo" name="_imgGrupo">
                                </div>
                                <input type="hidden" name="id" value="{{ isset($grupo) ? $grupo->id : '' }}" id="id">
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