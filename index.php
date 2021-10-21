<!DOCTYPE html>
<html>

<head>
    <?php
    include('includes/cargavariablesgetpost.php'); //nota: no funciona con PHP74
    include('includes/conexion.php');
    include('includes/variablesgenerales.php');

    $qrytipohab = "select * from tipohabitaciones";
    $restipohab = $conexion->query($qrytipohab);
    //$n=mysqli_num_rows($restipohab);
    $rowrestipohab = $restipohab->fetch_assoc(); //la utilizaremos en includes/cargarhabitaciones.php

    header('Content-Type: text/html; charset=UTF-8');
    ?>

    <title>Reservas on-line</title>

    <link href="calendario/estilos.css" type="text/css" rel="STYLESHEET">
    <script type="text/javascript" src="calendario/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="calendario/calendario.js"></script>
    <script type="text/javascript" src="calendario/calendario2.js"></script>
    <script type="text/javascript" src="js/fechaactual.js"></script>
    <script type="text/javascript" src="js/formvalidation.js"></script>

    <link href="css/formatos.css" rel="stylesheet" type="text/css">
    <link href="css/editar.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="disponibilidad">
        <h1>Reservas on-line</h1>

        <div class="menuprincipal" width=90% align=center>
            <spam style="padding-right:15%;" width=100%><a href="admin/index.php">Administración de Reservas on-line</a></spam>
        </div>


        <?php
        if ($fechallegada == '' && $fechallegada2 == '' && $creditcard == '') { ?>

            <div class="instrucciones">
                <td>Seleccione Fecha de llegada y Fecha de salida y haga click sobre el bot&oacute;n "Ver Disponibilidad".<br />Los d&iacute;as sobre el Calendario de Disponibilidad con fondo rojo significa que no hay habitaciones disponibles.</td>
            </div>

        <?php } else if ($fechallegada != '') { ?>
            <div class="instrucciones">
                Seleccione ahora la habitaci&oacute;n o habitaciones que le interese reservar.<br />Incluya si lo desea el número de desayunos por habitación seleccionada.<br />Haga click sobre el bot&oacute;n "Reserva ahora".
            </div>

        <?php } else if ($fechallegada2 != '') { ?>
            <div class="instrucciones">
                Rellene el formulario de reserva con sus datos. Los campos obligatorios est&aacute;n marcados con un item rojo.<br /><br />No se admite American Express.
            </div>
        <?php }

        require_once('includes/datesfromform.php');

        if ($fechallegada2 == '' && $autorizacion == '') {
            require_once('includes/calendariodisponibilidad.php');
        ?>
        <?php } ?>
        <br />

        <?php
        $timestamp = date("Y");
        $mess = date("m");
        $diaa = date("d");

        // to select booking in and out date
        require_once('includes/formreserva.php');

        /* if ($numhabitaciones1 != 0 || $numhabitaciones2 != 0 || $numhabitaciones3 != 0 || $numhabitaciones4 != 0) { */
        /*     include('includes/formularioreserva.php'); */
        /* } */

        if ($numhabitaciones1 || $numhabitaciones2 || $numhabitaciones3 || $numhabitaciones4) {
            include('includes/formularioreserva.php');
        } ?>

        <?php if ($autorizacion == 1) {

            if ($fechallegada3 != '') {
                list($diallegada, $mesllegada, $aniollegada) = preg_split('~[/.-]~', $fechallegada3);
                list($diasalida, $messalida, $aniosalida) = preg_split('~[/.-]~', $fechasalida3);
            }

            include('includes/quitarhabitaciones.php');

            if ($alguienseadelanto == 0 && $repetido != 'yes') { ?>
                <table class="dispohabitaciones" align="center" border="0" cellspacing="0" bgcolor="" width="80%">
                    <tr>
                        <td style="color: #630; text-align: left; font-size: 80%; font-weight: none; padding:30px 30px 30px 30px">
                            <div>Su reserva se realiz&oacute; con &eacute;xito. En breve recibir&aacute; un email con los datos de la misma.<br /><br />Le agradecemos su confianza.</div>
                        </td>
                    </tr>
                </table><br />

            <?php
                include('includes/emailreserva.php');
            } else if ($repetido == 'yes' && $alguienseadelanto == 0) { ?>
                <table class="dispohabitaciones" align="center" border="0" cellspacing="0" bgcolor="" width="80%">
                    <tr>
                        <td style="color: #630; text-align: left; font-size: 80%; font-weight: none; padding:30px 30px 30px 30px">
                            <div>Atenci&oacute;n: Su reserva ya se ha enviado anteriormente con &eacute;xito. En breve recibir&aacute; un email con los datos de la misma.<br /><br />Le agradecemos su confianza.</div>
                        </td>
                    </tr>
                </table><br />

            <?php } else if ($alguienseadelanto == 1) { ?>
                <table class="dispohabitaciones" align="center" border="0" cellspacing="0" bgcolor="" width="80%">
                    <tr>
                        <td style="color: #630; text-align: left; font-size: 80%; font-weight: none; padding:30px 30px 30px 30px">
                            <div>Lo sentimos. Algui&eacute;n se le adelant&oacute; en estos instantes y una de las habitaciones que estaba reservando no est&aacute; disponible en estos momentos. Disculpe las molestias.<br /><?php echo $ahora; ?>(<a href="index.php">Volver a Reservar</a>)</div>
                        </td>
                    </tr>
                </table><br />
        <?php } else {
            }
        } ?>
        <br /><br /><br /><br /><br />
    </div>
    <br /><br /><br />
</body>

</html>
