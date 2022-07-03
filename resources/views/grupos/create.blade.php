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
                        <li class="breadcrumb-item"><a href="{{ route('grupos') }}">Grupos</a></li>
                        @isset($grupo)
                        <li class="breadcrumb-item active">Editar</li>
                        @else
                        <li class="breadcrumb-item active">Cadastrar</li>
                        @endisset
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
                                @include('grupos.fields')

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
