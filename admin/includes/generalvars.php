<?php

if ($tarea == 'modiftarifastandart') {
    include('includes/cargartarifastandart.php');
}
?>
<div class="menuprincipal" width=90% align=center>
    <spam style="padding-right:15%;" width=100%><a href="index.php">Administración de Reservas on-line</a></spam>
</div>


<!----------CARGAR O MODIFICAR LAS VARIABLES GENERALES------>

<form method="post" action="index.php">
    <input type="hidden" name="tarifasestandar" value="yes">
    <div class="instrucciones">
        Introduzca las variables generales que vaya a utilizar para <b>CARGAR DÍAS</b><br />(Administración de Reservas on-line =>Disponibilidad => Librar Todas las habitaciones (CARGAR DÍAS) ).<br />Los días serán cargados con las variables generales existentes que haya introducido.
    </div>


    <table align="center" border="0" cellspacing="0" bgcolor="" width="80%">

        <!---BLOQUE4: MODIFICAR TARIFAS STANDART-->
        <?php
        $qryvargen = "select * from variablesgenerales";
        $resvargen = $conexion->query($qryvargen);
        $rowresvargen = $resvargen->fetch_assoc();

        $variablestableVG = array('iva', 'habindividual', 'habdoble', 'habdoblesupl', 'habfamiliar', 'pvphabindividual', 'pvphabdoble', 'pvphabdoblesupl', 'pvphabfamiliar', 'pvpdesayuno');

        $DefvariablestableVG = array('Iva(%)', 'Núm. Total Habitación individual', 'Núm. Total Habitación doble', 'Núm. Total Habitación doble supl', 'Núm. Total Habitación familiar', 'PVP Habitación individual(€)', 'PVP Habitación doble(€)', 'PVP Habitación doble supl(€)', 'PVP Habitación familiar(€)', 'PVP Desayuno(€)'); ?>
        <tr class="modifvg">
            <td width="5%" valign="top" style="padding: 10px"><input type="radio" name="tarea" value="modiftarifastandart" onClick="habilita4(this.form)"></td>
            <td class="" width="25%" valign="top" style="padding: 10px">Modificar Variables Generales:<br />
                <div style="color:#FF0000; font-size:85%"></div>
            </td>
            <td width="40%" style="padding: 10px">

                <?php for ($i = 0; $i < 10; $i++) { ?><input type="checkbox" name="ckimportets<?php echo ($i + 1); ?>" onClick="habilitaimportets<?php echo ($i + 1); ?>(this.form)" disabled="disabled"><?php echo $DefvariablestableVG[$i]; ?><br />
                <?php } ?>
            </td>

            <td width="30%" style="padding: 10px"><?php for ($i = 0; $i < 10; $i++) { ?>
                    <input type="text" name="importets<?php echo ($i + 1); ?>" disabled="disabled" size=5 <?php if ($i < 5) { ?>onChange="chk_number1(this)" <?php } else { ?>onChange="chk_number2(this)" <?php } ?> value="<?php echo $rowresvargen[$variablestableVG[$i]]; ?>"><br />
                <?php } ?>
            </td>
        </tr>
        <!---FIN DEL BLOQUE4-->
        <tr>
            <td colspan=3 height="25px"></td>
        </tr>


        <tr>
            <td class="verdana11enviar"> </td>
            <td><input type="button" value="Enviar" class="enviar" onclick="valida_enviavg(this.form)"></td>
        </tr>
    </table>
</form>
<!----------FIN DE CARGAR O MODIFICAR LAS VARIABLES GENERALES------>
