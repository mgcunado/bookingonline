<?php

$TotalDiasMes = date("t", mktime(0, 0, 0, $mes, 1, $ano));
$DiaSemanaEmpiezaMes = date("w", mktime(0, 0, 0, $mes, 1, $ano));
$DiaSemanaTerminaMes = date("w", mktime(0, 0, 0, $mes, $TotalDiasMes, $ano));
$EmpiezaMesCalOffset = ($DiaSemanaEmpiezaMes + (7 - 1)) % 7; //IMPORTANTE: Restamos 1 para que sea en Lunes donde empieza el primer día de la semana en vez de en Domingo
$TerminaMesCalOffset = (6 - (($DiaSemanaTerminaMes + (7 - 1)) % 7));
$TotalDeCeldas = $TotalDiasMes + $EmpiezaMesCalOffset + $TerminaMesCalOffset;

if ($mes == 1) {
    $MesAnterior = 12;
    $MesSiguiente = $mes + 1;
    $AnoAnterior = $ano - 1;
    $AnoSiguiente = $ano;
    $AnoAnteriorAno = $ano - 1;
    $AnoSiguienteAno = $ano + 1;
} elseif ($mes == 12) {
    $MesAnterior = $mes - 1;
    $MesSiguiente = 1;
    $AnoAnterior = $ano;
    $AnoSiguiente = $ano + 1;
    $AnoAnteriorAno = $ano - 1;
    $AnoSiguienteAno = $ano + 1;
} else {
    $MesAnterior = $mes - 1;
    $MesSiguiente = $mes + 1;
    $AnoAnterior = $ano;
    $AnoSiguiente = $ano;
    $AnoAnteriorAno = $ano - 1;
    $AnoSiguienteAno = $ano + 1;
}
