@php

    echo("
        <style>
            :root {
                --main-color: $cliente->cor_principal;
                --main-light: $cliente->cor_secundaria;
                --accent-light: $cliente->cor_terciaria;
                --font-color: $cliente->cor_fonte;
            }
        </style>
    ")
@endphp
