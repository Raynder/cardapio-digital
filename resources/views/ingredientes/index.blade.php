@extends('layouts.admin.app')

@section('content')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.colReorder.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">

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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ingredientes no estoque</h3>
                            <a href="{{ route('ingredientes.create') }}" class="btn btn-success btn-sm float-right">Novo ingrediente</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Medida</th>
                                        <th>Quantidade</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ingredientes as $ingrediente)
                                    <tr>
                                        <td>{{ $ingrediente->nome }}</td>
                                        <td>{{ $ingrediente->medida }}</td>
                                        <td>{{ $ingrediente->quantidade }}</td>
                                        <td>
                                            <a href="{{ route('ingredientes.edit', $ingrediente->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                            <a href="{{ route('ingredientes.destroy', $ingrediente->id) }}" class="btn btn-danger btn-sm">Excluir</a>
                                        </td>
                                    </tr>
                                    @endforeach
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
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            colReorder: false
        });
    });
</script>
@endsection