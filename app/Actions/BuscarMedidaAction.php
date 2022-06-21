<?php

namespace app\Actions;

use app\Models\Ingrediente;

class BuscarMedidaAction
{
    public function __invoke($id)
    {
        $ingrediente = Ingrediente::find($id);
        return $ingrediente->medida;
    }
}