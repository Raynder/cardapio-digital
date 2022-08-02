@extends('layouts.app.app')

@section('header')
    <header>
        <nav>
            <div class="flex action-bar">
                <a href="{{ route('app') }}"><span class="las la-angle-left"></span></a>
                <div class="info">
                    <h1>Bebidas</h1>
                </div>
            </div>
        </nav>
    </header>
@endsection

@section('content')
    <div class="categories section-wrapper">
        <div class="category-items">
            @foreach($bebidas as $bebida)
                <div class="product">
                    <a href="{{ route('app.bebidas', $bebida->id) }}">
                    <div class="prod-img" style="background-image: url({{ asset($bebida->img) }})"></div>
                    <h3 class="prod-title">{{ $bebida->nome }}</h3>
                    <h4 class="prod-price">{{ $bebida->preco }}</h4>

                    <button class="to-cart-btn">
                        <span class="las la-plus"></span>
                    </button>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection 

@include('app.home.divs.footer')