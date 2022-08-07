@php

$cor_principal = isset($cliente->cor_principal) ? $cliente->cor_principal : '#e8172c';
$cor_secundaria = isset($cliente->cor_secundaria) ? $cliente->cor_secundaria : '#d76565';
$cor_terciaria = isset($cliente->cor_terciaria) ? $cliente->cor_terciaria : '#f5ebb8';
$cor_fonte = isset($cliente->cor_fonte) ? $cliente->cor_fonte : '#ffffff';
$borda = isset($cliente->borda) ? $cliente->borda : '1px';

echo("
<style>
    .item-img-borda {
        padding: {$borda}px;
        height: 100%;
    }

    .item-img-bg {
        height: 100%;
        border-radius: 10px;
        background-size: cover;
        background-position: center;
    }

    :root {
        --main-color: $cor_principal;
        --main-light: $cor_secundaria;
        --accent-light: $cor_terciaria;
        --font-color: $cor_fonte;
    }
</style>
")
@endphp