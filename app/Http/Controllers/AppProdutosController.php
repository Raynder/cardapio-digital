<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;

class AppProdutosController extends Controller
{
    public function index($id){
        $produto = Produto::find($id);
        $produto['preco'] = number_format($produto['preco'], 2, ',', '.');

        $ingredientes = DB::table('produto_ingrediente')
            ->join('ingredientes', 'produto_ingrediente.ingrediente_id', '=', 'ingredientes.id')
            ->where('produto_id', $id)
            ->get();

        return view('app.produtos.index', compact('produto', 'ingredientes'));
    }

    public function produtos(){
        
    }
}
