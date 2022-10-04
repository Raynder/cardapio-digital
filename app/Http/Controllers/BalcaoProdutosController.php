<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;

class BalcaoProdutosController extends Controller
{
    public function index($id){
        // oq compensa mais?
        // trazer todos os produtos e depois pegar os similares ou
        // ir no banco 3 vezes ate conseguir pegar os similares?

        $cliente = DB::table('clientes')->first();
        $produto = Produto::find($id);

        $grupos = DB::table('grupo_produto')->where('produto_id', $id)->get();
        $produtos_similares = DB::table('grupo_produto')
            ->join('produtos', 'grupo_produto.produto_id', '=', 'produtos.id')
            ->where('grupo_produto.grupo_id', $grupos[0]->grupo_id)
            ->get()
            ->take(4);

        $produto['preco'] = number_format($produto['preco'], 2, ',', '.');

        $ingredientes = DB::table('produto_ingrediente')
            ->join('ingredientes', 'produto_ingrediente.ingrediente_id', '=', 'ingredientes.id')
            ->where('produto_id', $id)
            ->select('ingredientes.nome', 'ingredientes.id', 'produto_ingrediente.quantidade as quantidade')
            ->get();

        return view('balcao.produtos.index', compact('produto', 'ingredientes', 'cliente', 'produtos_similares'));
    }

    public function addProduto($id, Request $request){
        $produto = Produto::find($id);
        
        $produto['ingredientes'] = [$request->except('_token')];

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
