<script>
    $(function(){
        Cliente.setProduto('{{ $produto->id }}', '{{ $produto->nome }}', '{{ $produto->preco }}', '{{ $produto->descricao }}', '{{ $produto->img }}');
    })
</script>

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
                <input type="checkbox" checked id="checkbox-{{ $ingrediente->id }}" name="{{ $ingrediente->nome }}" />
                <label class="ingrediente-name" for="checkbox-{{ $ingrediente->id }}">{{ $ingrediente->nome }}</label>
            </div>
        </div>
        <script>
            Cliente.pushIngrediente('{{ $ingrediente->id }}', '{{ $ingrediente->nome }}', '{{ $ingrediente->quantidade }}');
        </script>
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

<style>
    /* checkbox checkeds com cor verde */
    input[type="checkbox"]:checked + label:before {
        border-color: red;
        background-color: red;
    }
</style>