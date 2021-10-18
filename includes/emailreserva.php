<?php

$destinatario = $emailf;
$asunto = "Reserva de habitación del " . $diallegada . " de " . $MESCOMPLETO[$mesllegada] . " al " . $diasalida . " de " . $MESCOMPLETO[$messalida] . " " . $aniosalida;
$cuerpo = '
<html>
<head>
   <title>Reserva de habitación en Hotel Pasandoelpuente</title>
</head>
<body>
<p><b>Reserva de habitación</b></p>
<p>HOTEL PASANDOELPUENTE</p>
<p>Carretera de los Cantaores, Plaza de Los lunares, 7</p>
<p>51250 FLAMENCO PURO</p>
<p>Tel: (0034) 19501205</p>
<p><br/></p>
<p>Nombre: ' . $nombre . '</p>
<p>Apellidos: ' . $apellidos . '</p>
<p>Telefono: ' . $telefonof . '</p>
<p>email: ' . $emailf . '</p>
<br/>
<p>Entrada: ' . $dsllegada3 . ' ' . $diallegada . ' de ' . $MESCOMPLETO[$mesllegada] . ' ' . $aniollegada . '<br/>
Salida: ' . $dssalida3 . ' ' . $diasalida . ' de ' . $MESCOMPLETO[$messalida] . ' ' . $aniosalida . '<br/>Para ' . $numNoches . ' ' . $noches . $redaccion . '

<p>Habitación: ' . '€ ' . $preciosiniva . '<br/>IVA (' . $iva . '%' . '): ' . '€ ' . $precioiva . '<br/>Precio total: ' . '€ ' . $preciototal . '</p>


<br/>
<p>Datos de la tarjeta de crédito:</p>
<p>N° tarjeta: ' . $creditcard . '</p>
<p>Fecha de caducidad: ' . $caducames . '/' . $caducaano . '</p>
<p>El hotel se reserva el derecho de preautorizar las tarjetas de crédito antes de la fecha de llegada. Si desea cancelar o modificar su reserva llame al Tfn: (0034) 555 555555.</p>
<br/>';

$dondeconocido != '' ? $cuerpo .= '<p>¿Donde nos ha conocido? ' . $dondeconocido . '</p>' : $cuerpo = $cuerpo;
$comentario != '' ? $cuerpo .= '<p>Observaciones: ' . $comentario . '</p>' : $cuerpo = $cuerpo;

$cuerpo .= '</body></html>';

//para el envío en formato HTML
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf8\r\n";

//dirección del remitente
//$headers .= "From: Hotel Pasandoelpuente <pasandoelpuente@pasandoelpuente.com>\r\n";
$headers .= "From: Hotel Pasandoelpuente <orbelanet@orbelanet.com>\r\n";


//dirección de respuesta, si queremos que sea distinta que la del remitente
//$headers .= "Reply-To: ".$emailf."\r\n";

//ruta del mensaje desde origen a destino
//$headers .= "Return-path: ".$emailf."\r\n";

//direcciones que recibián copia
//$headers .= "Cc: pasandoelpuente@pasandoelpuente.com\r\n";
$headers .= "Cc: orbelanet@orbelanet.com\r\n";


//direcciones que recibirán copia oculta
$headers .= "Bcc: mikel@orbelanet.com\r\n";

mail($destinatario, $asunto, $cuerpo, $headers);
echo '<div id="formulario">' . $cuerpo . '<br/>********************</div>';
