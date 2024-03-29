<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
require __DIR__ . '/../../vendor/autoload.php';
use App\Models\Gerencianet\Exception\GerencianetException;
use App\Models\Gerencianet\Gerencianet;
use Exception;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class Pix extends Model
{
    use HasFactory;
    protected $table = 'pix';
    protected $fillable = [
        'chaveTemporaria',
        'valor',
        'status'
    ];

    public function gerarChavePix(){
        try {
            $api = Gerencianet::getInstance();
            $pix = $api->pixCreateEvp([], [
            ]);
            
            echo($pix['chave']);
            return $pix['chave'];
        } catch (GerencianetException $e) {
            print_r($e->code);
            print_r($e->error);
            print_r($e->errorDescription);
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }

    public function gerarCobrancaPix($valor, $pedidos, $id_pedido, $chavePix = 'raynder4@gmail.com'){
        $valor = number_format($valor, 2, '.', '');
        $valor = strval($valor);

        $params = [];
        
        if(isset($pedidos[0]['nome_cliente']) && !empty($pedidos[0]['nome_cliente'])){
            $params[0] = [
                'nome' => 'Cliente:',
                'valor' => $pedidos[0]['nome_cliente']
            ];
        }

        for($i = 0; $i < count($pedidos); $i++){
            $params[$i+1] = [
                'nome' => $pedidos[$i]['nome'],
                'valor' => $pedidos[$i]['preco']
            ];
        }
        

        $body = [
            "calendario" => [
                "expiracao" => 3600
            ],
            "devedor" => [
                "cpf" => "12345678909",
                "nome" => "Nome do cliente"
            ],
            "valor" => [
                "original" => $valor
            ],
            "chave" => $chavePix, // Chave pix da conta Gerencianet do recebedor
            "solicitacaoPagador" => "Pagamento do seu pedido.", //DESCRICAO
            "infoAdicionais" => $params
        ];
        
        try {
            $api = Gerencianet::getInstance();
            $pix = $api->pixCreateImmediateCharge([], $body);
        
            if ($pix['txid']) {
                $params = [
                    'id' => $pix['loc']['id']
                ];
        
                // Gera QRCode
                $qrcode = $api->pixGenerateQRCode($params);
        
                // echo '<pre>' . json_encode($pix, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</pre>';
        
                // echo 'Imagem:<br />';
                // echo '<img src="' . $qrcode['imagemQrcode'] . '" />';
                file_put_contents('img/qrcode'.$id_pedido.'.png', file_get_contents($qrcode['imagemQrcode']));
                $this->status = '1';
                $this->txid = $pix['txid'];
                $this->valor = $valor;
                $this->id_pedido = $id_pedido;
                $this->save();

                return $qrcode['qrcode'];
            } else {
                echo '<pre>' . json_encode($pix, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</pre>';
            }
        } catch (GerencianetException $e) {
            print_r($e->code);
            print_r($e->error);
            print_r($e->errorDescription);
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }

    public function consultarCobrancaPix($txid){
                
        $params = ['txid' => $txid];

        try {
            $api = Gerencianet::getInstance();
            $pix = $api->pixDetailCharge($params);

            if ($pix['status'] == 'CONCLUIDA') {
                return 'pago';
            } else {
                return false;
            }

            // echo '<pre>' . json_encode($pix, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</pre>';
        } catch (GerencianetException $e) {
            print_r($e->code);
            print_r($e->error);
            print_r($e->errorDescription);
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }
}
