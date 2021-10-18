<?php /**Calculamos el Número de Noches de la estancia**/
$FL = $aniollegada."-".$mesllegada."-".$diallegada;
$FS = $aniosalida."-".$messalida."-".$diasalida;

list($aa,$mm,$dd) = preg_split('~[/.-]~', $FL);
list($AA,$MM,$DD) = preg_split('~[/.-]~', $FS);
$FLmt = mktime(0,0,0,intval($mm),intval($dd),intval($aa));
$FSmt = mktime(0,0,0,intval($MM),intval($DD),intval($AA));
$numNoches=round(($FSmt - $FLmt)/86400);
$numNoches == 1 ? $noches = "noche" : $noches = "noches";
/*******************/
