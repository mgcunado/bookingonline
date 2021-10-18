<?php

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

/****comienza el bucle de cargado de restricciones***************/
for ($i = 0; $i < ($FSmt - $FLmt) / 86400; $i++) {
    $fechaBuscada = date("Y-n-j", mktime(0, 0, 0, $mm, $dd + $i, $aa));

    $qrycargohab = "select * from habitaciones where fecha='$fechaBuscada'";
    $rescargohab = $conexion->query($qrycargohab);


    if (mysqli_num_rows($rescargohab) != 0) {
        $qryupdhab = "update habitaciones set estanciaminima = $estanciaminima where fecha = '$fechaBuscada'";
        $resupdhab = $conexion->query($qryupdhab);
    } else {
        $qryinshab = "insert into habitaciones (fecha, pvphabindividual, pvphabdoble, pvphabdoblesupl, pvphabfamiliar, pvpdesayuno, habindividual, habdoble, habdoblesupl, habfamiliar, estanciaminima) values ($fechaBuscada, $pvphabindividual, $pvphabdoble, $pvphabdoblesupl, $pvphabfamiliar, $pvpdesayuno, $habindividual, $habdoble, $habdoblesupl, $habfamiliar, $estanciaminima)";
        $resinshab = $conexion->query($qryinshab);
    }
}
/****FIN del bucle de cargado de restricciones***************/
