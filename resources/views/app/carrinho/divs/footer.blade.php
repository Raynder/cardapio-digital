@section('footer')
@if($total > 0)
    <div class="botton-float">
        <div class="botton-add">
            <p onclick="Alertas.alertaRequisicao('Deseja informar seu nome no pedido?')"><span class="las la-shopping-cart"></span>Finalizar</p>
        </div>
    </div>
@else
    <div class="botton-float">
        <div class="botton-add">
            <a href="/" style="color:white;"><span class=""></span>Iniciar Pedido</a>
        </div>
    </div>
@endif
@endsection

<style>
    .botton-float {
        position: fixed;
        bottom: 0;
        width: 100%;
        padding: 20px 70px;
    }

    .botton-add {
        text-align: center;
        background: #2ec22e;
        padding: 20px;
        border-radius: 20px;
        color: white;
        font-weight: bold;
    }
</style>