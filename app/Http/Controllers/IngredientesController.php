<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingrediente;

class IngredientesController extends Controller
{
    public function index()
    {
        $ingredientes = Ingrediente::all();

        return view('ingredientes.index', compact('ingredientes'));
    }
    public function create()
    {
        return view('ingredientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'medida' => 'required',
            'quantidade' => 'required'
        ]);

        $ingrediente = new Ingrediente();
        $ingrediente->nome = $request->nome;
        $ingrediente->medida = $request->medida;
        $ingrediente->quantidade = $request->quantidade;
        if($ingrediente->save()){
            return redirect()->route('ingredientes')->with('success', 'Ingrediente cadastrado com sucesso!');
        }
        return redirect()->route('ingredientes')->with('error', 'Erro ao cadastrar ingrediente');
    }

    public function edit($id)
    {
        $ingrediente = Ingrediente::find($id);
        return view('ingredientes.create', compact('ingrediente'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'medida' => 'required',
            'quantidade' => 'required'
        ]);

        $ingrediente = Ingrediente::find($request->id);
        $ingrediente->nome = $request->nome;
        $ingrediente->medida = $request->medida;
        $ingrediente->quantidade = $request->quantidade;
        if($ingrediente->save()){
            return redirect()->route('ingredientes')->with('success', 'Ingrediente atualizado com sucesso!');
        }
        return redirect()->route('ingredientes')->with('error', 'Erro ao atualizar ingrediente');
    }

    public function destroy($id)
    {
        $ingrediente = Ingrediente::find($id);
        if($ingrediente->delete()){
            return redirect()->route('ingredientes')->with('success', 'Ingrediente excluido com sucesso!');
        }
        return redirect()->route('ingredientes')->with('error', 'Erro ao excluir ingrediente');
    }
}
