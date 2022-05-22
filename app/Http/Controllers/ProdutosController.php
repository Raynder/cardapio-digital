<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutosController extends Controller
{
    function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        return view('produtos.create');
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
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required',
            'img' => 'required'
        ]);

        $produto = new Produto();
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->preco = $request->preco;
        $produto->img = $request->img;
        if($produto->save()){
            return redirect()->route('produtos')->with('success', 'produto cadastrado com sucesso!');
        }
        return redirect()->route('produtos')->with('error', 'Erro ao cadastrar produto');
    }

    public function edit($id)
    {
        $produto = Produto::find($id);
        return view('produtos.create', compact('produto'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'medida' => 'required',
            'quantidade' => 'required'
        ]);

        $produto = Produto::find($request->id);
        $produto->nome = $request->nome;
        $produto->medida = $request->medida;
        $produto->quantidade = $request->quantidade;
        if($produto->save()){
            return redirect()->route('produtos')->with('success', 'produto atualizado com sucesso!');
        }
        return redirect()->route('produtos')->with('error', 'Erro ao atualizar produto');
    }

    public function destroy($id)
    {
        $produto = Produto::find($id);
        if($produto->delete()){
            return redirect()->route('produtos')->with('success', 'produto excluido com sucesso!');
        }
        return redirect()->route('produtos')->with('error', 'Erro ao excluir produto');
    }
}
