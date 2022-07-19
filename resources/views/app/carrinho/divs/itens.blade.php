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