<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CropController extends Controller
{
    

    public function store(Request $request, $pasta){
        foreach($request->all() as $key => $value){
            $file = $value;
        }

        $dest = 'img/'.$pasta.'/';
        $new_image_name = time() . '.jpg';

        $move = $file->move($dest, $new_image_name);
        if ($move) {
            return response()->json(['msg' => $dest . $new_image_name, 'status' => 1]);
        }
        return response()->json(['msg' => 'Erro ao salvar imagem.', 'status' => 0]);
    }

    public function delete(Request $request){
        unlink($request->cropDir);
    }
}
