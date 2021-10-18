<?php

/**cargamos las variables generales**/

$idioma = 'es';
/* $idioma = $castellano; */
$titulo_menu = 'titulo_es';
$menu_degustacion = 'es';

//variables de titulo, subtitulo y cabezera
//$nombre_titulo = $nombre_titulo_es;
//$subtitulo = $subtitulo_es;
//$cabezera = $cabezera_es;
$nombre_titulo = 'Reserva de habitaciones';
$subtitulo = '';
$cabezera = '';


//variables de los textos
$titulo = 'titulo_es';
$texto = 'texto_es';


$qryvargen = "select * from variablesgenerales";
$resvargen = $conexion->query($qryvargen);
$rowresvargen = $resvargen->fetch_assoc();
$habindividual =  $rowresvargen["habindividual"];
$habdoble =  $rowresvargen["habdoble"];
$habdoblesupl =  $rowresvargen["habdoblesupl"];
$habfamiliar =  $rowresvargen["habfamiliar"];
$pvphabindividual = $rowresvargen["pvphabindividual"];
$pvphabdoble = $rowresvargen["pvphabdoble"];
$pvphabdoblesupl = $rowresvargen["pvphabdoblesupl"];
$pvphabfamiliar = $rowresvargen["pvphabfamiliar"];
$iva = $rowresvargen["iva"];


$qrytipohabs = "select * from tipohabitaciones";
$restipohabs = $conexion->query($qrytipohabs);
$rowrestipohabs = $restipohabs->fetch_assoc();
$habindividual = $rowrestipohabs['nombre'];
$habdoble = $rowrestipohabs['nombre'];
$habdoblesupl = $rowrestipohabs['nombre'];
$habfamiliar = $rowrestipohabs['nombre'];
