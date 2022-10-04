<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Pix;
use App\Actions\CriarImpressao2Action;
use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    public function index($id){
        $pix = Pix::where('id_pedido', $id)->first();
        return view('balcao.qrcode.index', compact('pix'));
    }

    public function consultarPagamentoPix(Request $request){
        $input = $request->all();
        $pix = Pix::where('id_pedido', $input['id_pedido'])->first();
        $txid = $input['txid'];
        if($pix->consultarCobrancaPix($txid) == 'pago'){
            $pix->status = 2;
            if(Pedido::where('id', $pix->id_pedido)->update(['status' => 3])){
                $pix->save();
                unlink(public_path('img/qrcode'.$pix->id_pedido.'.png'));
                return "Pagamento confirmado com sucesso!";
            }
        } else {
            return false;
        }
    }

    public function imprimirPedido($id){
        $pedido = Pedido::find($id);
        
        $html = (new CriarImpressao2Action())($pedido);

        return $html;
    }
}
