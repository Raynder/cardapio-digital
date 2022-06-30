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
        User::find(Auth::user()->id)->update($request->all());

        print_r($request->all());

        // return redirect()->route('perfil');
    }

    public function foto(Request $request){
        if(Auth::user()->foto != null){
            // unlink(public_path(Auth::user()->foto));
        }
        $dest = 'img/users/';
        $file = $request->file('_foto');
        $new_image_name = time() . '.jpg';

        $move = $file->move(public_path($dest), $new_image_name);
        if ($move) {
            return response()->json(['msg' => $dest . $new_image_name, 'status' => 1]);
            // User::find(Auth::user()->id)->update(['foto' => $dest . $new_image_name]);
            // return response()->json(['msg' => 'Foto atualizada com sucesso!', 'status' => 1]);
        }
        return response()->json(['msg' => 'Erro ao realizar upload', 'status' => 0]);
    }

    public function capa(Request $request){
        if(Auth::user()->capa != null){
            unlink(public_path(Auth::user()->capa));
        }
        $dest = 'img/users/';
        $file = $request->file('_capa');
        $new_image_name = time() . '.jpg';

        $move = $file->move(public_path($dest), $new_image_name);
        if ($move) {
            User::find(Auth::user()->id)->update(['capa' => $dest . $new_image_name]);
            return response()->json(['msg' => 'Capa atualizada com sucesso!', 'status' => 1]);
        }
        return response()->json(['msg' => 'Erro ao realizar upload', 'status' => 0]);
    }
}
