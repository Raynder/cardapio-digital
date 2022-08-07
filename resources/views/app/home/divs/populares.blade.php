<div class="popular section-wrapper">
    <div class="flex-header">
        <h2>Mais pedidos</h2>
        <!-- <a href="">See all</a> -->
    </div>
    <div class="category-items">
        @foreach($maisPedidos as $pedido)
        <div class="category-item">
            <a href="{{ route('app.produtos', $pedido->id) }}">
                <div class="item-img">
                    <div class="item-img-borda">
                        <div class="item-img-bg" style="background-image: url('{{ asset($pedido->img) }}');"></div>
                    </div>
                </div>
                <h4>{{$pedido->nome}}</h4>
                <p>{{$pedido->preco}}</p>
            </a>
        </div>
        @endforeach
    </div>
</div>