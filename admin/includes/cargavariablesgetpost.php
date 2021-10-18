<?php

/***VARIABLES POR GET ***/
/*
$numero = count($_GET);
$tags = array_keys($_GET);// obtiene los nombres de las variables
$valores = array_values($_GET);// obtiene los valores de las variables

// crea las variables y les asigna el valor
for($i=0;$i<$numero;$i++){
$$tags[$i]=$valores[$i];
}
 */
/***VARIABLES POR POST ***/
/*
$numero2 = count($_POST);
$tags2 = array_keys($_POST); // obtiene los nombres de las variables
$valores2 = array_values($_POST);// obtiene los valores de las variables

// crea las variables y les asigna el valor
for($i=0;$i<$numero2;$i++){
$$tags2[$i]=$valores2[$i];
}
 */

/***VARIABLES POR REQUEST ***/
/*$numero = count($_REQUEST);
$tags = array_keys($_REQUEST);// obtiene los nombres de las variables
$valores = array_values($_REQUEST);// obtiene los valores de las variables

// crea las variables y les asigna el valor
for($i=0;$i<$numero;$i++){
$$tags[$i]=$valores[$i];
}*/


$fechallegada = isset($_REQUEST['fechallegada']) ? $_REQUEST['fechallegada'] : '';
$tarifasestandar = isset($_REQUEST['tarifasestandar']) ? $_REQUEST['tarifasestandar'] : '';
$diallegada = isset($_REQUEST['diallegada']) ? $_REQUEST['diallegada'] : '';
$mesllegada = isset($_REQUEST['mesllegada']) ? $_REQUEST['mesllegada'] : '';
$aniollegada = isset($_REQUEST['aniollegada']) ? $_REQUEST['aniollegada'] : '';
$diasalida = isset($_REQUEST['diasalida']) ? $_REQUEST['diasalida'] : '';
$messalida = isset($_REQUEST['messalida']) ? $_REQUEST['messalida'] : '';
$aniosalida = isset($_REQUEST['aniosalida']) ? $_REQUEST['aniosalida'] : '';
$fechasalida = isset($_REQUEST['fechasalida']) ? $_REQUEST['fechasalida'] : '';
$dia = isset($_REQUEST['dia']) ? $_REQUEST['dia'] : '';
$mes = isset($_REQUEST['mes']) ? $_REQUEST['mes'] : '';
$ano = isset($_REQUEST['ano']) ? $_REQUEST['ano'] : '';
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$tarea = isset($_REQUEST['tarea']) ? $_REQUEST['tarea'] : '';
$estado_ocupacion = isset($_REQUEST['estado_ocupacion']) ? $_REQUEST['estado_ocupacion'] : '';
$importets1 = isset($_REQUEST['importets1']) ? $_REQUEST['importets1'] : '';
$importets2 = isset($_REQUEST['importets2']) ? $_REQUEST['importets2'] : '';
$importets3 = isset($_REQUEST['importets3']) ? $_REQUEST['importets3'] : '';
$importets4 = isset($_REQUEST['importets4']) ? $_REQUEST['importets4'] : '';
$importets5 = isset($_REQUEST['importets5']) ? $_REQUEST['importets5'] : '';
$importets6 = isset($_REQUEST['importets6']) ? $_REQUEST['importets6'] : '';
$importets7 = isset($_REQUEST['importets7']) ? $_REQUEST['importets7'] : '';
$importets8 = isset($_REQUEST['importets8']) ? $_REQUEST['importets8'] : '';
$importets9 = isset($_REQUEST['importets9']) ? $_REQUEST['importets9'] : '';
$importets10 = isset($_REQUEST['importets10']) ? $_REQUEST['importets10'] : '';
$num_habitaciones = isset($_REQUEST['num_habitaciones']) ? $_REQUEST['num_habitaciones'] : '';
$estanmin1 = isset($_REQUEST['estanmin1']) ? $_REQUEST['estanmin1'] : '';
$estanmin2 = isset($_REQUEST['estanmin2']) ? $_REQUEST['estanmin2'] : '';
$estanmin3 = isset($_REQUEST['estanmin3']) ? $_REQUEST['estanmin3'] : '';
$estanmin4 = isset($_REQUEST['estanmin4']) ? $_REQUEST['estanmin4'] : '';
$importe1 = isset($_REQUEST['importe1']) ? $_REQUEST['importe1'] : '';
$importe2 = isset($_REQUEST['importe2']) ? $_REQUEST['importe2'] : '';
$importe3 = isset($_REQUEST['importe3']) ? $_REQUEST['importe3'] : '';
$importe4 = isset($_REQUEST['importe4']) ? $_REQUEST['importe4'] : '';
$importe5 = isset($_REQUEST['importe5']) ? $_REQUEST['importe5'] : '';
$ckdesayuno1 = isset($_REQUEST['ckdesayuno1']) ? $_REQUEST['ckdesayuno1'] : '';
$ckdesayuno2 = isset($_REQUEST['ckdesayuno2']) ? $_REQUEST['ckdesayuno2'] : '';
$ckdesayuno3 = isset($_REQUEST['ckdesayuno3']) ? $_REQUEST['ckdesayuno3'] : '';
$ckdesayuno4 = isset($_REQUEST['ckdesayuno4']) ? $_REQUEST['ckdesayuno4'] : '';
