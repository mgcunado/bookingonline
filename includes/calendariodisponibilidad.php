<div class="calh1">Calendario de Disponibilidad</div>
<table width="80%" align=center>
    <!--<tr>-->
    <tr>
        <td width=1%>
        </td>
        <?php
        /***************Comenzamos Ciclo de 3 meses***************/
        for ($w = 0; $w < 3; $w++) {
            require_once('includes/ciclotresmesesvars.php');
        ?>
            <td width=33% style="vertical-align: top">
                <table bordercolor="#999999" align=center border=1 cellpadding=0 cellspacing=0 width="250px" height="150px">
                    <tr id="fondomesano">
                        <td colspan=7>
                            <table border=0 align=center width="100%" cellpadding=0 cellspacing=0>
                                <tr>
                                    <?php if ($id != '') {
                                        $index_php = "index.php?option=com_content&view=article&id=$id&Itemid=$Itemid&";
                                    } else {
                                        $index_php = "index.php?";
                                    } ?>
                                    <td width="8%" align=center><?php if ($w == 0) { ?><a href="<?php echo $index_php; ?>mes=<?php echo $mes; ?>&ano=<?php echo $AnoAnteriorAno; ?>"><img src="images/previous_year.png" border=0></a><?php } ?></td>

                                    <td width="8%" align=center><?php if ($w == 0) { ?><a href="<?php echo $index_php; ?>mes=<?php echo $MesAnterior; ?>&ano=<?php echo $AnoAnterior; ?>"><img src="images/previous.png" border=0></a><?php } ?></td>

                                    <td class="cal_mesano3" width="68%" colspan="1" align="center" nowrap> <?php echo $ARRMES[$mes] . " - " . $ano; ?></td>

                                    <td width="8%" align=center><?php if ($w == 0) { ?><a href="<?php echo $index_php; ?>mes=<?php echo $MesSiguiente; ?>&ano=<?php echo $AnoSiguiente; ?>"><img src="images/next.png" border=0></a><?php } ?></td>

                                    <td width="8%" align=center><?php if ($w == 0) { ?><a href="<?php echo $index_php; ?>mes=<?php echo $mes; ?>&ano=<?php echo $AnoSiguienteAno; ?>"><img src="images/next_year.png" border=0></a><?php } ?></td>

                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <?php
                        foreach ($ARRDIASSEMANA as $key) {
                        ?><td id="cal_diadesemana2" bgcolor=#ccccff><?php echo $key; ?></td>
                        <?php } ?>
                    </tr>

                    <?php
                    /***DIBUJAMOS EL CALENDARIO***/

                    for ($a = 1; $a <= $TotalDeCeldas; $a++) {
                        if (!isset($b)) $b = 0;
                        if ($b == 7) $b = 0;
                        if ($b == 0) { ?>
                            <tr>
                                <?php }

                            if (!isset($c)) $c = 1; //LA VARIABLE $c ES LA QUE HAY QUE TRATAR PARA LA DISPONIBILIDAD
                            if ($a > $EmpiezaMesCalOffset and $c <= $TotalDiasMes) {

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
                                    $qryhabdispo = "select * from habitaciones where fecha='$estafecha'";
                                    $reshabdispo = $conexion->query($qryhabdispo);
                                    $rowreshabdispo = $reshabdispo->fetch_assoc();

                                    $qry = "select * from disponibilidad where dia='$c' AND mes='$mes' AND ano='$ano'";
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
                                                <td <?php if ($c == date("d") && $mes == date("m") && $ano == date("Y")) { ?>class="cal_hoy" <?php } elseif ($b == 6) { ?>class="cal_festivos" <?php } else { ?>class="cal_numeromes2" <?php } ?> style="<?php if (mysqli_num_rows($reshabdispo) != 0) { ?> background-color:#F3F3F3 <?php } ?>"><?php echo $c; ?></td>

                                <?php
                                            }
                                        }
                                    }
                                }
                                $c++;
                            } else { ?>
                                <td> </td>
                            <?php
                            }
                            if ($b == 6) { ?>
                            <tr>
                        <?php
                            }
                            $b++;
                        } ?>
                </table>
            </td>
        <?php if ($mes == 12) {
                $mes = 1;
                $ano++;
                $c = 1;
            } else {
                $mes++;
                $c = 1;
            }
        }
        /***************Fin del Ciclo de 3 meses***************/
        ?>
    </tr>
</table>
