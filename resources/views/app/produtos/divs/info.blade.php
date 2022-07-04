<div class="product-details section-wrapper">
    <h2>{{ $produto->nome }}</h2>
    <div class="details">
        <div>
            R$ &nbsp;{{ ($produto->preco) }}
        </div>
        <div>
            <span class="las la-star"></span>
            {{ $produto->pedidos != null ? $produto->pedidos : 0 }} pedidos
        </div>
    </div>
    @foreach ($ingredientes as $ingrediente)
        <div class="ingrediente">
            <!-- check circular -->
            <div class="check-circular" style="text-align: left;">
                <input type="checkbox" checked id="checkbox-{{ $ingrediente->id }}"/>
                <label class="ingrediente-name" for="checkbox-{{ $ingrediente->id }}">{{ $ingrediente->nome }}</label>
            </div>
        </div>
    @endforeach
</div>

<div class="product-desc section-wrapper">
    <div class="flex">
        <h3>Details</h3>
    </div>
    <div class="description">
        <p>{{ $produto->descricao }}</p>
    </div>
</div>