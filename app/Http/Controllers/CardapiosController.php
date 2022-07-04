<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;

class CardapiosController extends Controller
{
    public function index(Request $request)
    {
        if(isset($request->id)){
                
            $id = $request->id;

            $produtos = DB::table('grupo_produto')
                ->join('grupos', 'grupos.id', '=', 'grupo_produto.grupo_id')
                ->join('produtos', 'produtos.id', '=', 'grupo_produto.produto_id')
                ->where('grupos.id', $id)
                ->select('produtos.id', 'produtos.nome', 'produtos.descricao', 'produtos.img', 'produtos.preco', 'grupos.nome as grupo_nome')
                ->get();

            $grupo = DB::table('grupos')
                ->where('id', $id)
                ->select('nome')
                ->first();

            return view('app.cardapios.index', compact('produtos', 'grupo'));
        }
        else{
            $grupo['nome'] = 'Hamburguers';
            $grupo = (object) $grupo;
            $produtos = Produto::all();
            return view('app.cardapios.index', compact('produtos', 'grupo'));
        }
    }
}
