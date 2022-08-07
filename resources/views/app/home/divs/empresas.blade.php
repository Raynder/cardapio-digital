<div class="cardapios section-wrapper">
    <div class="flex-header">
        <h2>cardapios</h2>
        <a href="{{ route('cardapios') }}">Ver todas</a>
    </div>
    <div class="items">
        <!-- verificar se existe cardapios -->
        @if(count($cardapios) > 0)
            @foreach ($cardapios as $cardapio)
            <div class="item">
                <div class="item-img" style="background-image: url({{ asset($cardapio->foto) }})"></div>
                <h4>{{ $cardapio->cardapio }}</h4>
            </div>
            @endforeach
        @endif

    </div>
</div>