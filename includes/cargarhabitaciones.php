<?php

include('variablesgenerales.php');

/****comienza el bucle de cargado de habitaciones***************/

$qrycargohab = "select min(habindividual) as numhabindividual, sum(pvphabindividual) as sumpvphabindividual, min(habdoble) as numhabdoble, sum(pvphabdoble) as sumpvphabdoble, min(habdoblesupl) as numhabdoblesupl, sum(pvphabdoblesupl) as sumpvphabdoblesupl, min(habfamiliar) as numhabfamiliar, sum(pvphabfamiliar) as sumpvphabfamiliar, sum(pvpdesayuno) as sumpvpdesayuno from habitaciones where fecha>='$FL' and fecha < '$FS'";
$rescargohab = $conexion->query($qrycargohab);
$rowrescargohab = $rescargohab->fetch_assoc();



$qryestanciaminima1 = "select max(estanciaminima1) as estanciaminimamayor1 from habitaciones where fecha>='$FL' and fecha < '$FS'";
$resestanciaminima1 = $conexion->query($qryestanciaminima1);
$rowrestanciaminima1 = $resestanciaminima1->fetch_assoc();
$estanciaminimamayor1 = $rowrestanciaminima1['estanciaminimamayor1'];

$qryestanciaminima2 = "select max(estanciaminima2) as estanciaminimamayor2 from habitaciones where fecha>='$FL' and fecha < '$FS'";
$resestanciaminima2 = $conexion->query($qryestanciaminima2);
$rowrestanciaminima2 = $resestanciaminima2->fetch_assoc();
$estanciaminimamayor2 = $rowrestanciaminima2['estanciaminimamayor2'];

$qryestanciaminima3 = "select max(estanciaminima3) as estanciaminimamayor3 from habitaciones where fecha>='$FL' and fecha < '$FS'";
$resestanciaminima3 = $conexion->query($qryestanciaminima3);
$rowrestanciaminima3 = $resestanciaminima3->fetch_assoc();
$estanciaminimamayor3 = $rowrestanciaminima3['estanciaminimamayor3'];

$qryestanciaminima4 = "select max(estanciaminima4) as estanciaminimamayor4 from habitaciones where fecha>='$FL' and fecha < '$FS'";
$resestanciaminima4 = $conexion->query($qryestanciaminima4);
$rowrestanciaminima4 = $resestanciaminima4->fetch_assoc();
$estanciaminimamayor4 = $rowrestanciaminima4['estanciaminimamayor4'];


$qryincluirdesayunoyes1 = "select incluirdesayuno1 from habitaciones where fecha>='$FL' and fecha < '$FS' and incluirdesayuno1='si'";
$resincluirdesayunoyes1 = $conexion->query($qryincluirdesayunoyes1);
$qryincluirdesayunono1 = "select incluirdesayuno1 from habitaciones where fecha>='$FL' and fecha < '$FS' and incluirdesayuno1='no'";
$resincluirdesayunono1 = $conexion->query($qryincluirdesayunono1);

$desayunoincluido1 = '';
(mysqli_num_rows($resincluirdesayunoyes1) != 0) ? $desayunoincluido1 .= 'yes' : $desayunoincluido1 .= '';
(mysqli_num_rows($resincluirdesayunono1) != 0) ? $desayunoincluido1 .= 'no' : $desayunoincluido1 .= '';

$qryincluirdesayunoyes2 = "select incluirdesayuno2 from habitaciones where fecha>='$FL' and fecha < '$FS' and incluirdesayuno2='si'";
$resincluirdesayunoyes2 = $conexion->query($qryincluirdesayunoyes2);
$qryincluirdesayunono2 = "select incluirdesayuno2 from habitaciones where fecha>='$FL' and fecha < '$FS' and incluirdesayuno2='no'";
$resincluirdesayunono2 = $conexion->query($qryincluirdesayunono2);

$desayunoincluido2 = '';
(mysqli_num_rows($resincluirdesayunoyes2) != 0) ? $desayunoincluido2 .= 'yes' : $desayunoincluido2 .= '';
(mysqli_num_rows($resincluirdesayunono2) != 0) ? $desayunoincluido2 .= 'no' : $desayunoincluido2 .= '';

$qryincluirdesayunoyes3 = "select incluirdesayuno3 from habitaciones where fecha>='$FL' and fecha < '$FS' and incluirdesayuno3='si'";
$resincluirdesayunoyes3 = $conexion->query($qryincluirdesayunoyes3);
$qryincluirdesayunono3 = "select incluirdesayuno3 from habitaciones where fecha>='$FL' and fecha < '$FS' and incluirdesayuno3='no'";
$resincluirdesayunono3 = $conexion->query($qryincluirdesayunono3);

$desayunoincluido3 = '';
(mysqli_num_rows($resincluirdesayunoyes3) != 0) ? $desayunoincluido3 .= 'yes' : $desayunoincluido3 .= '';
(mysqli_num_rows($resincluirdesayunono3) != 0) ? $desayunoincluido3 .= 'no' : $desayunoincluido3 .= '';

