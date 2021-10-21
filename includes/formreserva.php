<?php

?>


<form method="post" action="index.php">
    <input type="hidden" name="idioma" value="<?php echo $idioma; ?>">
    <input type="hidden" name="titulo_menu" value="<?php echo $titulo_menu; ?>">
    <input type="hidden" name="nombre_titulo" value="<?php echo $nombre_titulo; ?>">
    <input type="hidden" name="subtitulo" value="<?php echo $subtitulo; ?>">
    <input type="hidden" name="cabezera" value="<?php echo $cabezera; ?>">


    <?php //////////////////////////////////////
    if ($diallegada != '') $diaa = $diallegada;
    if ($mesllegada != '') $mess = $mesllegada;
    //////////////////////////////////////

    if ($fechallegada != '') {
        $DiaSemanaLlegada = date("w", mktime(0, 0, 0, $mesllegada, $diallegada, $aniollegada));
        $DiaSemanaSalida = date("w", mktime(0, 0, 0, $messalida, $diasalida, $aniosalida));

        include('includes/calculonumeronoches.php');
    } ?>
    <?php if ($fechallegada != '') {
        $dsllegada = $SEMANACOMPLETA[($DiaSemanaLlegada + 6) % 7];
        $dssalida = $SEMANACOMPLETA[($DiaSemanaSalida + 6) % 7];
    ?>

        <input type="hidden" name="idioma" value="<?php echo $idioma; ?>">
        <input type="hidden" name="titulo_menu" value="<?php echo $titulo_menu; ?>">
        <input type="hidden" name="nombre_titulo" value="<?php echo $nombre_titulo; ?>">
        <input type="hidden" name="subtitulo" value="<?php echo $subtitulo; ?>">
        <input type="hidden" name="cabezera" value="<?php echo $cabezera; ?>">

        <div class="habsdisponibles">Habitaciones disponibles desde el <?php echo $dsllegada . " " . $diallegada . " de " . $MESCOMPLETO[$mesllegada] . " " . $aniollegada; ?>, hasta el <?php echo $dssalida . " " . $diasalida . " de " . $MESCOMPLETO[$messalida] . " " . $aniosalida; ?>, para <?php echo $numNoches . " " . $noches . "."; ?><br />(<a href="index.php">Modificar fechas</a>)</div>
    <?php
    }

    if (($fechallegada == '' || $modiffechas == 'yes') && ($fechallegada2 == '' && $autorizacion == '')) { ?>

        <div id="main-box">
            <div id="lightpurple" class="box-test">Fecha de llegada:<br />
                <input type="text" name="fechallegada" id="elemento1" onclick="check_fechaentrada(this.form)" class="campofecha" size="10" value="">
            </div>

            <div id="lightpurple" class="box-test">Fecha de salida:<br />
                <input type="text" name="fechasalida" id="elemento2" onclick="check_fechasalida(this.form)" class="campofecha2" size="10">
            </div>

            <div id="lightpurple" class="box-test"><br />
                <input type="button" value="Ver Disponibilidad" class="enviar" onclick="valida_envia1(this.form)">
            </div>

        </div>

    <?php
    } ?>

    <?php if ($fechallegada != '') {
        include('includes/cargarhabitaciones.php');
    } ?>


    <br /><br />
</form>
