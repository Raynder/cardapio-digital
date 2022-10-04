<div class="resultadoCarrinho">
    <div class="totals">
    
        <p class="total-label">Subtotal</p>
    
        <p class="total-amount">R$ {{number_format($total, 2, ',', '.')}}</p>
    
    </div>
    
    <div class="totals">
    
        <p class="total-label">Desconto</p>
    
        <p class="total-amount">%5</p>
    
    </div>
    
    
    <div class="totals">
    
        <p class="total-label">Total</p>
    
        <p class="total-amount">R$ {{ number_format($total*0.95, 2, ',', '.'); }}</p>
    
    </div>
</div>
<!-- div com qr code -->
<!-- <div class="cart-item">
    <div class="cart-row">
        <div class="cart-row-cell pic">
            <span><img style="
    width: 83vw;
    margin-bottom: 100px;
" src="{{ asset('img/qrcode.png') }}" alt=""></span>
        </div>
        <div class="cart-row-cell desc">
            <h5>QR Code</h5>
            <p>Para pagamento</p>
        </div>
        <div class="cart-row-cell amount">
            <p>R$0,00</p>
        </div>
    </div>
</div> -->