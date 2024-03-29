@extends('layouts.controle.app')

@section('content')
<div class="cart-container">

    <header>

        <h3>Lista de Pedidos</h3>

    </header>

    <div class="cart-body">

        <div class="cart-item" id="listar">

        </div>

    </div>

    <audio src="{{ asset('audio/audio.mp3') }}" id="audio" style="display: none;"></audio>

</div>
<iframe style="opacity: 0; position: absolute;top: 0;" id="printf" name="printf"></iframe>
@endsection

<script>
    setInterval(function() {
        Controle.listarPedido();
    }, 5000)
</script>

<style>
    h2.tituloMesa {
        text-align: center;
        padding: 0;
    }

    .itemLinha {
        display: flex;
    }

    .itemLinha>div {
        width: 33%;
    }

    .itemValor {
        text-align: right;
    }

    p.ingrediente {
        text-align: right;
    }

    div {
        font-family: emoji;
        padding: 0 7px;
    }

    p.tituloIngredientes {
        font-weight: bold;
    }
    p.tituloTotal {
        font-weight: 500;
        font-family: 'Poppins';
    }
</style>

<style>
    main {
        padding: 0 !important;
    }

    html,
    body {
        height: 100%;
    }

    body {
        margin: 0;

        padding: 0;

        background-color: #aaa;

        font-family: 'Raleway', sans-serif;
    }

    .cart-container {
        border-radius: 8px;

        box-shadow: 0 5px 20px rgb(120, 120, 120);
    }

    .cart-body {
        min-height: 92%;
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

    .cart-container header {
        height: 8%;
        color: #fff;
        text-align: center;
        background-color: #006CB5;

        border-top-left-radius: 8px;

        border-top-right-radius: 8px;
    }

    .cart-container header h3 {
        margin: 0;

        padding: 20px;
    }

    .cart-container footer {
        padding: 20px;

        text-align: center;

        background-color: #ccc;

        border-bottom-left-radius: 8px;

        border-bottom-right-radius: 8px;
    }

    .cart-container footer button {
        color: #fff;

        border: none;

        font-size: 1em;

        padding: 5px 15px;

        background-color: #006CB5;
    }

    .cart-container footer .totals {
        display: flex;

        flex-direction: row;
    }

    .cart-container footer .totals p {
        margin: 5px 0;
    }

    .cart-container footer .total-label {
        flex: 1;

        text-align: left;
    }

    .cart-container footer .total-amount {
        flex: 1;

        text-align: right;
    }
</style>