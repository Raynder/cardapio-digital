@extends('layouts.app.app')

@section('header')
    <header>
        <nav>
            <div class="flex action-bar">
                <a href="{{ route('app') }}"><span class="las la-angle-left"></span></a>
                <div class="info">
                    <h1>{{ $grupo->nome }}</h1>
                </div>
            </div>
        </nav>
    </header>
@endsection

@section('content')
    <div class="categories section-wrapper">
        <div class="category-items">
            @foreach ($produtos as $produto)
                <div class="category-item">
                    <a href="products.html">
                        <div class="item-img" style="background-image: url('{{ asset($produto->img) }}')"></div>
                        <h4>{{ $produto->nome }}</h4>
                        <p>R$ {{ $produto->preco }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection  