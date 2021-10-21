<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <?php
    include('includes/cargavariablesgetpost.php');
    include('../includes/conexion.php');

    $qrytipohab = "select * from tipohabitaciones";
    $restipohab = $conexion->query($qrytipohab);
    $n = mysqli_num_rows($restipohab);

    ?>


    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Administración de Reservas on-line</title>
    <link href="calendario/estilos.css" type="text/css" rel="STYLESHEET">
    <script type="text/javascript" src="calendario/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="calendario/calendario.js"></script>
    <script type="text/javascript" src="calendario/calendario2.js"></script>
    <script type="text/javascript" src="js/fechaactual.js"></script>
    <script type="text/javascript" src="js/un-dis-able-dispo-tax-minimumstay.js"></script>

</head>

<body>
    <div id="disponibilidad">
        <h1>Administración de Reservas on-line</h1>

        <?php if ($tarifasestandar) {
            include('includes/generalvars.php');
        } else { ?>
            <div id="admin-menu">
                <div id="lightwhite" class="menu-test">
                    <a href="../index.php">Volver a Reservas on-line</a>
                </div>
                <div id="lightwhite" class="menu-test">

                    <a href="index.php?tarifasestandar=yes">Modificar Variables Generales</a>
                </div>
            </div>

            <div class="instrucciones">
                Seleccione Fecha de llegada y Fecha de salida.<br />Seleccione una de las 3 opciones siguientes: Disponibilidad, Modificar Tarifas y Estancia mínima para actuar sobre las fechas seleccionadas.<br />Haga click sobre el botón <b>Enviar</b> para modificar la base de datos que verán posteriormente los usuarios en su web.
            </div>

            <?php
            include('includes/calendarvars.php');
            ?>
            <table width=100% align=center cellpadding=0 cellspacing=0>
                <tr>
                    <td width=60%>
                        <?php
                        include('includes/drawcalendar.php');
                        ?>
                    </td>
                    <td width=40% align=center>
                        <table align="center" border="0" cellpadding=1 cellspacing=3 width="100%">
                            <tr>
                                <td bgcolor="#66ccff" width="10%" class="infoestado"> </td>
                                <td class="disponibilidad2" width="90%">Días <b>SIN CARGAR</b> las habitaciones</td>
                            </tr>
                            <tr>
                                <td bgcolor="#EEEEEE" width="10%" class="infoestado"> </td>
                                <td class="disponibilidad2" width="90%">Hay habitaciones <b>Libres</b></td>
                            </tr>
                            <tr>
                                <td bgcolor="#FF0000" width="10%" class="infoestado"> </td>
                                <td class="disponibilidad2" width="90%">Todas las habitaciones están <b>Ocupadas</b></td>
                            </tr>

                            <?php
                            $posicion = array("top left", "top right", "bottom left", "bottom right");
                            $i = 0;
                            foreach ($restipohab as $row) { ?>
                                <tr>
                                    <td style="background: url(images/casilla/<?php echo ($i + 1); ?>p.gif) <?php echo $posicion[$i]; ?> no-repeat; background-color:#EEEEEE" width="10%" class="infoestado"> </td>
                                    <td class="disponibilidad2" width="90%"><i>"<?php echo $row['nombre']; ?>"</i> <b>NO</b> disponible</td>
                                </tr>
                            <?php
                                $i = $i + 1;
                            }
                            /* liberar el conjunto de resultados */

                            ?>

                            <tr>
                                <td style="background: url(images/casilla/r3.gif) bottom center no-repeat; background-color:#EEEEEE" width="10%" class="infoestado"> </td>
                                <td class="disponibilidad2" width="90%">Restricción Estancia Mínima (3 días en este caso)</td>
                            </tr>

                        </table>
                    </td>
                </tr>
            </table>

            <br />

        <?php

            $timestamp = date("Y");
            $mess = date("m");
            $diaa = date("d");

            include('includes/adminform.php');
        } ?>
        <br /><br />
    </div>
</body>

</html>
