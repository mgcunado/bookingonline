<table bordercolor="#999" align=center border=1 cellpadding=0 cellspacing=0 width="480px" height="260px">
    <tr id="fondomesano">
        <td colspan=7>
            <table border=0 align=center width="100%" cellpadding=0 cellspacing=0>
                <tr>
                    <?php if ($id != '') {
                        $index_php = "index.php?option=com_content&view=article&id=$id&Itemid=$Itemid&";
                    } else {
                        $index_php = "index.php?";
                    } ?>
                    <td width="13%" align=center><a href="<?php echo $index_php; ?>mes=<?php echo $mes; ?>&ano=<?php echo $AnoAnteriorAno; ?>"><img src=images/previous_year.gif border=0></a></td>

                    <td width="12%" align=center><a href="<?php echo $index_php; ?>mes=<?php echo $MesAnterior; ?>&ano=<?php echo $AnoAnterior; ?>"><img src=images/previous.gif border=0></a></td>

                    <td class="cal_mesano2" width="50%" colspan="1" align="center" nowrap> <?php echo $ARRMES[$mes] . " - " . $ano; ?></td>

                    <td width="12%" align=center><a href="<?php echo $index_php; ?>mes=<?php echo $MesSiguiente; ?>&ano=<?php echo $AnoSiguiente; ?>"><img src=images/next.gif border=0></a></td>

                    <td width="13%" align=center><a href="<?php echo $index_php; ?>mes=<?php echo $mes; ?>&ano=<?php echo $AnoSiguienteAno; ?>"><img src=images/next_year.gif border=0></a></td>

                </tr>
            </table>
        </td>
    </tr>
    <tr>

        <?php
        foreach ($ARRDIASSEMANA as $key) {
        ?>
            <td id="cal_diadesemana2" bgcolor=#ccccff><?php echo $key; ?></td>

        <?php
        }
        ?>
    </tr>

    <?php
    /***DIBUJAMOS EL CALENDARIO***/

    for ($a = 1; $a <= $TotalDeCeldas; $a++) {
        if (!isset($b)) $b = 0;
        if ($b == 7) $b = 0;
        if ($b == 0) echo '<tr>';

        if (!isset($c)) $c = 1; //LA VARIABLE $c ES LA QUE HAY QUE TRATAR PARA LA DISPONIBILIDAD
        //if(!isset($a)) $a = 0;
        if ($a > $EmpiezaMesCalOffset && $c <= $TotalDiasMes) {

            if (($c < date("d") && $mes == date("m") && $ano == date("Y")) || ($mes < date("m") && $ano == date("Y")) || ($ano < date("Y"))) { ?>

                <td class="cal_tachado2" bgcolor="#AAAAAA"><?php echo $c; ?></td>
                <?php
            } else {

                /*Borramos las entradas con estado de ocupación LIBRE*/
                $qry1 = "delete from disponibilidad where estado_ocupacion=0";
                $res1 = $conexion->query($qry1);
                /*****end**********/
                /*Lado Propietario: Lectura de habitaciones disponibles*/
                $estafecha = date($ano . "-" . $mes . "-" . $c);
                $qryhabdispo = "select * from habitaciones where fecha='$estafecha' limit 1";
                $reshabdispo = $conexion->query($qryhabdispo);
                $rowreshabdispo = $reshabdispo->fetch_assoc();

                $qry = "select * from disponibilidad where dia='$c' AND mes='$mes' AND ano='$ano' limit 1";
                $res = $conexion->query($qry);
                $rowres = $res->fetch_assoc();

                if (mysqli_num_rows($res) == 0) { ?>
                    <td class="cal_numeromes2" bgcolor="#66ccff"><?php echo $c; ?></td>

                    <?php
                } else {
                    if (isset($rowres['estado_ocupacion']) && isset($rowreshabdispo['habindividual']) && isset($rowreshabdispo['habdoble']) && isset($rowreshabdispo['habdoblesupl']) && isset($rowreshabdispo['habfamiliar'])) {
                        if ($rowres['estado_ocupacion'] == 1 || ($rowreshabdispo['habindividual'] == 0 && $rowreshabdispo['habdoble'] == 0 && $rowreshabdispo['habdoblesupl'] == 0 && $rowreshabdispo['habfamiliar'] == 0)) { ?>
                            <td class="cal_numeromes2" bgcolor="#FF0000"><?php echo $c; ?></td>

                        <?php
                        } else { ?>

                            <td <?php if ($c == date("d") && $mes == date("m") && $ano == date("Y")) {
                                    echo 'class="cal_hoy"';
                                } elseif ($b == 6) {
                                    echo 'class="cal_festivos"';
                                } else {
                                    echo 'class="cal_numeromes2"';
                                }
                                $estanMin1 = $rowreshabdispo['estanciaminima1'];
                                $estanMin2 = $rowreshabdispo['estanciaminima2'];
                                $estanMin3 = $rowreshabdispo['estanciaminima3'];
                                $estanMin4 = $rowreshabdispo['estanciaminima4'];

                                $MaxestanMin = max($estanMin1, $estanMin2, $estanMin3, $estanMin4);
                                ?> style="background: url(images/casilla/0.gif) no-repeat
<?php if (mysqli_num_rows($reshabdispo) != 0) { //Insertamos primero una imagen que no existe para solventar el problema de la sintaxis (comas)
?>
<?php if ($rowreshabdispo['habindividual'] == 0) {
                                    echo ', url(images/casilla/1.gif) top left no-repeat';
                                }
                                if ($rowreshabdispo['habdoble'] == 0) {
                                    echo ', url(images/casilla/2.gif) top right no-repeat';
                                }
                                if ($rowreshabdispo['habdoblesupl'] == 0) {
                                    echo ', url(images/casilla/3.gif) bottom left no-repeat';
                                }
                                if ($rowreshabdispo['habfamiliar'] == 0) {
                                    echo ', url(images/casilla/4.gif) bottom right no-repeat';
                                }
                                if ($MaxestanMin != 0) {
                                    echo ', url(images/casilla/r' . $MaxestanMin . '.gif) bottom center no-repeat';
                                } ?>
; background-color:#F3F3F3 <?php } ?>"><?php echo $c; ?></td><?php
                                                            }
                                                        }
                                                    }
                                                }
                                                $c++;
                                            } else {
                                                echo '<td> </td>';
                                            }
                                            if ($b == 6) echo '<tr>';
                                            $b++;
                                        }
                                        $estafecha2 = date("Y-n-j");
                                        $ano = 2011;
                                        $mes = 8;
                                        $c = 31;
                                        $estafecha = date($ano . "-" . $mes . "-" . $c); ?>
</table>
