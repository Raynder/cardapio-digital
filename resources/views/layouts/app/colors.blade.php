@php
    use App\Models\Cliente;

    $cliente = Cliente::all()->first();

    echo("
        <style>
            :root {
                --main-color: $cliente->cor_principal;
                --main-light: $cliente->cor_secundaria;
                --accent-light: $cliente->cor_terciaria;
            }
        </style>
    ")
@endphp
