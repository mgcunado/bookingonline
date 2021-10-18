<?php


/***LECTURA DE VARIABLES DEL FORMULARIO Y MODIFICACIÓN BASE DE DATOS ***/ //

// Convertimos el texto de las variables $fechallegada y $fechasalida en variables de fecha

//list($diallegada,$mesllegada,$aniollegada) = split('[/.-]', $fechallegada); //nota: la función split no se usa en PHP7
//list($diasalida,$messalida,$aniosalida) = split('[/.-]', $fechasalida);

if ($fechallegada != '') {
    list($diallegada, $mesllegada, $aniollegada) = preg_split('~[/.-]~', $fechallegada);
    list($diasalida, $messalida, $aniosalida) = preg_split('~[/.-]~', $fechasalida);
}

$tipo_semana = 1;
$tipo_mes = 0;

$MESCOMPLETO[1] = 'Enero';
$MESCOMPLETO[2] = 'Febrero';
$MESCOMPLETO[3] = 'Marzo';
$MESCOMPLETO[4] = 'Abril';
$MESCOMPLETO[5] = 'Mayo';
$MESCOMPLETO[6] = 'Junio';
$MESCOMPLETO[7] = 'Julio';
$MESCOMPLETO[8] = 'Agosto';
$MESCOMPLETO[9] = 'Septiembre';
$MESCOMPLETO[10] = 'Octubre';
$MESCOMPLETO[11] = 'Noviembre';
$MESCOMPLETO[12] = 'Diciembre';

$MESABREVIADO[1] = 'Ene';
$MESABREVIADO[2] = 'Feb';
$MESABREVIADO[3] = 'Mar';
$MESABREVIADO[4] = 'Abr';
$MESABREVIADO[5] = 'May';
$MESABREVIADO[6] = 'Jun';
$MESABREVIADO[7] = 'Jul';
$MESABREVIADO[8] = 'Ago';
$MESABREVIADO[9] = 'Sep';
$MESABREVIADO[10] = 'Oct';
$MESABREVIADO[11] = 'Nov';
$MESABREVIADO[12] = 'Dic';

$SEMANACOMPLETA[0] = 'lunes';
$SEMANACOMPLETA[1] = 'martes';
$SEMANACOMPLETA[2] = 'miércoles';
$SEMANACOMPLETA[3] = 'jueves';
$SEMANACOMPLETA[4] = 'viernes';
$SEMANACOMPLETA[5] = 'sábado';
$SEMANACOMPLETA[6] = 'domingo';

$SEMANAABREVIADA[0] = 'Lu';
$SEMANAABREVIADA[1] = 'Ma';
$SEMANAABREVIADA[2] = 'Mi';
$SEMANAABREVIADA[3] = 'Ju';
$SEMANAABREVIADA[4] = 'Vi';
$SEMANAABREVIADA[5] = 'Sá';
$SEMANAABREVIADA[6] = 'Do';
////////////////////////////////////
if ($tipo_semana == 0) {
    $ARRDIASSEMANA = $SEMANACOMPLETA;
} elseif ($tipo_semana == 1) {
    $ARRDIASSEMANA = $SEMANAABREVIADA;
}
if ($tipo_mes == 0) {
    $ARRMES = $MESCOMPLETO;
} elseif ($tipo_mes == 1) {
    $ARRMES = $MESABREVIADO;
}

//////////////////////////////////////
if ($diallegada != '') $dia = 1; //SE EVITA EL PROBLEMA DE UN DÍA INEXISTENTE
if ($mesllegada != '') $mes = $mesllegada;
if ($aniollegada != '') $ano = $aniollegada;
//////////////////////////////////////

if (!$dia) $dia = date("d");
if (!$mes) $mes = date("n");
if (!$ano) $ano = date("Y");
