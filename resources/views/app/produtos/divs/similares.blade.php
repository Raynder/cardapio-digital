<div class="products-wrapper section-wrapper">
    <div class="flex-header">
        <h2>Produto similares</h2>
        <a href="products.html">See all</a>
    </div>
    <div class="products">
        <!-- se produtos similares maior que 0 -->
        @if($produtos_similares != [])
            @foreach($produtos_similares as $produto)
                <div class="product">
                    <a href="{{ route('app.produtos', $produto->id) }}">
                    <div class="prod-img" style="background-image: url({{ asset($produto->img) }})"></div>
                    <h3 class="prod-title">{{ $produto->nome }}</h3>
                    <small> <span class="las la-star"></span>
                    {{ $produto->pedidos != null ? $produto->pedidos : 0 }} pedidos</small>
                    <h4 class="prod-price">{{ $produto->preco }}</h4>

                    <button class="to-cart-btn">
                        <span class="las la-plus"></span>
                    </button>
                    </a>
                </div>
            @endforeach
        @else
            <p>Nenhum produto encontrado</p>
        @endif
    </div>
</div>