<?php

/* include('variablesgenerales.php'); */
echo '<br>uno';
$FL = $aniollegada . "-" . $mesllegada . "-" . $diallegada;
$FS = $aniosalida . "-" . $messalida . "-" . $diasalida;

list($aa, $mm, $dd) = split('[/.-]', $FL);
list($AA, $MM, $DD) = split('[/.-]', $FS);
$FLmt = mktime(0, 0, 0, $mm, $dd, $aa);
$FSmt = mktime(0, 0, 0, $MM, $DD, $AA);

/**cargamos las variables generales**/
$qryvargen = "select * from variablesgenerales";
$resvargen = $conexion->query($qryvargen);
$rowresvargen = $resvargen->fetch_assoc();

$habindividual = $rowresvargen["habindividual"];
$habdoble = $rowresvargen["habdoble"];
$habdoblesupl = $rowresvargen["habdoblesupl"];
$habfamiliar = $rowresvargen["habfamiliar"];
$pvphabindividual = $rowresvargen["pvphabindividual"];
$pvphabdoble = $rowresvargen["pvphabdoble"];
$pvphabdoblesupl = $rowresvargen["pvphabdoblesupl"];
$pvphabfamiliar = $rowresvargen["pvphabfamiliar"];
$pvpdesayuno = $rowresvargen["pvpdesayuno"];

/****comienza el bucle de cargado de habitaciones***************/
for ($i = 0; $i < ($FSmt - $FLmt) / 86400; $i++) {
    $fechaBuscada = date("Y-n-j", mktime(0, 0, 0, $mm, $dd + $i, $aa));

    $qrycargohab = "select * from habitaciones where fecha='$fechaBuscada'";
    $rescargohab = $conexion->query($qrycargohab);

    echo '<br>uno';

    $tarifasupd = "fecha = '$fechaBuscada'";
    $tarifasins = "'$fechaBuscada'";
    if ($importe1 != '') {
        $tarifasupd .= ",pvphabindividual = '$importe1'";
        $tarifasins .= ",'$importe1'";
    } else {
        $tarifasins .= ",'$pvphabindividual'";
    }
    if ($importe2 != '') {
        $tarifasupd .= ",pvphabdoble = '$importe2'";
        $tarifasins .= ",'$importe2'";
    } else {
        $tarifasins .= ",'$pvphabindividual'";
    }
    if ($importe3 != '') {
        $tarifasupd .= ",pvphabdoblesupl = '$importe3'";
        $tarifasins .= ",'$importe3'";
    } else {
        $tarifasins .= ",'$pvphabindividual'";
    }
    if ($importe4 != '') {
        $tarifasupd .= ",pvphabfamiliar = '$importe4'";
        $tarifasins .= ",'$importe4'";
    } else {
        $tarifasins .= ",'$pvphabindividual'";
    }
    if ($importe5 != '') {
        $tarifasupd .= ",pvpdesayuno = '$importe5'";
        $tarifasins .= ",'$importe5'";
    } else {
        $tarifasins .= ",'$pvpdesayuno'";
    }
    if ($ckimporte6 != '') {
        $tarifasupd .= ",incluirdesayuno = 'si'";
        $tarifasins .= ",'si'";
    } else {
        $tarifasins .= ",'no'";
    }

    if (mysqli_num_rows($rescargohab) != 0) {
        $qryupdhab = "update habitaciones set $tarifasupd where fecha = '$fechaBuscada'";
        $resupdhab = $conexion->query($qryupdhab);
    } else {
        $qryinshab = "insert into habitaciones (fecha, pvphabindividual, pvphabdoble, pvphabdoblesupl, pvphabfamiliar, pvpdesayuno, incluirdesayuno, habindividual, habdoble, habdoblesupl, habfamiliar) values ($tarifasins, $habindividual, $habdoble, $habdoblesupl, $habfamiliar)";
        $resinshab = $conexion->query($qryinshab);
    }
}
/****FIN del bucle de cargado de habitaciones***************/
