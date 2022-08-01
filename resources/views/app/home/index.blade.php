@extends('layouts.app.app')

@section('header')
<header style="background-image: url('{{ asset($cliente->capa) }}'); background-size: cover;text-align: center; color: #fff;">
    <!-- H1 centralizado com o nome da empresa -->
    <div class="">
        {{ isset($cliente->empresa) ? $cliente->empresa : '' }}
    </div>
    
    <div class="search">
        <span class="las la-search"></span>
        <input type="text" placeholder="Pesquise por um produto">
    </div>
</header>
@endsection

@section('content')

@include('app.home.divs.destaques')

@include('app.home.divs.populares')

@endsection


@include('app.home.divs.footer')
