<form method="post" action="index.php">

    <?php //////////////////////////////////////
    if ($diallegada != '') $diaa = $diallegada;
    if ($mesllegada != '') $mess = $mesllegada;
    //////////////////////////////////////
    ?>
    <div id="main-box">
        <div id="lightpurple" class="box-test">Fecha de llegada:<br />
            <input type="text" name="fechallegada" id="elemento1" onclick="check_fechaentrada(this.form)" class="campofecha" size="10" value="">
        </div>
        <div id="lightpurple" class="box-test">Fecha de salida:<br />
            <input type="text" name="fechasalida" id="elemento2" onclick="check_fechasalida(this.form)" class="campofecha2" size="10">
        </div>
    </div>

    <table align="center" border="0" cellspacing="0" bgcolor="" width="95%">

        <!---BLOQUE1: DISPONIBILIDAD-->
        <tr>
            <td width="3%"><input type="radio" name="tarea" value="dispo" onClick="habilita1(this.form)"></td>
            <td class="" width="15%">Disponibilidad:</td>
            <td width="42%">
                <select class="" name="estado_ocupacion" disabled="disabled">
                    <option value="" selected>--Seleccione una opción--</option>
                    <option value="1" onClick="habilitaTodas(this.form)">Ocupar Todas las habitaciones (CERRAR DÍAS)</option>
                    <?php
                    $k = 2;
                    foreach ($restipohab as $row) { ?>
                        <option value="<?php echo $k; ?>" onClick="habilitaHabpendiente(this.form)"><?php echo $row['nombre'];
                                                                                                    $k++; ?> Disponibles</option>
                    <?php }

                    ?>

                    <option value="<?php echo $k; ?>" onClick="habilitaTodas(this.form)">Librar Todas las habitaciones (CARGAR DÍAS)<?php $k++ ?></option>
                    <?php

                    //for ($i=0; $i <	mysqli_num_rows($restipohab); $i++)  {
                    foreach ($restipohab as $row) {
                    ?>
                        <option value="<?php echo $k; ?>" onClick="habilitaHabpendiente(this.form)">Librar <?php echo $row['nombre'];
                                                                                                            $k++; ?></option>
                    <?php }

                    ?>
                </select>
            </td>

            <td colspan=2 width="40%">
                <select class="" name="num_habitaciones" disabled="disabled">
                    <option value="" selected>--¿Cuantas habitaciones?--</option>
                    <option value="all">Todas las habitaciones</option>
                    <option value="0">Ninguna</option>
                    <option value="1">1 habitación</option>
                    <option value="2">2 habitaciones</option>
                    <option value="3">3 habitaciones</option>
                    <option value="4">4 habitaciones</option>
                    <option value="5">5 habitaciones</option>
                    <option value="6">6 habitaciones</option>
                    <option value="7">7 habitaciones</option>
                    <option value="8">8 habitaciones</option>
                    <option value="9">9 habitaciones</option>
                    <option value="10">10 habitaciones</option>
                </select>
            </td>

        </tr>

        <?php $k = 1; ?>
        <tr>
            <td colspan=5 height="25px"></td>
        </tr>

        <!---BLOQUE2: MODIFICAR TARIFAS-->
        <tr>
            <td width="3%" valign="top"><input type="radio" name="tarea" value="modiftarifa" onClick="habilita2(this.form)"></td>
            <td class="" width="15%" valign="top">Modificar Tarifas:</td>
            <td colspan=2 width="63%"></td>
            <td width="30%">Incluir Desayuno en la Tarifa</td>




        <tr>
            <td colspan=2 width="18%"></td>
            <td width="42%">

                <?php
                //$n=mysqli_num_rows($restipohab);

                // for ($i=0; $i <	$n; $i++)  {
                $i = 0;
                foreach ($restipohab as $row) {
                ?><input type="checkbox" name="ckimporte<?php echo ($i + 1); ?>" onClick="habilitaimporte<?php echo ($i + 1); ?>(this.form)" disabled="disabled"><?php echo $row["nombre"];
                                                                                                                                                                    $k++; ?><br />
                <?php
                    $i = $i + 1;
                }
                ?>

                <input type="checkbox" name="ckimporte<?php echo $k; ?>" onClick="habilitaimporte<?php echo $k; ?>(this.form)" disabled="disabled">Desayuno por persona<?php $k++; ?><br />
            </td>

            <td width="10%"><?php for ($i = 1; $i < $k - 1; $i++) { ?>
                    <input type="text" name="importe<?php echo $i; ?>" disabled="disabled" size=5 onChange="chk_number(this)"><br />
                <?php } ?>
            </td>
            <td width="30%">
                <?php for ($i = 0; $i <    $n; $i++) { ?><input type="checkbox" name="ckdesayuno<?php echo ($i + 1); ?>" disabled="disabled"><br />
                <?php } ?>
                <br />
            </td>
        </tr>
        <tr>
            <td colspan=5 height="25px"></td>
        </tr>

        <!---BLOQUE3: RESTRICCIÓN DE ESTANCIA MÍNIMA-->
        <tr>
            <td width="3%" width="15%" valign="top"><input type="radio" name="tarea" value="estanciaminima" onClick="habilita3(this.form)"></td>
            <td class="" width="15%" valign="top">Estancia mínima:</td>
            <td width="42%">

                <?php
                $i = 0;
                foreach ($restipohab as $row) {
                ?><input type="checkbox" name="ckestanmin<?php echo ($i + 1); ?>" onClick="habilitaestanmin<?php echo ($i + 1); ?>(this.form)" disabled="disabled"><?php echo $row['nombre']; ?><br />
                <?php
                    $i = $i + 1;
                }

                ?>
            <td colspan=2 width="40%">
                <?php for ($i = 0; $i < $n; $i++) { ?>
                    <select class="" name="estanmin<?php echo ($i + 1); ?>" disabled="disabled">
                        <option value="" selected>--Seleccione una opción--</option>
                        <option value="2">2 noches</option>
                        <option value="3">3 noches</option>
                        <option value="4">4 noches</option>
                        <option value="5">5 noches</option>
                        <option value="6">6 noches</option>
                        <option value="7">7 noches</option>
                        <option value="null">Anular estancia mínima</option>
                    </select>
                    <br />
                <?php } ?>

            </td>

        </tr>

        <!---FIN DEL BLOQUE3-->
        <tr>
            <td colspan=5 height="25px"></td>
        </tr>

        <tr>
            <td class="verdana11enviar" width="3%"> </td>
            <td width="15%"></td>
            <td width="42%"><input type="button" value="Enviar" class="enviar" onclick="valida_envia(this.form)"></td>
            <td width="10%"></td>
            <td width="30%"></td>
        </tr>
    </table>
</form>
