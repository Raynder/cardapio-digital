<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class GruposController extends Controller
{
    public function index()
    {
        $grupos = Grupo::all();
        return view('grupos.index', compact('grupos'));
    }

    public function create()
    {
        return view('grupos.create');
    }

    public function crop(Request $request)
    {
        $dest = 'img/grupos/';
        $file = $request->file('_imgGrupo');
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
            'img' => 'required'
        ]);

        $grupo = new Grupo();
        $grupo->nome = $request->nome;
        $grupo->img = $request->img;
        if($grupo->save()){
            exit('Grupo cadastrado com sucesso!');
        }
        unlink($request->img);
        exit('Erro ao cadastrar grupo');
    }

    public function edit($id)
    {
        $grupo = Grupo::find($id);
        return view('grupos.create', compact('grupo'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'img' => 'required'
        ]);

        if(Grupo::find($request->id)->update($request->all())){
            unlink($request->img_antiga);
            return 'Grupo atualizado com sucesso!';
        }
        unlink($request->img);
        return 'Erro ao atualizar grupo';
    }

    public function show($id)
    {
        $grupo = Grupo::find($id);
        return view('grupos.show', compact('grupo'));
    }

    public function destroy($id)
    {
        $grupo = Grupo::find($id);
        DB::table('grupo_produto')->where('grupo_id', $id)->delete();
        if($grupo->delete()){
            unlink($grupo->img);
            return redirect()->route('grupos')->with('success', 'Grupo excluido com sucesso!');
        }
        exit('Erro ao excluir grupo');
    }

    public function itens(){
        $grupos = Grupo::all();
        $produtos = Produto::all();
        return view('grupos.itens', compact('grupos','produtos'));
    }

    public function addProduto(Request $request){
        $request->validate([
            'idProduto' => 'required',
            'idGrupo' => 'required'
        ]);

        $grupoProduto = DB::table('grupo_produto')
            ->where('produto_id', $request->idProduto)
            ->where('grupo_id', $request->idGrupo)
            ->first();
        
        if($grupoProduto){
            return response()->json(['msg' => 'Relação já cadastrado no grupo', 'status' => 0]);
        }

        DB::table('grupo_produto')->insert([
            'grupo_id' => $request->idGrupo,
            'produto_id' => $request->idProduto
        ]);

        return response()->json(['msg' => 'Relação criada com sucesso', 'status' => 1]);
    }

    public function consultarProduto(Request $request){
        $grupo_produtos = DB::table('grupo_produto')
            ->join('grupos', 'grupos.id', '=', 'grupo_produto.grupo_id')
            ->join('produtos', 'produtos.id', '=', 'grupo_produto.produto_id');
        if(isset($request->filtro)){
            $grupo_produtos = $grupo_produtos->where('grupos.id', $request->filtro);
        }
        $grupo_produtos = $grupo_produtos->select('grupos.nome as grupo', 'produtos.nome as produto', 'grupo_produto.id as id')
            ->get();
        
        return response()->json($grupo_produtos);
        exit();
    }

    public function removeGrupoProduto(Request $request){
        DB::table('grupo_produto')->where('id', $request->id)->delete();
    }
}
