@extends('layouts.app.app')

@section('header')
    <header>
        <!-- H1 centralizado com o nome da empresa -->
        <div class="" style="text-align: center; color: #fff;">
            <h1>
                Cardapio Digital
            </h1>
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
