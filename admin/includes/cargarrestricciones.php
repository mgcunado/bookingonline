<?php

$FL = $aniollegada . "-" . $mesllegada . "-" . $diallegada;
$FS = $aniosalida . "-" . $messalida . "-" . $diasalida;

$llegadaArray = preg_split('/[\s-]+/', $FL);
$aa = $llegadaArray[0] ?? 0;
$mm = $llegadaArray[1] ?? 0;
$dd = $llegadaArray[2] ?? 0;

$salidaArray = preg_split('/[\s-]+/', $FS);
$AA = $salidaArray[0] ?? 0;
$MM = $salidaArray[1] ?? 0;
$DD = $salidaArray[2] ?? 0;


/* list($aa, $mm, $dd) = preg_split('~[/.-]~', $FL); */
$FLmt = mktime(0, 0, 0, (int)$mm, (int)$dd, (int)$aa);
$FSmt = mktime(0, 0, 0, (int)$MM, (int)$DD, (int)$AA);

/**cargamos las variables generales**/
$qryvargen = "select * from variablesgenerales";
$resvargen = $conexion->query($qryvargen);
$rowresvargen = mysqli_fetch_assoc($resvargen);
/* $rowresvargen = $resvargen->fetch_assoc(); */

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
    $fechaBuscada = date("Y-n-j", mktime(0, 0, 0, (int)$mm, (int)$dd + (int)$i, (int)$aa));

    $qrycargohab = "select * from habitaciones where fecha='$fechaBuscada'";
    $rescargohab = $conexion->query($qrycargohab);

    $estanminupd = "fecha = '$fechaBuscada'";

    if ($estanmin1 != '') {
        $estanminupd .= ",estanciaminima1 = '$estanmin1'";
    }
    if ($estanmin2 != '') {
        $estanminupd .= ",estanciaminima2 = '$estanmin2'";
    }
    if ($estanmin3 != '') {
        $estanminupd .= ",estanciaminima3 = '$estanmin3'";
    }
    if ($estanmin4 != '') {
        $estanminupd .= ",estanciaminima4 = '$estanmin4'";
    }

    if (mysqli_num_rows($rescargohab) != 0) {
        $qryupdhab = "update habitaciones set $estanminupd  where fecha = '$fechaBuscada'";
        $resupdhab = $conexion->query($qryupdhab);
    } else { ?>
        <div class="dispohabitaciones">
            <div style="color: #630; text-align: left; font-size: 80%; font-weight: none; padding:30px 30px 30px 30px">
                <span style="font-size:140%; font-weight:bold;">Atención:</span> Para poder introducir restricciones de estancia mínima en unas fechas concretas se han de cargar las habitaciones previamente con las variables generales en dichas fechas. Disculpe las molestias.<br />
            </div>
        </div>

<?php return;
    }
}
/****FIN del bucle de cargado de restricciones***************/
