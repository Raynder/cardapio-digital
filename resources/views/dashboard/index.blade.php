@extends('layouts.admin.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Pedidos</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach($pedidos as $pedido)
                <div class="col-md-12 produto-item">
                    <div class="produto">
                        <div class="caixa-produto">
                            <h1>{{$pedido->mesa}}</h1>
                        </div>
                        <div class="inf">
                            <h1 style="font-size: 16pt;">R${{$pedido->total}}</h1>
                            <p>
                                @isset($pedido->nome_cliente)
                                {{$pedido->nome_cliente}}
                                @endisset
                            </p>
                            <p>
                                {{$pedido->qtd_itens}} itens
                            </p>
                        </div>
                    </div>
                    <div class="caixa">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                        </svg>

                    </div>
                    <div class="caixa">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                        </svg>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
</div>
@endsection

<style>
    .caixa-produto {
        border-radius: 8px 8px;
        clip-path: polygon(70% 40%, 83% 50%, 70% 60%, 70% 100%, 0 100%, 0 0%, 70% 0%);
        background-color: #3184b2;
        width: 113px;
    }

    svg {
        height: 40px;
        width: 40px;
        position: relative;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        color: white;
    }

    .caixa-produto>* {
        position: relative;
        left: 35%;
        top: 50%;
        transform: translate(-50%, -50%);
        color: white;
        text-align: center;
        border: solid;
        width: 40px;
        border-radius: 8px;
    }

    .produto-item {
        margin: 5px 0;
        display: flex;
        background-color: #5ba4cd;
        box-shadow: 100px 66px 55px 39px white inset;
        border-radius: 10px 10px;
    }

    .produto-item>.produto {
        flex: 1 1 150px;
        display: flex;
        padding-left: 0;
    }

    .produto-item>.produto>.inf>h1 {
        font-size: 16pt;
    }
    .produto-item>.produto>.inf>*{
        margin: 0;
    }

    .produto-item>.produto>.inf {
        padding: 10px;
        width: 80%;
    }

    .caixa {
        width: 100px;
    }

    .caixa>svg {
        color: #a2daf9;
    }
</style>