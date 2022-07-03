<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cliente;
use Facade\FlareClient\Http\Client;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cliente = Cliente::all()->first();

        return view('perfil.index', compact('user', 'cliente'));
    }

    public function update(Request $request){
        $requestUser = $request->except('cor_principal', 'cor_secundaria', 'cor_terciaria');
        $requestCliente = $request->only('cor_principal', 'cor_secundaria', 'cor_terciaria');

        if(User::find(Auth::user()->id)->update($requestUser)){
            if(isset($requestUser['foto']) && isset($requestUser['foto_antiga'])){
                unlink(public_path($requestUser['foto_antiga']));
            }
            if(isset($requestUser['capa']) && isset($requestUser['capa_antiga'])){
                unlink(public_path($requestUser['capa_antiga']));
            }

            Cliente::all()->first()->update($requestCliente);
            return 'Perfil atualizado com sucesso!';
        }

        return 'Erro ao atualizar perfil!';
    }
}
