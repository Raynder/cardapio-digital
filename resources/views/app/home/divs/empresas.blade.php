<div class="empresas section-wrapper">
    <div class="flex-header">
        <h2>Empresas</h2>
        <a href="{{ route('empresas') }}">Ver todas</a>
    </div>
    <div class="items">
        @foreach ($empresas as $empresa)
        <div class="item">
            <div class="item-img" style="background-image: url({{ asset($empresa->foto) }})"></div>
            <h4>{{ $empresa->empresa }}</h4>
        </div>
        @endforeach

    </div>
</div>