$qryincluirdesayunoyes4 = "select incluirdesayuno4 from habitaciones where fecha>='$FL' and fecha < '$FS' and incluirdesayuno4='si'";
$resincluirdesayunoyes4 = $conexion->query($qryincluirdesayunoyes4);
$qryincluirdesayunono4 = "select incluirdesayuno4 from habitaciones where fecha>='$FL' and fecha < '$FS' and incluirdesayuno4='no'";
$resincluirdesayunono4 = $conexion->query($qryincluirdesayunono4);

$desayunoincluido4 = '';
(mysqli_num_rows($resincluirdesayunoyes4) != 0) ? $desayunoincluido4 .= 'yes' : $desayunoincluido4 .= '';
(mysqli_num_rows($resincluirdesayunono4) != 0) ? $desayunoincluido4 .= 'no' : $desayunoincluido4 .= '';


$t = 0;
$h = 0;
($rowrescargohab['numhabindividual'] == 0) ? $t = $t : $t++;
($rowrescargohab['numhabdoble'] == 0) ? $t = $t : $t++;
($rowrescargohab['numhabdoblesupl'] == 0) ? $t = $t : $t++;
($rowrescargohab['numhabfamiliar'] == 0) ? $t = $t : $t++;

$desayunoincltotal = 0;
$desayunoincluido1 != 'yesno' ? $desayunoincltotal = 1 : $desayunoincltotal = $desayunoincltotal;
$desayunoincluido2 != 'yesno' ? $desayunoincltotal = 1 : $desayunoincltotal = $desayunoincltotal;
$desayunoincluido3 != 'yesno' ? $desayunoincltotal = 1 : $desayunoincltotal = $desayunoincltotal;
$desayunoincluido4 != 'yesno' ? $desayunoincltotal = 1 : $desayunoincltotal = $desayunoincltotal;

$estanciamintotal = 0;
$numNoches >= $estanciaminimamayor1 ? $estanciamintotal = 1 : $estanciamintotal = $estanciamintotal;
$numNoches >= $estanciaminimamayor2 ? $estanciamintotal = 1 : $estanciamintotal = $estanciamintotal;
$numNoches >= $estanciaminimamayor3 ? $estanciamintotal = 1 : $estanciamintotal = $estanciamintotal;
$numNoches >= $estanciaminimamayor4 ? $estanciamintotal = 1 : $estanciamintotal = $estanciamintotal;

/*******Comprobamos que existen o no habitaciones a mostrar****/
$existenhabitaciones = 0;
$m = 0;
foreach ($restipohab as $row) {
    $numerohabitaciones = $row['nomabreviado'];
    $numerohabitaciones = "num" . $numerohabitaciones;
    $preciohabitaciones = $row['nomabreviado'];
    $preciohabitaciones = "sumpvp" . $preciohabitaciones;

    $mMas1 = $m + 1;
    $estanciaminimamayor = 'estanciaminimamayor' . $mMas1;
    $desayunoincluido = 'desayunoincluido' . $mMas1;

    if (($rowrescargohab[$numerohabitaciones] != 0) && $numNoches >= $$estanciaminimamayor && $$desayunoincluido != 'yesno') {
        $existenhabitaciones++;
    }
    $m = $m + 1;
}

/**************************************************************/


if (mysqli_num_rows($rescargohab) != 0 && $t != 0 && $estanciamintotal != 0 && $desayunoincltotal != 0 && $existenhabitaciones != 0) { //*0*
?>
    <table class="dispohabitaciones" bgcolor="#71add5" align="center" border="0" cellspacing="0" bgcolor="" width="80%">
        <tbody>
            <tr>
                <th width="61%">Tipo de habitación</th>
                <th width="5%">Máx</th>
                <th width="10%">Precio<br />por <?php echo $numNoches . " " . $noches; ?></th>
                <th width="14%">Núm. habitaciones</th>
                <th width="10%">Reserva</th>
            </tr>
            <?php
            //for ($m=0; $m<$n; $m++)
            $m = 0;
            foreach ($restipohab as $row) { //*1*
                $numerohabitaciones = $row['nomabreviado'];
                $numerohabitaciones = "num" . $numerohabitaciones;
                $preciohabitaciones = $row['nomabreviado'];
                $preciohabitaciones = "sumpvp" . $preciohabitaciones;

                $mMas1 = $m + 1;
                $estanciaminimamayor = 'estanciaminimamayor' . $mMas1;
                $desayunoincluido = 'desayunoincluido' . $mMas1;

                //if((mysqli_result($rescargohab, 0, $numerohabitaciones)!=0) && $numNoches>=$$estanciaminimamayor && $$desayunoincluido != 'yesno')
                if (($rowrescargohab[$numerohabitaciones] != 0) && $numNoches >= $$estanciaminimamayor && $$desayunoincluido != 'yesno') { //*2*
                    $h++;
            ?>

                    <tr>
                        <td width="61%" style="color:#036; text-align: left">
                            <div style="float:left; width: 100px"><img src="images/hab<?php echo $m + 1; ?>.png" /></div>
                            <div style="float:left"><b><?php echo $row['nombre']; ?></b><br />

                                <?php
                                if ($$desayunoincluido == 'no') { //*3*
                                ?>
                                    Incluir desayuno para <?php echo $numNoches . " " . $noches; ?>:</br>
                                    Núm. por habitación: <select name="desayunos<?php echo $m + 1; ?>">
                                        <option value="0" selected>0</option>
                                        <?php for ($s = 1; $s < $row['numpersonas'] + 1; $s++) { //*4*
                                            $eee = $s * $rowrescargohab['sumpvpdesayuno'];
                                            $fff = (int)$eee; ?>
                                            <option value="<?php echo $s . '-' . $rowrescargohab['sumpvpdesayuno']; ?>"><?php echo $s; ?> (€
                                                <?php if (($eee - $fff) != 0) {
                                                    echo number_format($eee, 2, ",", ".");
                                                } else {
                                                    echo number_format($fff, 0, ",", ".");
                                                } ?>)
                                            </option><?php
                                                        /*4*/ } ?>
                                    </select><?php
                                                /*3*/ } else if ($$desayunoincluido == 'yes') { ?>Desayuno incluido
                                    <input type="hidden" name="<?php echo $desayunoincluido; ?>" value="yes"><?php } ?>

                            </div><br /><br />
                        </td>

                        <?php $aaa = $rowrescargohab[$preciohabitaciones];
                        $bbb = (int)$aaa; ?>

                        <td width="5%" style="vertical-align: top; background-color:#CCFFFF; color: #003366; text-align: center; font-size: 80%; font-weight: bold"><?php echo $row['numpersonas']; ?> <img src="images/personas.png" /></td>
                        <td width="10%" style="vertical-align: top; background-color:#CCFFFF; color: #003366; text-align: center; font-size: 80%; font-weight: bold">€ <?php if (($aaa - $bbb) != 0) {
                                                                                                                                                                            echo number_format($aaa, 2, ",", ".");
                                                                                                                                                                        } else {
                                                                                                                                                                            echo number_format($bbb, 0, ",", ".");
                                                                                                                                                                        } ?></td>
                        <td width="14%" style="vertical-align: top; background-color:#CCFFFF; text-align: center">
                            <select name="numhabitaciones<?php echo $m + 1; ?>">
                                <option value="0" selected>0</option>
                                <?php for ($s = 1; $s < $rowrescargohab[$numerohabitaciones] + 1; $s++) { //*3*
                                    $ccc = $s * $rowrescargohab[$preciohabitaciones];
                                    $ddd = (int)$ccc; ?>
                                    <option value="<?php echo $s . '-' . $rowrescargohab[$preciohabitaciones]; ?>"><?php echo $s; ?> (€ <?php if (($ccc - $ddd) != 0) {
                                                                                                                                            echo number_format($ccc, 2, ",", ".");
                                                                                                                                        } else {
                                                                                                                                            echo number_format($ddd, 0, ",", ".");
                                                                                                                                        } ?>)</option>
                                <?php /*3*/ } ?>
                            </select>
                        </td>
                        <?php if ($h == 1) { //*3*
                            $fechallegada2 = $fechallegada;
                            $fechasalida2 = $fechasalida; ?>
                            <input type="hidden" name="fechallegada2" value="<?php echo $fechallegada2; ?>">
                            <input type="hidden" name="fechasalida2" value="<?php echo $fechasalida2; ?>">
                            <input type="hidden" name="dsllegada" value="<?php echo $dsllegada; ?>">
                            <input type="hidden" name="dssalida" value="<?php echo $dssalida; ?>">
                            <?php
                            ?><td width="10%" rowspan="<?php echo $t; ?>" style="vertical-align: top; background-color:#CCFFFF; text-align: center"><input type="button" value="Reserva ahora" class="enviar" onclick="valida_envia2(this.form)" /></td><?php /*3*/ } ?>
                    </tr>

            <?php
                    /*2*/ }
                $m++;
                /*1*/
            } ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan=5 style="vertical-align: top; color: #036; text-align: left; font-size: 80%; font-weight: none; padding-left:100px">Los precios son por habitación.&nbsp;&nbsp;&nbsp;Incluido en el precio de la habitación: <?php echo $iva; ?> % IVA</td>
            </tr>
        </tfoot>
    </table><br /><?php
                    /*0*/ } else {  ?>
    <table class="dispohabitaciones" align="center" border="0" cellspacing="0" bgcolor="" width="80%">
        <tr>
            <td style="color: #036; text-align: left; font-size: 80%; font-weight: none; padding:30px 30px 30px 30px">
                <div>No existen Habitaciones disponibles para el periodo seleccionado. Disculpen las molestias.</div>
            </td>
        </tr>
    </table><br />
<?php  }
                /*if ($desayunoincluido=='yes'){?> <input type="hidden" name="desayunoincluido" value="yes"><?php }*/
                /****FIN del bucle de cargado de habitaciones***************/
