@extends('layouts.admin.app')

@section('pagina', 'Home')

@section('content')
    <div class="content-wrapper" style="min-height: 1345.31px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ isset($perfil->name) ? $perfil->name : 'Meu perfil' }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Perfil</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    @include('perfil.about')
                </div>
                
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#usuario"
                                        data-toggle="tab">Usuario</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#empresa"
                                        data-toggle="tab">Empresa</a>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <form class="form-horizontal" id="form-perfil" action="{{  route('perfil.update', $user->id) }}" method="POST">
                                <div class="tab-content" >
                                    <div class="tab-pane active" id="usuario">
                                        @include('perfil.form')
                                    </div>
                                    <div class="tab-pane" id="empresa">
                                        @include('perfil.form2')
                                    </div>
                                    <button type="button" onclick="Form.salvarForm(
                                        'form-perfil',
                                        '{{ route('perfil.update', $user->id) }}',
                                        '{{route('perfil')}}'
                                        )" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection