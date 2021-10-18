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

$titulo_menu = isset($_REQUEST['titulo_menu']) ? $_REQUEST['titulo_menu'] : '';
$fechasalida = isset($_REQUEST['fechasalida']) ? $_REQUEST['fechasalida'] : '';
$fechasalida3 = isset($_REQUEST['fechasalida3']) ? $_REQUEST['fechasalida3'] : '';
$dia = isset($_REQUEST['dia']) ? $_REQUEST['dia'] : '';
$mes = isset($_REQUEST['mes']) ? $_REQUEST['mes'] : '';
$ano = isset($_REQUEST['ano']) ? $_REQUEST['ano'] : '';
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

$diallegada = isset($_REQUEST['diallegada']) ? $_REQUEST['diallegada'] : '';
$mesllegada = isset($_REQUEST['mesllegada']) ? $_REQUEST['mesllegada'] : '';
$aniollegada = isset($_REQUEST['aniollegada']) ? $_REQUEST['aniollegada'] : '';
$diasalida = isset($_REQUEST['diasalida']) ? $_REQUEST['diasalida'] : '';
$messalida = isset($_REQUEST['messalida']) ? $_REQUEST['messalida'] : '';
$aniosalida = isset($_REQUEST['aniosalida']) ? $_REQUEST['aniosalida'] : '';
$fechallegada = isset($_REQUEST['fechallegada']) ? $_REQUEST['fechallegada'] : '';
$fechallegada2 = isset($_REQUEST['fechallegada2']) ? $_REQUEST['fechallegada2'] : '';
$fechallegada3 = isset($_REQUEST['fechallegada3']) ? $_REQUEST['fechallegada3'] : '';
$creditcard = isset($_REQUEST['creditcard']) ? $_REQUEST['creditcard'] : '';



$autorizacion = isset($_REQUEST['autorizacion']) ? $_REQUEST['autorizacion'] : '';
$idioma = isset($_REQUEST['idioma']) ? $_REQUEST['idioma'] : '';
$numhabitaciones1 = isset($_REQUEST['numhabitaciones1']) ? $_REQUEST['numhabitaciones1'] : '';
$numhabitaciones2 = isset($_REQUEST['numhabitaciones2']) ? $_REQUEST['numhabitaciones2'] : '';
$numhabitaciones3 = isset($_REQUEST['numhabitaciones3']) ? $_REQUEST['numhabitaciones3'] : '';
$numhabitaciones4 = isset($_REQUEST['numhabitaciones4']) ? $_REQUEST['numhabitaciones4'] : '';
$modiffechas = isset($_REQUEST['modiffechas']) ? $_REQUEST['modiffechas'] : '';
$sumpvpdesayuno = isset($_REQUEST['sumpvpdesayuno']) ? $_REQUEST['sumpvpdesayuno'] : '';
$desayunos1 = isset($_REQUEST['desayunos1']) ? $_REQUEST['desayunos1'] : '';
$desayunos2 = isset($_REQUEST['desayunos2']) ? $_REQUEST['desayunos2'] : '';
$desayunos3 = isset($_REQUEST['desayunos3']) ? $_REQUEST['desayunos3'] : '';
$desayunos4 = isset($_REQUEST['desayunos4']) ? $_REQUEST['desayunos4'] : '';
$numhab1 = isset($_REQUEST['numhab1']) ? $_REQUEST['numhab1'] : '';
$numhab2 = isset($_REQUEST['numhab2']) ? $_REQUEST['numhab2'] : '';
$numhab3 = isset($_REQUEST['numhab3']) ? $_REQUEST['numhab3'] : '';
$numhab4 = isset($_REQUEST['numhab4']) ? $_REQUEST['numhab4'] : '';
$desayunoincluido1 = isset($_REQUEST['desayunoincluido1']) ? $_REQUEST['desayunoincluido1'] : '';
$desayunoincluido2 = isset($_REQUEST['desayunoincluido2']) ? $_REQUEST['desayunoincluido2'] : '';
$desayunoincluido3 = isset($_REQUEST['desayunoincluido3']) ? $_REQUEST['desayunoincluido3'] : '';
$desayunoincluido4 = isset($_REQUEST['desayunoincluido4']) ? $_REQUEST['desayunoincluido4'] : '';


$desayu1= isset($_REQUEST['desayu1']) ? $_REQUEST['desayu1'] : '';
$desayu2 = isset($_REQUEST['desayu2']) ? $_REQUEST['desayu2'] : '';
$desayu3 = isset($_REQUEST['desayu3']) ? $_REQUEST['desayu3'] : '';
$desayu4 = isset($_REQUEST['desayu4']) ? $_REQUEST['desayu4'] : '';
$prixhab1 = isset($_REQUEST['prixhab1']) ? $_REQUEST['prixhab1'] : '';
$prixhab2 = isset($_REQUEST['prixhab2']) ? $_REQUEST['prixhab2'] : '';
$prixhab3 = isset($_REQUEST['prixhab3']) ? $_REQUEST['prixhab3'] : '';
$prixhab4 = isset($_REQUEST['prixhab4']) ? $_REQUEST['prixhab4'] : '';
$prixdesayuno1 = isset($_REQUEST['prixdesayuno1']) ? $_REQUEST['prixdesayuno1'] : '';
$prixdesayuno2 = isset($_REQUEST['prixdesayuno2']) ? $_REQUEST['prixdesayuno2'] : '';
$prixdesayuno3 = isset($_REQUEST['prixdesayuno3']) ? $_REQUEST['prixdesayuno3'] : '';
$prixdesayuno4 = isset($_REQUEST['prixdesayuno4']) ? $_REQUEST['prixdesayuno4'] : '';
$prixdesayu1 = isset($_REQUEST['prixdesayu1']) ? $_REQUEST['prixdesayu1'] : '';
$prixdesayu2 = isset($_REQUEST['prixdesayu2']) ? $_REQUEST['prixdesayu2'] : '';
$prixdesayu3 = isset($_REQUEST['prixdesayu3']) ? $_REQUEST['prixdesayu3'] : '';
$prixdesayu4 = isset($_REQUEST['prixdesayu4']) ? $_REQUEST['prixdesayu4'] : '';

$dssalida = isset($_REQUEST['dssalida']) ? $_REQUEST['dssalida'] : '';
$fechasalida2 = isset($_REQUEST['fechasalida2']) ? $_REQUEST['fechasalida2'] : '';
$dsllegada = isset($_REQUEST['dsllegada']) ? $_REQUEST['dsllegada'] : '';

$ahora = isset($_REQUEST['ahora']) ? $_REQUEST['ahora'] : '';
$preciototal = isset($_REQUEST['preciototal']) ? $_REQUEST['preciototal'] : '';
$alguienseadelanto = isset($_REQUEST['alguienseadelanto']) ? $_REQUEST['alguienseadelanto'] : '';
$repetido = isset($_REQUEST['repetido']) ? $_REQUEST['repetido'] : '';
$emailf = isset($_REQUEST['emailf']) ? $_REQUEST['emailf'] : '';
$nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : '';
$apellidos = isset($_REQUEST['apellidos']) ? $_REQUEST['apellidos'] : '';
$telefonof = isset($_REQUEST['telefonof']) ? $_REQUEST['telefonof'] : '';
$dsllegada3 = isset($_REQUEST['dsllegada3']) ? $_REQUEST['dsllegada3'] : '';
$dssalida3 = isset($_REQUEST['dssalida3']) ? $_REQUEST['dssalida3'] : '';
$numNoches = isset($_REQUEST['numNoches']) ? $_REQUEST['numNoches'] : '';
$noches = isset($_REQUEST['noches']) ? $_REQUEST['noches'] : '';
$redaccion = isset($_REQUEST['redaccion']) ? $_REQUEST['redaccion'] : '';
$preciosiniva = isset($_REQUEST['preciosiniva']) ? $_REQUEST['preciosiniva'] : '';
$iva = isset($_REQUEST['iva']) ? $_REQUEST['iva'] : '';
$precioiva = isset($_REQUEST['precioiva']) ? $_REQUEST['precioiva'] : '';
$caducames = isset($_REQUEST['caducames']) ? $_REQUEST['caducames'] : '';
$caducaano = isset($_REQUEST['caducaano']) ? $_REQUEST['caducaano'] : '';
$dondeconocido = isset($_REQUEST['dondeconocido']) ? $_REQUEST['dondeconocido'] : '';
$comentario = isset($_REQUEST['comentario']) ? $_REQUEST['comentario'] : '';













$preciototal = isset($_REQUEST['preciototal']) ? $_REQUEST['preciototal'] : '';






/*$importets9 = isset($_REQUEST['importets9']) ? $_REQUEST['importets9'] : '';
$importets10 = isset($_REQUEST['importets10']) ? $_REQUEST['importets10'] : '';
$num_habitaciones = isset($_REQUEST['num_habitaciones']) ? $_REQUEST['num_habitaciones'] : '';

 */
