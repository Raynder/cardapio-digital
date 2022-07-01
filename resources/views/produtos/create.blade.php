@extends('layouts.admin.app')

@section('pagina', 'Produtos')

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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header p-2">
                        {{ $info = "" }}
                        {{ $ingre = "" }}

                        <p style="display: none;">
                            {{ Route::currentRouteName() == 'produtos.create' ? $info = "active" : $ingre = "active" }}
                        </p>
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link {{$info}}" href="#informacoes" data-toggle="tab">Produto</a>
                            </li>
                            <li class="nav-item"><a class="nav-link {{$ingre}}" href="#ingredientes" data-toggle="tab">Ingredientes</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <form action="" id="form-produto">
                            <div class="tab-content">
                                <!-- se rota for create -->
                                <div class="tab-pane {{ $info }}" id="informacoes">
                                    @include('produtos.fields')
                                </div>
                                <div class="tab-pane {{ $ingre }}" id="ingredientes">
                                    @include('produtos.ingredientes')
                                </div>
                            </div>
                        </form>

                        <div class="form-group">
                        <button type="button" onclick="Form.salvarForm(
                            '#form-produto',
                            '{{ isset($produto) ? route('produtos.update', $produto->id) : route('produtos.store') }}',
                            '{{route('produtos')}}',
                            'produto',
                            'o'
                            )" class="btn btn-primary">Salvar</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection