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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Formulario de grupos</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form id="form-grupo" action="{{ isset($grupo) ? route('grupos.update', $grupo->id) : route('grupos.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div style="display: flex;">
                                    <div class="form-group col-md-8">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do grupo" value="{{ isset($grupo) ? $grupo->nome : '' }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="_img">Imagem</label>
                                        <div class="form-group">
                                            <input type="file" class="hidden" id="_img" name="_img" value="">
                                            <input type="text" class="hidden" id="img_antiga" name="img_antiga" value="{{ isset($grupo) ? $grupo->img : '' }}">
                                             <label for="_img">
                                                <img for="_img" src="{{ isset($grupo->img) ? asset($grupo->img) : asset('img/admin/avatar.png') }}" class="img-thumbnail" width="100" height="100">
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" onclick="Form.salvarForm(
                                    'form-grupo',
                                    '{{ isset($grupo) ? route('grupos.update', $grupo->id) : route('grupos.store') }}',
                                    '{{route('grupos')}}'
                                    )" class="btn btn-primary">Salvar</button>
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

<script>
    window.onload = function() {
        Crop.iniciarCrop('grupos','img', 1);
    }
</script>