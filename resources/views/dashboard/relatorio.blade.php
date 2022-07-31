@extends('layouts.admin.app')

@section('content')
<link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Relatórios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Relatórios</li>
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


                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Filtro para relatórios</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="" id="filtro">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="col-sm-12" style="display: flex;">
                                            <div class="form-group col-sm-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control float-right" id="reservation">
                                                </div>
                                            </div>

                                            <div class="form-group col-sm-3">
                                                <div class="input-group">
                                                    <button type="button" class="btn btn-default float-right" id="daterange-btn">
                                                        <i class="far fa-calendar-alt"></i> Data específica
                                                        <i class="fas fa-caret-down"></i>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="form-group col-sm-3">
                                                <a class="btn btn-xs bg-success right" id="btn-gerar">
                                                    <i class="fas fa-file-excel"></i> Exportar
                                                </a>
                                            </div>

                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.js') }}"></script>
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<script>
    $('.duallistbox').bootstrapDualListbox()
    $('#reservation').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        }
    }, cb);
    $('#daterange-btn').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        },
        ranges: {
            'Hoje': [moment(), moment()],
            'Ontem': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Ultimos 7 dias': [moment().subtract(6, 'days'), moment()],
            'Ultimos 30 dias': [moment().subtract(29, 'days'), moment()],
            'Este mes': [moment().startOf('month'), moment().endOf('month')],
            'Ultimo mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment(),
    }, cb);

    $(function() {

        var start = moment().subtract(29, 'days');
        var end = moment();

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Hoje': [moment(), moment()],
                'Ontem': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Ultimos 7 dias': [moment().subtract(6, 'days'), moment()],
                'Ultimos 30 dias': [moment().subtract(29, 'days'), moment()],
                'Este mes': [moment().startOf('month'), moment().endOf('month')],
                'Ultimo mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
        }, cb);

        cb(start, end);

    });

    function cb(start, end) {
        $('#reportrange span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
        $('.drp-selected')[0].innerText = start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY');

        Form.build_relatorio("{{ route('criar_relatorio') }}", start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
    }

    
</script>
<style>
</style>
@endsection