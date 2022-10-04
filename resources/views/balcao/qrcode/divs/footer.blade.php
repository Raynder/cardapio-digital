@section('footer')
    <div class="botton-float">
        <div class="botton-add">
            <p onclick=""><span class="las la-trash"></span>Cancelar Pedido</p>
        </div>
    </div>
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
        background: #e8172c;
        padding: 20px;
        border-radius: 20px;
        color: white;
        font-weight: bold;
    }
</style>