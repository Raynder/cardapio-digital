@extends('layouts.app.app')

@section('header')
    <header>
        <nav>
            <div class="flex action-bar">
                <a href="{{ route('app') }}"><span class="las la-angle-left"></span></a>
                <div class="info">
                    <h2>Mais pedidos</h2>
                </div>
            </div>
        </nav>
    </header>
@endsection

@section('content')
    <div class="categories section-wrapper">
        <div class="category-items">
            <div class="category-item">
                <a href="products.html">
                    <div class="item-img" style="background-image: url('{{asset('img/app/pizzariaCardoso.jpg') }}')"></div>
                    <h4>Hamburguer 1</h4>
                </a>
            </div>
            <div class="category-item">
                <a href="products.html">
                    <div class="item-img" style="background-image: url('{{asset('img/app/pizzariaCardoso.jpg') }}')"></div>
                    <h4>Hamburguer 2</h4>
                </a>
            </div>
            <div class="category-item">
                <a href="products.html">
                    <div class="item-img" style="background-image: url('{{asset('img/app/pizzariaCardoso.jpg') }}')"></div>
                    <h4>Hamburguer 3</h4>
                </a>
            </div>
            <div class="category-item">
                <a href="products.html">
                    <div class="item-img" style="background-image: url('{{asset('img/app/pizzariaCardoso.jpg') }}')"></div>
                    <h4>Hamburguer 4</h4>
                </a>
            </div>
            <div class="category-item">
                <a href="products.html">
                    <div class="item-img" style="background-image: url('{{asset('img/app/pizzariaCardoso.jpg') }}')"></div>
                    <h4>Hamburguer 5</h4>
                </a>
            </div>
            <div class="category-item">
                <a href="products.html">
                    <div class="item-img" style="background-image: url('{{asset('img/app/pizzariaCardoso.jpg') }}')"></div>
                    <h4>Hamburguer 6</h4>
                </a>
            </div>
            <div class="category-item">
                <a href="products.html">
                    <div class="item-img" style="background-image: url('{{asset('img/app/pizzariaCardoso.jpg') }}')"></div>
                    <h4>Hamburguer 7</h4>
                </a>
            </div>
            <div class="category-item">
                <a href="products.html">
                    <div class="item-img" style="background-image: url('{{asset('img/app/pizzariaCardoso.jpg') }}')"></div>
                    <h4>Hamburguer 8</h4>
                </a>
            </div>
            <div class="category-item">
                <a href="products.html">
                    <div class="item-img" style="background-image: url('{{asset('img/app/pizzariaCardoso.jpg') }}')"></div>
                    <h4>Hamburguer 9</h4>
                </a>
            </div>
        </div>
    </div>
@endsection  