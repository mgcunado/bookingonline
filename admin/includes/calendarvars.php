<?php

/***LECTURA DE VARIABLES DEL FORMULARIO Y MODIFICACIÓN BASE DE DATOS ***/ //

// Convertimos el texto de las variables $fechallegada y $fechasalida en variables de fecha

if ($fechallegada != '') {
    list($diallegada, $mesllegada, $aniollegada) = preg_split('~[/.-]~', $fechallegada);
    list($diasalida, $messalida, $aniosalida) = preg_split('~[/.-]~', $fechasalida);

    if ($tarea == 'dispo') {
        include('includes/cargarhabitaciones.php');
    } elseif ($tarea == 'modiftarifa') {
        include('includes/cargartarifas.php');
    } elseif ($tarea == 'estanciaminima') {
        include('includes/cargarrestricciones.php');
    }
}

$tdl = mktime(0, 0, 0, intval($mesllegada), intval($diallegada), intval($aniollegada));

$tds = mktime(0, 0, 0, intval($messalida), intval($diasalida), intval($aniosalida));
$tt = $tds - $tdl;

if ($diallegada != '') {
    for ($a = 0; $a < $tt; $a = $a + 86400) {
        $dia_tdl = date("j", $tdl);
        $mes_tdl = date("n", $tdl);
        $ano_tdl = date("Y", $tdl);

        $qry0 = "select * from disponibilidad where dia='$dia_tdl' AND mes='$mes_tdl' AND ano='$ano_tdl'";
        $res0 = $conexion->query($qry0);

        if (mysqli_num_rows($res0) != 0 && $tarea == 'dispo') {
            $qry = "update disponibilidad set estado_ocupacion='$estado_ocupacion' where dia='$dia_tdl' AND mes='$mes_tdl' AND ano='$ano_tdl'";
            $res = $conexion->query($qry);
        } else {
            $qry = "insert into disponibilidad (dia, mes, ano, estado_ocupacion) values ('$dia_tdl', '$mes_tdl', '$ano_tdl', '$estado_ocupacion')";
            $res = $conexion->query($qry);
        }

        $tdl = $tdl + 86400;
    }
}

$tipo_semana = 1;
$tipo_mes = 0;

$MESCOMPLETO[1] = 'Enero';
$MESCOMPLETO[2] = 'Febrero';
$MESCOMPLETO[3] = 'Marzo';
$MESCOMPLETO[4] = 'Abril';
$MESCOMPLETO[5] = 'Mayo';
$MESCOMPLETO[6] = 'Junio';
$MESCOMPLETO[7] = 'Julio';
$MESCOMPLETO[8] = 'Agosto';
$MESCOMPLETO[9] = 'Septiembre';
$MESCOMPLETO[10] = 'Octubre';
$MESCOMPLETO[11] = 'Noviembre';
$MESCOMPLETO[12] = 'Diciembre';

$MESABREVIADO[1] = 'Ene';
$MESABREVIADO[2] = 'Feb';
$MESABREVIADO[3] = 'Mar';
$MESABREVIADO[4] = 'Abr';
$MESABREVIADO[5] = 'May';
$MESABREVIADO[6] = 'Jun';
$MESABREVIADO[7] = 'Jul';
$MESABREVIADO[8] = 'Ago';
$MESABREVIADO[9] = 'Sep';
$MESABREVIADO[10] = 'Oct';
$MESABREVIADO[11] = 'Nov';
$MESABREVIADO[12] = 'Dic';

$SEMANACOMPLETA[0] = 'Lunes';
$SEMANACOMPLETA[1] = 'Martes';
$SEMANACOMPLETA[2] = 'Miércoles';
$SEMANACOMPLETA[3] = 'Jueves';
$SEMANACOMPLETA[4] = 'Viernes';
$SEMANACOMPLETA[5] = 'Sábado';
$SEMANACOMPLETA[6] = 'Domingo';

$SEMANAABREVIADA[0] = 'Lu';
$SEMANAABREVIADA[1] = 'Ma';
$SEMANAABREVIADA[2] = 'Mi';
$SEMANAABREVIADA[3] = 'Ju';
$SEMANAABREVIADA[4] = 'Vi';
$SEMANAABREVIADA[5] = 'Sa';
$SEMANAABREVIADA[6] = 'Do';
////////////////////////////////////
if ($tipo_semana == 0) {
    $ARRDIASSEMANA = $SEMANACOMPLETA;
} elseif ($tipo_semana == 1) {
    $ARRDIASSEMANA = $SEMANAABREVIADA;
}
if ($tipo_mes == 0) {
    $ARRMES = $MESCOMPLETO;
} elseif ($tipo_mes == 1) {
    $ARRMES = $MESABREVIADO;
}

//////////////////////////////////////
if ($diallegada != '') $dia = 1; //SE EVITA EL PROBLEMA DE UN DÍA INEXISTENTE
if ($mesllegada != '') $mes = $mesllegada;
if ($aniollegada != '') $ano = $aniollegada;
//////////////////////////////////////

if (!$dia) $dia = date("d");
if (!$mes) $mes = date("n");
if (!$ano) $ano = date("Y");

$TotalDiasMes = date("t", mktime(0, 0, 0, $mes, $dia, $ano));
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
