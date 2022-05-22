<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.css') }}">
    <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminlte.min.css.map') }}" rel="stylesheet">
    <link href="{{ asset('css/ijaboCropTool.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="@yield('body')">
    <div class="wrapper">
        @if(Auth::check())
        @include('layouts.admin.header')

        @include('layouts.admin.sidebar')

        @yield('content')

        @include('layouts.admin.footer')
        @else
        @yield('content')
        @endif
    </div>
</body>
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->

<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<!-- <script src="{{ asset('js/forms.js') }}"></script> -->
<script src="{{ asset('js/ijaboCropTool.min.js') }}"></script>


<script src="{{ asset('js/app.js') }}"></script>
<script>
    $('#_imgGrupo').ijaboCropTool({
        processUrl: '{{ route('grupos.crop') }}',
        withCSRF: ['_token', '{{ csrf_token() }}'],
        onSuccess: function(message, element, status) {
            salvarCrop(message)
            setTimeout(function() {
                location.reload();
            }, 1000);
        },
        onError(message, element, status) {
           toastr.error(message);
        }
    });
    $('#_foto').ijaboCropTool({
        processUrl: '{{ route('perfil.foto') }}',
        withCSRF: ['_token', '{{ csrf_token() }}'],
        onSuccess: function(message, element, status) {
            toastr.success(message);
            setTimeout(function() {
                location.reload();
            }, 1000);
        },
        onError(message, element, status) {
           toastr.error(message);
        }
    });
    $('#_capa').ijaboCropTool({
        setRatio: [1, 1],
        processUrl: '{{ route('perfil.capa') }}',
        withCSRF: ['_token', '{{ csrf_token() }}'],
        onSuccess: function(message, element, status) {
            toastr.success(message);
            setTimeout(function() {
                location.reload();
            }, 1000);
        },
        onError(message, element, status) {
           toastr.error(message);
        }
    });

    function salvarCrop(img){
        $.ajax({
            url: '{{ route('grupos.store') }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                nome: $('#nome').val(),
                img: img
            },
            success: function(data) {
                if(data.length > 0){
                    toastr.success(data);
                    setTimeout(function(){
                        window.location.href = '{{ route('grupos') }}';
                    }, 2000);
                }
                else{
                    toastr.error(data);
                }
            }
        });
    }

   
 
</script>

</html>