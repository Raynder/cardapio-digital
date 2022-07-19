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