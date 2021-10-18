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

/* list($aa, $mm, $dd) = preg_split('~[/.-]~', $FL); */
/* list($AA, $MM, $DD) = preg_split('~[/.-]~', $FS); */
/* $FLmt = mktime(0, 0, 0, $mm, $dd, intval($aa)); */
/* $FSmt = mktime(0, 0, 0, $MM, $DD, intval($AA)); */

/**cargamos las variables generales**/
$qryvargen = "select * from variablesgenerales";
$resvargen = $conexion->query($qryvargen);
$rowresvargen = mysqli_fetch_assoc($resvargen);
$habindividual =  $rowresvargen['habindividual'];
$habdoble =  $rowresvargen['habdoble'];
$habdoblesupl =  $rowresvargen['habdoblesupl'];
$habfamiliar =  $rowresvargen['habfamiliar'];
$pvphabindividual = $rowresvargen['pvphabindividual'];
$pvphabdoble = $rowresvargen['pvphabdoble'];
$pvphabdoblesupl = $rowresvargen['pvphabdoblesupl'];
$pvphabfamiliar = $rowresvargen['pvphabfamiliar'];
$pvpdesayuno = $rowresvargen['pvpdesayuno'];

/****comienza el bucle de cargado de habitaciones***************/
for ($i = 0; $i < ($FSmt - $FLmt) / 86400; $i++) {
    $fechaBuscada = date("Y-n-j", mktime(0, 0, 0, $mm, $dd + $i, $aa));

    $qrycargohab = "select * from habitaciones where fecha='$fechaBuscada'";
    $rescargohab = $conexion->query($qrycargohab);
    $rowrescargohab = mysqli_fetch_assoc($rescargohab);


    if (mysqli_num_rows($rescargohab) != 0) {
        switch ($estado_ocupacion) {
            case "1":
                $habitaciones = "habindividual=0, habdoble=0, habdoblesupl=0, habfamiliar=0";
                break;
            case "2":
                if ($num_habitaciones != 0) {
                    $valorhabitaciones = $num_habitaciones;
                    $habitaciones = "habindividual=" . $valorhabitaciones;
                } else {
                    $habitaciones = "habindividual=0";
                }
                break;
            case "3":
                if ($num_habitaciones != 0) {
                    $valorhabitaciones = $num_habitaciones;
                    $habitaciones = "habdoble=" . $valorhabitaciones;
                } else {
                    $habitaciones = "habdoble=0";
                }
                break;
            case "4":
                if ($num_habitaciones != 0) {
                    $valorhabitaciones = $num_habitaciones;
                    $habitaciones = "habdoblesupl=" . $valorhabitaciones;
                } else {
                    $habitaciones = "habdoblesupl=0";
                }
                break;
            case "5":
                if ($num_habitaciones != 0) {
                    $valorhabitaciones = $num_habitaciones;
                    $habitaciones = "habfamiliar=" . $valorhabitaciones;
                } else {
                    $habitaciones = "habfamiliar=0";
                }
                break;

            case "6":
                $habitaciones = "habindividual=$habindividual, habdoble=$habdoble, habdoblesupl=$habdoblesupl, habfamiliar=$habfamiliar, incluirdesayuno1='no', incluirdesayuno2='no', incluirdesayuno3='no', incluirdesayuno4='no', estanciaminima1=null, estanciaminima2=null, estanciaminima3=null, estanciaminima4=null";
                break;
            case "7":
                if ($num_habitaciones != "all") {
                    $valorhabitaciones = min($habindividual, ($rowrescargohab['habindividual'] + $num_habitaciones));
                    $habitaciones = "habindividual=" . $valorhabitaciones;
                } else {
                    $habitaciones = "habindividual=" . $habindividual;
                }
                break;
            case "8":
                if ($num_habitaciones != "all") {
                    $valorhabitaciones = min($habdoble, ($rowrescargohab['habdoble'] + $num_habitaciones));
                    $habitaciones = "habdoble=" . $valorhabitaciones;
                } else {
                    $habitaciones = "habdoble=" . $habdoble;
                }
                break;
            case "9":
                if ($num_habitaciones != "all") {
                    $valorhabitaciones = min($habdoblesupl, ($rowrescargohab['habdoblesupl'] + $num_habitaciones));
                    $habitaciones = "habdoblesupl=" . $valorhabitaciones;
                } else {
                    $habitaciones = "habdoblesupl=" . $habdoblesupl;
                }
                break;
            case "10":
                if ($num_habitaciones != "all") {
                    $valorhabitaciones = min($habfamiliar, ($rowrescargohab['habfamiliar'] + $num_habitaciones));
                    $habitaciones = "habfamiliar=" . $valorhabitaciones;
                } else {
                    $habitaciones = "habfamiliar=" . $habfamiliar;
                }
                break;
        }


        $qryupdhab = "update habitaciones set $habitaciones where fecha = '$fechaBuscada'";
        $resupdhab = $conexion->query($qryupdhab);
    } else {
        switch ($estado_ocupacion) {
            case "1":
                $habitaciones = "habindividual, habdoble, habdoblesupl, habfamiliar";
                $valorhabitaciones = "0, 0, 0, 0";
                break;
                /*case "2":
	$habitaciones="habindividual";
	if ($num_habitaciones!=0){
	$valorhabitaciones= mysqli_result($rescargohab, 0, "habindividual") - $num_habitaciones;
	} else { $valorhabitaciones= 0;}
	break;
	case "3":
	$habitaciones="habdoble";
	if ($num_habitaciones!=0){
	$valorhabitaciones= mysqli_result($rescargohab, 0, "habdoble") - $num_habitaciones;
	} else { $valorhabitaciones= 0;}
	break;
	case "4":
	$habitaciones="habdoblesupl";
	if ($num_habitaciones!=0){
	$valorhabitaciones= mysqli_result($rescargohab, 0, "habdoblesupl") - $num_habitaciones;
	} else { $valorhabitaciones= 0;}
	break;
	case "5":
	$habitaciones="habfamiliar";
	if ($num_habitaciones!=0){
	$valorhabitaciones= mysqli_result($rescargohab, 0, "habfamiliar") - $num_habitaciones;
	} else { $valorhabitaciones= 0;}
	break;*/
            case "2":
                $habitaciones = "habindividual";
                if ($num_habitaciones != 0) {
                    $valorhabitaciones = $num_habitaciones;
                } else {
                    $valorhabitaciones = 0;
                }
                break;
            case "3":
                $habitaciones = "habdoble";
                if ($num_habitaciones != 0) {
                    $valorhabitaciones = $num_habitaciones;
                } else {
                    $valorhabitaciones = 0;
                }
                break;
            case "4":
                $habitaciones = "habdoblesupl";
                if ($num_habitaciones != 0) {
                    $valorhabitaciones = $num_habitaciones;
                } else {
                    $valorhabitaciones = 0;
                }
                break;
            case "5":
                $habitaciones = "habfamiliar";
                if ($num_habitaciones != 0) {
                    $valorhabitaciones = $num_habitaciones;
                } else {
                    $valorhabitaciones = 0;
                }
                break;

            case "6":
                $habitaciones = "habindividual, habdoble, habdoblesupl, habfamiliar, incluirdesayuno1, incluirdesayuno2, incluirdesayuno3, incluirdesayuno4, estanciaminima1, estanciaminima2, estanciaminima3, estanciaminima4";
                $valorhabitaciones = "$habindividual, $habdoble, $habdoblesupl, $habfamiliar, 'no', 'no', 'no', 'no', null, null, null, null";
                break;
            case "7":
                $habitaciones = "habindividual";
                if ($num_habitaciones != "all") {
                    $valorhabitaciones = min($habindividual, ($rowrescargohab['habindividual'] + $num_habitaciones));
                } else {
                    $valorhabitaciones = $habindividual;
                }
                break;
            case "8":
                $habitaciones = "habdoble";
                if ($num_habitaciones != "all") {
                    $valorhabitaciones = min($habdoble, ($rowrescargohab['habdoble'] + $num_habitaciones));
                } else {
                    $valorhabitaciones = $habdoble;
                }
                break;
            case "9":
                $habitaciones = "habdoblesupl";
                if ($num_habitaciones != "all") {
                    $valorhabitaciones = min($habdoblesupl, ($rowrescargohab['habdoblesupl'] + $num_habitaciones));
                } else {
                    $valorhabitaciones = $habdoblesupl;
                }
                break;
            case "10":
                $habitaciones = "habfamiliar";
                if ($num_habitaciones != "all") {
                    $valorhabitaciones = min($habfamiliar, ($rowrescargohab['habfamiliar'] + $num_habitaciones));
                } else {
                    $valorhabitaciones = $habfamiliar;
                }
                break;
        }

        $qryinshab = "insert into habitaciones ($habitaciones, pvphabindividual, pvphabdoble, pvphabdoblesupl, pvphabfamiliar, pvpdesayuno, fecha) values ($valorhabitaciones, $pvphabindividual, $pvphabdoble, $pvphabdoblesupl, $pvphabfamiliar, $pvpdesayuno, '$fechaBuscada')";
        $resinshab = $conexion->query($qryinshab);
    }
}
/****FIN del bucle de cargado de habitaciones***************/
