<div class="promo">
    <div class="items promo-items">
        @foreach ($grupos as $grupo)
            <div class="promo-item">
                <div class="promo-img" style="background-image: url('{{ asset($grupo->img) }}')"></div>
                <div class="promo-info">
                    <h3>{{ $grupo->nome }}</h3>
                    <p>{{ $grupo->descricao }}</p>
                    <a href="{{ route('cardapios', $grupo->id) }}">Ver tudo</a>
                </div>
            </div>
        @endforeach
    </div>
</div>