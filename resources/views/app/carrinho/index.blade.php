@extends('layouts.app.app')

@section('header')
<header>
        <nav>
            <div class="flex action-bar">
                <a href="{{ route('app') }}"><span class="las la-angle-left"></span></a>
                <div class="info">
                    <h1>Carrinho</h1>
                </div>
            </div>
        </nav>
    </header>
@endsection

@section('content')

<div class="cart-body">

    @include('app.carrinho.divs.itens')

    @include('app.carrinho.divs.total')

    @include('app.carrinho.divs.footer')

</div>



@endsection



<style>
    .cart-body {
        min-height: 60vh;
        border-radius: 20px;
        background-image: linear-gradient(#f9f9f9, #ccc)
    }

    .cart-item {
        padding: 15px 20px 0 20px;
    }

    .cart-row {
        display: flex;

        padding: 15px 0;

        flex-direction: row;

        border-bottom: #ccc 1px solid;
    }

    .cart-row:last-of-type {
        border-bottom: #bbb 1px solid;
    }

    .cart-row-cell {
        height: 50px;
    }

    .cart-row .pic {
        flex: 1;

        position: relative;
    }

    .cart-row .pic a {
        top: -5px;

        left: -5px;

        width: 20px;

        height: 20px;

        color: #000;

        font-size: 1em;

        text-align: center;

        position: absolute;

        border-radius: 10px;

        text-decoration: none;

        display: inline-block;

        background-color: #fff;

        border: #dadada 1px solid;

        box-shadow: 2px 2px 2px rgb(160, 160, 160);
    }

    .cart-row .pic span {
        width: 50px;

        height: 50px;

        border-radius: 30px;

        display: inline-block;

        background-size: contain;

        background-image: url(../image.jpg);
    }


    .cart-row .desc {
        flex: 3;
    }

    .cart-row .desc h5 {
        margin: 10px 0 0;
    }

    .cart-row .desc p {
        margin: 5px 0 0;

        font-size: 0.75em;
    }

    .cart-row .quant {
        flex: 2;
    }

    .cart-row .quant ul {
        list-style: none;
    }

    .cart-row .quant ul li {
        display: inline-block;

        font-size: 1.5em;

        padding: 0 5px;
    }

    .cart-row .quant ul li a {
        color: #000;

        text-decoration: none;
    }

    .cart-row .amount {
        flex: 1;
    }

    .cart-row .amount p {
        margin: 23px 0 0 0;
    }

    .resultadoCarrinho {
        padding: 20px;
    }

    .totals {
        display: flex;

        flex-direction: row;
    }

    .totals p {
        margin: 5px 0;
    }

    .total-label {
        flex: 1;

        text-align: left;
    }

    .total-amount {
        flex: 1;

        text-align: right;
    }
</style>