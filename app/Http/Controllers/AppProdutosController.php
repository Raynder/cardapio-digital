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
            ->select('ingredientes.nome', 'ingredientes.id', 'produto_ingrediente.quantidade as quantidade')
            ->get();

        return view('app.produtos.index', compact('produto', 'ingredientes'));
    }

    public function addProduto($id, Request $request){
        $produto = Produto::find($id);
        
        $produto['ingredientes'] = [$request->except('_token')];

        print_r($produto);

        return response()->json($produto);
    }

    public function find($id) {
        $produto = Produto::find($id);

        return response()->json($produto);
    }

    public function store(Request $request){
        $input = $request->except('_token');

        session_start();
        $_SESSION['produtos'][] = $input['produto'];
        return 'Produto adicionado com sucesso!';
    }
}
