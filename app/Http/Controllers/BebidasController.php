<?php

namespace App\Http\Controllers;
use App\Models\Bebida;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BebidasController extends Controller
{
    public function index(){
        $bebidas = Bebida::all();
        return view('bebidas.index', compact('bebidas'));
    }

    public function create()
    {
        return view('bebidas.create');
    }

    public function crop(Request $request)
    {
        $dest = 'img/bebidas/';
        $file = $request->file('_imgBebida');
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
            'preco' => 'required',
        ],
        [
            'required' => 'O campo :attribute é obrigatório'
        ]);

        $request->preco = str_replace(',', '.', str_replace('.', '', $request->preco));

        $bebida = new Bebida();
        $bebida->nome = $request->nome;
        $bebida->preco = $request->preco;
        $bebida->img = $request->img;
        if($bebida->save()){
            // mostrar mensagem de sucesso 
            return 'Bebida cadastrada com sucesso!';
        }
        unlink($request->img);
        return 'Erro ao cadastrar bebida';
    }

    public function edit($id)
    {
        $bebida = Bebida::find($id);
        $bebida->preco = str_replace('.', ',', $bebida->preco);
        return view('bebidas.create', compact('bebida'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'preco' => 'required'
        ]);

        $input = $request->all();
        $input['preco'] = str_replace(',', '.', str_replace('.', '', $input['preco']));
        
        if(Bebida::find($request->id)->update($input)){
            if(isset($request->img) && isset($request->img_antiga)){
                unlink(public_path($request->img_antiga));
            }
            return 'Bebida atualizada com sucesso!';
        }
        isset($request->img) ? unlink(public_path($request->img)) : '';
        return 'Erro ao atualizar bebida';
    }

    public function destroy($id)
    {
        $bebida = Bebida::find($id);
        if(isset($bebida->img)){
            unlink($bebida->img);
        }
        if($bebida->delete()){
            return 'Bebida excluída com sucesso!';
        }
        return 'Erro ao excluir bebida';
    }
}
