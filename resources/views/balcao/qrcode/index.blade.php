@extends('layouts.app.app')

@section('header')
<header>
    <nav>
        <div class="flex action-bar">
            <a href="{{ route('balcao') }}"><span class="las la-angle-left"></span></a>
            <div class="info">
            </div>
        </div>
    </nav>
</header>
@endsection

@section('content')
<div class="categories section-wrapper">
    <!-- total -->
    <div class="total">
        <h2 align='center'>Total: R$ {{ $pix->valor }}</h2>
    </div>
    <!-- qrcode -->
    <img style="width: 100%;" src="{{ asset('img/qrcode'.$pix->id_pedido.'.png') }}" alt="QRCode">
</div>

<iframe style="opacity: 0; position: absolute;top: 0;" id="printf" name="printf"></iframe>

<script>

    document.addEventListener('DOMContentLoaded', function() {
        Qrcode.consultarPagamentoPix('{{ $pix->txid }}', '{{ $pix->id_pedido }}');
    });
</script>
@endsection

@include('balcao.qrcode.divs.footer')
