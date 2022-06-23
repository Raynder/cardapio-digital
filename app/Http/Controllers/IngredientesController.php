<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingrediente;

class IngredientesController extends Controller
{
    public function index()
    {
        $ingredientes = Ingrediente::all();
        // formatar ingrediente->quantidade
        foreach ($ingredientes as $ingrediente) {
            if($ingrediente->medida != 'un'){
                $ingrediente->quantidade = number_format($ingrediente->quantidade, 2, ',', '.');
            }
        }

        return view('ingredientes.index', compact('ingredientes'));
    }
    public function create()
    {
        return view('ingredientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|unique:ingredientes',
            'medida' => 'required',
            'quantidade' => 'required'
        ],
        [
            'required' => 'O campo :attribute é obrigatório',
            'unique' => 'O ingrediente já existe'
        ]);


        $request->quantidade = str_replace(',', '.', str_replace('.', '', $request->quantidade));

        $ingrediente = new Ingrediente();
        // impedir salvar nomes repetidos no banco de dados
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
        if($ingrediente->medida != 'un'){
            $ingrediente->quantidade = number_format($ingrediente->quantidade, 2, ',', '.');
        }
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
        $request->quantidade = str_replace(',', '.', str_replace('.', '', $request->quantidade));
        
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
