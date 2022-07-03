<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Ingrediente;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;
use Nette\Utils\Json;

class ProdutosController extends Controller
{
    function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        $ingredientes = Ingrediente::all();
        return view('produtos.create', compact('ingredientes'));
    }

    public function crop(Request $request)
    {
        $dest = 'img/produtos/';
        $file = $request->file('_imgProduto');
        $new_image_name = time() . '.jpg';

        $move = $file->move(public_path($dest), $new_image_name);
        if ($move) {
            return response()->json(['msg' => $dest . $new_image_name, 'status' => 1]);
        }
        return response()->json(['msg' => 'Erro ao realizar upload', 'status' => 0]);
    }

    public function store(Request $request)
    {
        print_r($request->all());
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required',
        ],
        [
            'required' => 'O campo :attribute é obrigatório'
        ]);

        $request->preco = str_replace(',', '.', str_replace('.', '', $request->preco));

        $produto = new Produto();
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->preco = $request->preco;
        $produto->img = $request->img;
        $produto->capa = $request->capa;
        if($produto->save()){
            // mostrar mensagem de sucesso 
            return 'Produto cadastrado com sucesso!';
        }
        // mostrar mensagem de erro 
        return 'Erro ao cadastrar produto';
    }

    public function edit($id)
    {
        $produto = Produto::find($id);
        $ingredientes = Ingrediente::all();
        return view('produtos.create', compact('produto', 'ingredientes'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required'
        ]);

        $input = $request->all();
        $input['preco'] = str_replace(',', '.', str_replace('.', '', $input['preco']));
        
        if(Produto::find($request->id)->update($input)){
            return 'Produto atualizado com sucesso!';
        }
        return 'Erro ao atualizar produto';
    }

    public function destroy($id)
    {
        $produto = Produto::find($id);
        if($produto->delete()){
            return redirect()->route('produtos')->with('success', 'produto excluído com sucesso!');
        }
        return redirect()->route('produtos')->with('error', 'Erro ao excluir produto');
    }

    public function addIngrediente(Request $request)
    {
        $request->validate([
            'idProduto' => 'required',
            'idIngrediente' => 'required',
            'quantidade' => 'required|min:1'
        ]);

        // produto_ingrediente
        DB::table('produto_ingrediente')->insert([
            'produto_id' => $request->idProduto,
            'ingrediente_id' => $request->idIngrediente,
            'quantidade' => $request->quantidade
        ]);
    }

    public function consultarIngredientes(Request $request)
    {
        $id = $request->idProduto;

        $ingredientes = DB::table('produto_ingrediente')
            ->join('ingredientes', 'produto_ingrediente.ingrediente_id', '=', 'ingredientes.id')
            ->where('produto_ingrediente.produto_id', '=', $id)
            ->select('ingredientes.nome', 'produto_ingrediente.quantidade','produto_ingrediente.id')
            ->get();
        return response()->json($ingredientes);
        exit();
    }
    
    public function removeIngredienteProduto(Request $request)
    {
        // produto_ingrediente
        DB::table('produto_ingrediente')
            ->where('id', '=', $request->id)
            ->delete();

    }
}
