<?php

namespace App\Http\Controllers;

use App\Models\Grupo;

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

        $grupo = Grupo::find($request->id);
        $imgAntiga = $grupo->img;
        $grupo->nome = $request->nome;
        $grupo->img = $request->img;
        if($grupo->save()){
            unlink($imgAntiga);
            return redirect()->route('grupos')->with('success', 'Grupo atualizado com sucesso!');
        }
        unlink($request->img);
        return redirect()->route('grupos')->with('error', 'Erro ao atualizar grupo');
    }

    public function show($id)
    {
        $grupo = Grupo::find($id);
        return view('grupos.show', compact('grupo'));
    }

    public function destroy($id)
    {
        $grupo = Grupo::find($id);
        if($grupo->delete()){
            unlink($grupo->img);
            return redirect()->route('grupos')->with('success', 'Grupo excluido com sucesso!');
        }
        exit('Erro ao excluir grupo');
    }
}
