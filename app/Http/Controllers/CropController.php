<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CropController extends Controller
{
    

    public function store(Request $request, $pasta){
        foreach($request->all() as $key => $value){
            $file = $value;
        }

        if($request->atual){
            // unlink(public_path(Auth::user()->foto));
        }
        $dest = 'img/'.$pasta.'/';
        $new_image_name = time() . '.jpg';

        $move = $file->move(public_path($dest), $new_image_name);
        if ($move) {
            return response()->json(['msg' => $dest . $new_image_name, 'status' => 1]);
        }
        return response()->json(['msg' => 'Erro ao salvar imagem.', 'status' => 0]);
    }

    public function delete(Request $request){
        unlink(public_path($request->cropDir));
    }
}
