@foreach($produtos as $produto)
    <div class="cart-item">

        <div class="cart-row" id="produto-{{$produto['id']}}">

            <div class="cart-row-cell pic">

                <a href="#" onclick="Cliente.removeProduto(this)">-</a>

                <span><img width="50" src="{{ asset($produto['img']) }}" alt=""></span>

            </div>

            <div class="cart-row-cell desc">

                <h5>{{$produto['nome']}}</h5>

                <p>#{{$produto['id']}}</p>

            </div>

            <!-- <div class="cart-row-cell quant">

                <ul>
                    <li><a href="#">-</a></li>

                    <li>2</li>

                    <li><a href="#">+</a></li>
                </ul>

            </div> -->

            <div class="cart-row-cell amount">

                <p>R${{$produto['preco']}}</p>

            </div>

        </div>

    </div>
@endforeach

@foreach($bebidas as $bebida)
    <div class="cart-item">

        <div class="cart-row" id="bebida-{{$bebida['id']}}">

            <div class="cart-row-cell pic">

                <a href="#" onclick="Cliente.removeBebida(this)">-</a>

                <span><img height="50" src="{{ asset($bebida['img']) }}" alt=""></span>

            </div>

            <div class="cart-row-cell desc">

                <h5>{{$bebida['nome']}}</h5>

                <p>#{{$bebida['id']}}</p>

            </div>

            <!-- <div class="cart-row-cell quant">

                <ul>
                    <li><a href="#">-</a></li>

                    <li>2</li>

                    <li><a href="#">+</a></li>
                </ul>

            </div> -->

            <div class="cart-row-cell amount">

                <p>R${{str_replace('.', ',', $bebida['preco'])}}</p>

            </div>

        </div>

    </div>
@endforeach