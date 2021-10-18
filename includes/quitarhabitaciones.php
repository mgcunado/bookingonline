<?php


$qryevitaract = "select * from evitaractualizar where ahora=$ahora";
$resevitaract = $conexion->query($qryevitaract);


if (mysqli_num_rows($resevitaract) == 0) {

    $qryinsertea = "insert into  evitaractualizar (ahora, preciototal) values ($ahora, '$preciototal')";
    $resinsertea = $conexion->query($qryinsertea);

    $FL = $aniollegada . "-" . $mesllegada . "-" . $diallegada;
    $FS = $aniosalida . "-" . $messalida . "-" . $diasalida;

    if ($FL != '') {

        list($aa, $mm, $dd) = preg_split('~[/.-]~', $FL);
        list($AA, $MM, $DD) = preg_split('~[/.-]~', $FS);
        $FLmt = mktime(0, 0, 0, $mm, $dd, $aa);
        $FSmt = mktime(0, 0, 0, $MM, $DD, $AA);

        for ($k = 0; $k < ($FSmt - $FLmt) / 86400; $k++) {

            $fechaBuscada = date("Y-n-j", mktime(0, 0, 0, $mm, $dd + $k, $aa));

            $qryquitohabs = "select * from habitaciones where fecha='$fechaBuscada'";
            $resquitohabs = $conexion->query($qryquitohabs);
            $rowresquitohabs = $resquitohabs->fetch_assoc();


            /* $numerohabindividual = mysqli_result($resquitohabs, 0, 'habindividual'); */
            $numerohabindividual = $rowresquitohabs['habindividual'];

            $valorhabindividual = $rowresquitohabs['habindividual'] - (int)$numhab1;
            $valorhabdoble = $rowresquitohabs['habdoble'] - (int)$numhab2;
            $valorhabdoblesupl = $rowresquitohabs['habdoblesupl'] - (int)$numhab3;
            $valorhabfamiliar = $rowresquitohabs['habfamiliar'] - (int)$numhab4;

            if ($valorhabindividual < 0 || $valorhabdoble < 0 || $valorhabdoblesupl < 0 || $valorhabfamiliar < 0) {
                $alguienseadelanto = 1;
                return;
            } else {
                $alguienseadelanto = 0;
                $habitaciones = "fecha = '$fechaBuscada'";
                $numhab1 != 0 ? $habitaciones .= ", habindividual = $valorhabindividual" : $habitaciones = $habitaciones;
                $numhab2 != 0 ? $habitaciones .= ", habdoble = $valorhabdoble" : $habitaciones = $habitaciones;
                $numhab3 != 0 ? $habitaciones .= ", habdoblesupl = $valorhabdoblesupl" : $habitaciones = $habitaciones;
                $numhab4 != 0 ? $habitaciones .= ", habfamiliar = $valorhabfamiliar" : $habitaciones = $habitaciones;

                $qryupdhab = "update habitaciones set $habitaciones where fecha = '$fechaBuscada'";
                $resupdhab = $conexion->query($qryupdhab);
            }
        }
    }
} else {
    $repetido = 'yes';
    $alguienseadelanto = 0;
}
