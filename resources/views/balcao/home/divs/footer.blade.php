@section('footer')
<div class="bottom-nav">
    <div class="bottom-inner">
        <div class="bottom-main">
            <div class="nav-items">
                <div class="nav-item">
                    <a href="{{ route('balcao') }}">
                        <span class="las la-home"></span>
                        <p>Inicio</p>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('balcao.cardapios') }}">
                        <span class="las la-hamburger"></span>
                        <p>Hamburguers</p>
                    </a>
                </div>
            </div>
            <div class="nav-item-main">
                <div>
                    <a href="{{ route('balcao.carrinho') }}"><span class="las la-shopping-cart"></span></a>
                </div>
            </div>
            <div class="nav-items">
                <div class="nav-item">
                    <a href="{{ route('balcao.bebidas') }}">
                        <span class="las la-glass-martini-alt"></span>
                        <p>Bebidas</p>
                    </a>
                </div>
                <div class="nav-item">
                    <!-- <a href="{{ route('home') }}"> -->
                        <span class="las la-ellipsis-h"></span>
                        <p>Add</p>
                    <!-- </a> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection