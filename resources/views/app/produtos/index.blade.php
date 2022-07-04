@extends('layouts.app.app')

@section('header')
    <div class="product-header">
        <div class="flex">
            <a onclick="window.history.back();"><span class="las la-angle-left"></span></a>
        </div>
        <div class="product-img" style="background-image: url('{{ asset($produto->capa) }}')"></div>
    </div>
@endsection

@section('content')
    
    @include('app.produtos.divs.info')

    @include('app.produtos.divs.similares')

@endsection

@include('app.produtos.divs.footer')

<style>
    .ingrediente-name {
        font-size: 16pt;
    }
</style>

