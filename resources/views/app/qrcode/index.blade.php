@extends('layouts.app.app')

@section('header')
<header>
    <nav>
        <div class="flex action-bar">
            <a href="{{ route('app') }}"><span class="las la-angle-left"></span></a>
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
@endsection

@include('app.qrcode.divs.footer')