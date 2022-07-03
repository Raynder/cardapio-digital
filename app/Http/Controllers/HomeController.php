<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('perfil.index', compact('user'));
    }

    public function update(Request $request){
        if(User::find(Auth::user()->id)->update($request->all())){
            if(isset($request->foto) && isset($request->foto_antiga)){
                unlink(public_path($request->foto_antiga));
            }
            if(isset($request->capa) && isset($request->capa_antiga)){
                unlink(public_path($request->capa_antiga));
            }
            return 'Perfil atualizado com sucesso!';
        }

        return 'Erro ao atualizar perfil!';
    }
}
