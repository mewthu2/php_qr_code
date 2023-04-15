<?php

require __DIR__.'/vendor/autoload.php';

use \APP\Pix\Payload;
use Mpdf\QrCode\Qrcode;
use Mpdf\QrCode\Output; 
//INSTANCIA PRINCIPAL DO PAYLOAD PIX

$obPayload = (new Payload) ->setPixKey('38888275827')/** Aqui eu passo minha chave pix */
                           ->setDescription('Pagamento teste Daniel')
                           ->setMerchantName('Daniel Fernande Correa')
                           ->setMerchantCity('BATATAIS')
                           ->setAmount(100.00)
                           ->setTxId('danieltxid');

//CODIGO DE PAGAMENTO PIX
$payloadQrCode = $obPayload->getPayload();

//QR CODE
$obQrCode = new QrCode($payloadQrCode);

//GERAR IMAGEM QR CODE
$image = (new OutPut\png)->output($obQrCode, 400);

?>

<h1> QR CODE PIX / MEWTHU2 </h1>

<br>

<img src="data::image/png;base64, <?= base64_encode($image) ?>">
<br>

Código Pix:
<strong><?= $payloadQrCode ?></strong>