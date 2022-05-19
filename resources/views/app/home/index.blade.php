@extends('layouts.app.app')

@section('header')
    <header>
        <nav>
            <div class="info">
                <p>Olá!</p>
                <p>Vamos pedir um lanche?</p>
            </div>
            <!-- <div class="img" style="background-image: url('{{asset('img/app/user.jpg') }}')"></div> -->
        </nav>
        <div class="search">
            <span class="las la-search"></span>
            <input type="text" placeholder="Pesquise por um estabelecimento">
        </div>
    </header>
@endsection

@section('content')

    @include('app.home.divs.empresas')

    @include('app.home.divs.destaques')

    @include('app.home.divs.populares')

@endsection