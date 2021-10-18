<?php

$FL = $aniollegada . "-" . $mesllegada . "-" . $diallegada;
$FS = $aniosalida . "-" . $messalida . "-" . $diasalida;

/* list($aa, $mm, $dd) = preg_split('~[/.-]~', $FL); */
/* list($AA, $MM, $DD) = preg_split('~[/.-]~', $FS); */
/* $FLmt = mktime(0, 0, 0, $mm, $dd, intval($aa)); */
/* $FSmt = mktime(0, 0, 0, $MM, $DD, intval($AA)); */
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

//$rescargohab = $conexion->query($qrycargohab);
//$rowrescargohab = $rescargohab->fetch_assoc();


$habindividual =  $rowresvargen["habindividual"];
$habdoble =  $rowresvargen["habdoble"];
$habdoblesupl =  $rowresvargen["habdoblesupl"];
$habfamiliar =  $rowresvargen["habfamiliar"];
$pvphabindividual = $rowresvargen["pvphabindividual"];
$pvphabdoble = $rowresvargen["pvphabdoble"];
$pvphabdoblesupl = $rowresvargen["pvphabdoblesupl"];
$pvphabfamiliar = $rowresvargen["pvphabfamiliar"];
$pvpdesayuno = $rowresvargen["pvpdesayuno"];

/****comienza el bucle de cargado de habitaciones***************/
for ($i = 0; $i < ($FSmt - $FLmt) / 86400; $i++) {
    $fechaBuscada = date("Y-n-j", mktime(0, 0, 0, $mm, $dd + $i, $aa));

    $qrycargohab = "select * from habitaciones where fecha='$fechaBuscada'";
    /* $rescargohab = $conexion->query($qrycargohab, $con); */
    $rescargohab = $conexion->query($qrycargohab);
    $rowrescargohab = mysqli_fetch_assoc($rescargohab);


    $tarifasupd = "fecha = '$fechaBuscada'";

    if ($importe1 != '') {
        $tarifasupd .= ",pvphabindividual = '$importe1'";
    }
    if ($importe2 != '') {
        $tarifasupd .= ",pvphabdoble = '$importe2'";
    }
    if ($importe3 != '') {
        $tarifasupd .= ",pvphabdoblesupl = '$importe3'";
    }
    if ($importe4 != '') {
        $tarifasupd .= ",pvphabfamiliar = '$importe4'";
    }
    if ($importe5 != '') {
        $tarifasupd .= ",pvpdesayuno = '$importe5'";
    }
    if ($ckdesayuno1 != '') {
        $tarifasupd .= ",incluirdesayuno1 = 'si'";
    }
    if ($ckdesayuno2 != '') {
        $tarifasupd .= ",incluirdesayuno2 = 'si'";
    }
    if ($ckdesayuno3 != '') {
        $tarifasupd .= ",incluirdesayuno3 = 'si'";
    }
    if ($ckdesayuno4 != '') {
        $tarifasupd .= ",incluirdesayuno4 = 'si'";
    }

    if (mysqli_num_rows($rescargohab) != 0) {
        $qryupdhab = "update habitaciones set $tarifasupd where fecha = '$fechaBuscada'";
        $resupdhab = $conexion->query($qryupdhab);
    } else {  ?>
        <table class="dispohabitaciones" align="center" border="0" cellspacing="0" bgcolor="" width="80%">
            <tr>
                <td style="color: #630; text-align: left; font-size: 80%; font-weight: none; padding:30px 30px 30px 30px">
                    <div><span style="font-size:140%; font-weight:bold;">Atención:</span> Para poder modificar tarifas en unas fechas concretas se han de cargar las habitaciones previamente con las variables generales en dichas fechas. Disculpe las molestias.<br /></div>
                </td>
            </tr>
        </table><br />
<?php return;
    }
}
/****FIN del bucle de cargado de habitaciones***************/
