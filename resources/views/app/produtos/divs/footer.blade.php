@section('footer')
<div class="botton-float">
    <div class="botton-add">
        <p><span class="las la-shopping-cart"></span>Adicionar</p>
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
        background: #2ec22e;
        padding: 20px;
        border-radius: 20px;
        color: white;
        font-weight: bold;
    }
</style>