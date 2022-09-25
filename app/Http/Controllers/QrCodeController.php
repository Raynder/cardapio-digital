<?php

namespace App\Http\Controllers;

use App\Models\Pix;
use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    public function index($id){
        $pix = Pix::where('id_pedido', $id)->first();
        return view('app.qrcode.index', compact('pix'));
    }
}
