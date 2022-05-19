@extends('layouts.app.app')

@section('header')
    <header>
        <nav>
            <div class="flex action-bar">
                <a href="page-index.html"><span class="las la-angle-left"></span></a>
                <div class="info">
                    <h2>Empresas</h2>
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
                    <h4>Pizzaria Cardoso</h4>
                </a>
            </div>
            <div class="category-item">
                <a href="products.html">
                    <div class="item-img" style="background-image: url('{{asset('img/app/pizzariaCardoso.jpg') }}')"></div>
                    <h4>Pizzaria Cardoso</h4>
                </a>
            </div>
            <div class="category-item">
                <a href="products.html">
                    <div class="item-img" style="background-image: url('{{asset('img/app/pizzariaCardoso.jpg') }}')"></div>
                    <h4>Pizzaria Cardoso</h4>
                </a>
            </div>
            <div class="category-item">
                <a href="products.html">
                    <div class="item-img" style="background-image: url('{{asset('img/app/pizzariaCardoso.jpg') }}')"></div>
                    <h4>Pizzaria Cardoso</h4>
                </a>
            </div>
            <div class="category-item">
                <a href="products.html">
                    <div class="item-img" style="background-image: url('{{asset('img/app/pizzariaCardoso.jpg') }}')"></div>
                    <h4>Pizzaria Cardoso</h4>
                </a>
            </div>
            <div class="category-item">
                <a href="products.html">
                    <div class="item-img" style="background-image: url('{{asset('img/app/pizzariaCardoso.jpg') }}')"></div>
                    <h4>Pizzaria Cardoso</h4>
                </a>
            </div>
            <div class="category-item">
                <a href="products.html">
                    <div class="item-img" style="background-image: url('{{asset('img/app/pizzariaCardoso.jpg') }}')"></div>
                    <h4>Pizzaria Cardoso</h4>
                </a>
            </div>
            <div class="category-item">
                <a href="products.html">
                    <div class="item-img" style="background-image: url('{{asset('img/app/pizzariaCardoso.jpg') }}')"></div>
                    <h4>Pizzaria Cardoso</h4>
                </a>
            </div>
            <div class="category-item">
                <a href="products.html">
                    <div class="item-img" style="background-image: url('{{asset('img/app/pizzariaCardoso.jpg') }}')"></div>
                    <h4>Pizzaria Cardoso</h4>
                </a>
            </div>
        </div>
    </div>
@endsection