<script type="text/javascript" language="JavaScript">
    //validación de nombre
    function chk_name(ctrl) {
        regexp = /^[a-z\ \.\-\_\'A-ZñÑáéíóúÁÉÍÓÚ]*$/;
        if (ctrl.value.search(regexp) == -1) {
            alert("El valor introducido es inválido.\nPor favor no introduzca carácteres numéricos ni signos extraños");
            ctrl.value = "";
        }
    }

    //validación de número entero
    function chk_number1(ctrl) {
        regexp = /^[0-9]*$/;
        if (ctrl.value.search(regexp) == -1) {
            alert("El valor introducido es inválido.\nPor favor introduzca un número, sin puntos ni comas");
            ctrl.value = "";
        }
    }

    //validación de email
    function chk_email(ctrl) {
        //regexp = /^[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}$/;
        //regexp = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/;
        regexp = /^(.+\@.+\..+)$/; //La validación es correcta excepto que se puede introducir varias veces el caracter @

        if (ctrl.value.search(regexp) == -1) {
            alert("El email introducido es inválido.\nPor favor introduzca un email válido.");
            ctrl.value = "";
        }

        //Controlamos que el caracter @ no se introduzca más de 1 vez
        toCompare = "@";
        caracteres = ctrl.value;
        veces = 0;
        for (i = 0; i <= caracteres.length - 1; i++) {
            if (toCompare == caracteres[i]) {
                veces++;
            }
        }

        if (veces >= 2) {
            alert("El email introducido es inválido.\nPor favor introduzca un email válido.");
            ctrl.value = "";
        }

    }

    //validación del email de confirmación
    function chk_email2(form) {
        if (form.emailf.value.length == 0) {
            alert("Para poder confirmar el email debe introducir primero un email válido en el campo email")
            form.emailf.focus()
            return 0;
        }
        if (form.email.value != form.email2.value) {
            alert("El email de confirmación es diferente al introducido previamente.\nPor favor asegúrese de confirmar el mismo email")
            form.email2.focus()
            form.email2.value = '';
        }
    }

    //validación de tarjeta de crédito
    function chk_tc(ctrl) {
        //Validamos tarjetas Visa o Mastercard correctas
        if ((!ctrl.value.match(/^4\d{3}-?\d{4}-?\d{4}-?\d{4}$/)) && (!ctrl.value.match(/^5[1-5]\d{2}-?\d{4}-?\d{4}-?\d{4}$/)))
        //  if (ctrl.value.search(regexp) == -1)
        {
            alert("La tarjeta introducida no es una tarjeta válida.\nPor favor introduzca un número válido de tarjeta sin espacios, puntos ni comas");
            ctrl.value = "";
        }

        //Validamos en el caso de Visa que el número de tarjeta cumpla el algoritmo
        if (ctrl.value.match(/^4\d{3}-?\d{4}-?\d{4}-?\d{4}$/)) {


            //Limpiamos el número de tarjeta  de posibles guiones (-)
            var expReg = /\W/gi;
            var numero = ctrl.value.replace(expReg, "");

            //Chequeamos que el numero entrado tenga formato numérico...
            if (isNaN(numero)) {
                alert("El número de la tarjeta de crédito no tiene formato numérico!");
                ctrl.focus();
                return false;
            }

            var suma = 0;
            for (i = numero.length; i > 0; i--) {

                //Si la posición es impar
                if (i % 2 == 1) {
                    var doble = "" + (parseInt(numero.substring(i - 1, i)) * 2);

                    //Si el doble tiene más dos cifras (o sea es mayor que 9)
                    if (doble.length == 2) {
                        doble = parseInt(doble.substring(0, 1)) + parseInt(doble.substring(1, 2));
                    }
                    suma += parseInt(doble);
                }
                //Si la posición es par
                else {
                    suma += parseInt(numero.substring(i - 1, i));
                }
            }

            //Si la suma total no es divisible por 10 entonces el número no es válido
            if (suma % 10 != 0) {
                alert("El número de la tarjeta de crédito no es válido!");
                ctrl.focus();
                ctrl.value = "";
                return false;
            }

            return true;

        }
    }

    /*validación del Código de Seguridad de la tarjeta
    function chk_cvv(ctrl)
    {
      regexp = /^[0-9]{3}$/;
      if (ctrl.value.search(regexp) == -1)
      {
        alert("El Código de Seguridad introducido no es válido.\nPor favor introduzca un número de 3 dígitos sin espacios, puntos ni comas");
        ctrl.value = "";
      }
    } */
    //validación de número real utilizando tanto el . como la , para los decimales
    function chk_number2(ctrl) {
        regexp = /^[0-9]*\.?\,?[0-9]*$/;
        if (ctrl.value.search(regexp) == -1) {
            alert("El valor introducido es inválido.\nPor favor introduzca un número.\nUtilice el punto(.) o la coma(,) en caso de utilizar decimales");
            ctrl.value = "";
        }
    }


    function habilita1(form)

    {
        document.images['imgtipo'].src = "images/IMG41_3.JPG";
    }

    function deshabilita1(form) {
        document.images['imgtipo'].src = "images/IMG41_1.JPG";
    }

    function deshabilita2(form) {
        document.images['imgtipo'].src = "images/IMG41_2.JPG";
    }

    function habilita3(form)

    {
        form.ancho_mod_rec.disabled = false;
        form.largo_mod_rec.disabled = false;
        form.area_mod_pol.disabled = true;
    }

    function deshabilita3(form)

    {
        form.ancho_mod_rec.disabled = true;
        form.largo_mod_rec.disabled = true;
        form.area_mod_pol.disabled = false;
    }

    function habilita4(form)

    {
        form.mlextraccionrodapie.disabled = false;
    }

    function deshabilita4(form)

    {
        form.mlextraccionrodapie.disabled = true;
    }

    function habilita5(form)

    {
        form.mlextraccionrodapie.disabled = false;
    }

    function valida_envia2(form) {
        //valido el nombre
        if (form.nombre.value.length == 0) {
            if (form.nombre.disabled == false) {
                alert("Debe introducir un nombre")
                form.nombre.focus()
                return 0;
            }
        }

        //valido los apellidos si existen
        if (form.apellidos) {
            if (form.apellidos.value.length == 0) {
                if (form.apellidos.disabled == false) {
                    alert("Debe introducir los apellidos")
                    form.apellidos.focus()
                    return 0;
                }
            }
        }

        //valido el teléfono
        if (form.telefonof.value.length == 0) {
            if (form.telefonof.disabled == false) {
                alert("Debe introducir un teléfono de contacto")
                form.telefonof.focus()
                return 0;
            }
        }

        //valido el email
        if (form.emailf.value.length == 0) {
            if (form.emailf.disabled == false) {
                alert("Debe introducir una dirección de email")
                form.direccion.focus()
                return 0;
            }
        }

        //validar confirmación del email
        if (form.email2.value.length == 0) {
            if (form.email2.disabled == false) {
                alert("Debe confirmar la dirección de email introducida")
                form.email2.focus()
                return 0;
            }
        }

        //valido la tarjeta de crédito
        if (form.creditcard.value.length == 0) {
            alert("Debe introducir un número de tarjeta de crédito")
            form.creditcard.focus()
            return 0;
        }

        /*valido el CVV
        if (form.cvv.value.length==0){
           alert("Debe introducir un Código de Seguridad para la tarjeta")
           form.cvv.focus()
           return 0;
        	} */
        //valido el autorizacion
        if (form.autorizacion.checked == 0) {
            alert("Debe autorizar que el hotel se reserva el derecho de preautorizar las tarjetas de crédito antes de la fecha de llegada")
            form.autorizacion.focus()
            return 0;
        }

        //el formulario se envia
        form.submit();
    }
</script>

<form method="post" action="index.php" id="btsubmit" onsubmit="return checkSubmit();">
    <input type="hidden" name="idioma" value="<?php echo $idioma; ?>">
    <input type="hidden" name="titulo_menu" value="<?php echo $titulo_menu; ?>">
    <input type="hidden" name="nombre_titulo" value="<?php echo $nombre_titulo; ?>">
    <input type="hidden" name="subtitulo" value="<?php echo $subtitulo; ?>">
    <input type="hidden" name="cabezera" value="<?php echo $cabezera; ?>">
    <!--<input type="hidden" name="option" value="com_content">-->


    <!---------Tabla Tu reserva------------>
    <div width="80%" id="formulario">
        <table width="100%" align="center" class="formul">
            <tr>
                <td colspan=4>
                    <div id="concepto02">Tu reserva</div>
                </td>
            </tr>
        </table>

        <?php
        if ($fechallegada2 != '') {
            list($diallegada, $mesllegada, $aniollegada) = preg_split('~[/.-]~', $fechallegada2);
            list($diasalida, $messalida, $aniosalida) = preg_split('~[/.-]~', $fechasalida2);
        }

        include('calculonumeronoches.php');
        include('variablesgenerales.php');


        if ($numhabitaciones1 != 0) {
            list($numhab1, $prixhab1) = preg_split('~[/-]~', $numhabitaciones1);
        }
        if ($numhabitaciones2 != 0) {
            list($numhab2, $prixhab2) = preg_split('~[/-]~', $numhabitaciones2);
        }
        if ($numhabitaciones3 != 0) {
            list($numhab3, $prixhab3) = preg_split('~[/-]~', $numhabitaciones3);
        }
        if ($numhabitaciones4 != 0) {
            list($numhab4, $prixhab4) = preg_split('~[/-]~', $numhabitaciones4);
        }

        if ($desayunos1 != 0) {
            list($desayu1, $prixdesayu1) = preg_split('~[/-]~', $desayunos1);
        }
        if ($desayunos2 != 0) {
            list($desayu2, $prixdesayu2) = preg_split('~[/-]~', $desayunos2);
        }
        if ($desayunos3 != 0) {
            list($desayu3, $prixdesayu3) = preg_split('~[/-]~', $desayunos3);
        }
        if ($desayunos4 != 0) {
            list($desayu4, $prixdesayu4) = preg_split('~[/-]~', $desayunos4);
        }

        $numerodehabs = 0;

        $numhab1 != '' ? $numerodehabs += $numhab1 : $numerodehabs = $numerodehabs;
        $numhab2 != '' ? $numerodehabs += $numhab2 : $numerodehabs = $numerodehabs;
        $numhab3 != '' ? $numerodehabs += $numhab3 : $numerodehabs = $numerodehabs;
        $numhab4 != '' ? $numerodehabs += $numhab4 : $numerodehabs = $numerodehabs;

        $numerodehabs == 1 ? $habitacion = 'habitacion' : $habitacion = 'habitaciones';



        $redaccion = '';
        $numhab1 != '' ? $redaccion .= '<br/>' . $habindividual . ': ' . $numhab1 : $redaccion = $redaccion;
        $desayunoincluido1 == 'yes' && $numhab1 != '' ? $redaccion .= ' con desayuno incluido' : $redaccion = $redaccion;
        $desayu1 != '' ? ($desayu1 != 1 ? $redaccion .= ' con ' . $desayu1 . ' desayunos por habitación<br/>' : $redaccion .= ' con ' . $desayu1 . ' desayuno por habitación') : $redaccion = $redaccion;
        $numhab2 != '' ? $redaccion .= '<br/>' . $habdoble . ': ' . $numhab2 : $redaccion = $redaccion;
        $desayunoincluido2 == 'yes' && $numhab2 != '' ? $redaccion .= ' con desayuno incluido' : $redaccion = $redaccion;
        $desayu2 != '' ? ($desayu2 != 1 ? $redaccion .= ' con ' . $desayu2 . ' desayunos por habitación<br/>' : $redaccion .= ' con ' . $desayu2 . ' desayuno por habitación') : $redaccion = $redaccion;
        $numhab3 != '' ? $redaccion .= '<br/>' . $habdoblesupl . ': ' . $numhab3 : $redaccion = $redaccion;
        $desayunoincluido3 == 'yes' && $numhab3 != '' ? $redaccion .= ' con desayuno incluido' : $redaccion = $redaccion;
        $desayu3 != '' ? ($desayu3 != 1 ? $redaccion .= ' con ' . $desayu3 . ' desayunos por habitación<br/>' : $redaccion .= ' con ' . $desayu3 . ' desayuno por habitación') : $redaccion = $redaccion;
        $numhab4 != '' ? $redaccion .= '<br/>' . $habfamiliar . ': ' . $numhab4 : $redaccion = $redaccion;
        $desayunoincluido4 == 'yes' && $numhab4 != '' ? $redaccion .= ' con desayuno incluido' : $redaccion = $redaccion;
        $desayu4 != '' ? ($desayu4 != 1 ? $redaccion .= ' con ' . $desayu4 . ' desayunos por habitación<br/>' : $redaccion .= ' con ' . $desayu4 . ' desayuno por habitación') : $redaccion = $redaccion;


        $preciototal = 0;
        $prixhab1 != '' ? $preciototal += $prixhab1 * $numhab1 : $preciototal = $preciototal;
        $prixhab2 != '' ? $preciototal += $prixhab2 * $numhab2 : $preciototal = $preciototal;
        $prixhab3 != '' ? $preciototal += $prixhab3 * $numhab3 : $preciototal = $preciototal;
        $prixhab4 != '' ? $preciototal += $prixhab4 * $numhab4 : $preciototal = $preciototal;

        $prixdesayu1 != '' ? $preciototal += $prixdesayu1 * $desayu1 * $numhab1 : $preciototal = $preciototal;
        $prixdesayu2 != '' ? $preciototal += $prixdesayu2 * $desayu2 * $numhab2 : $preciototal = $preciototal;
        $prixdesayu3 != '' ? $preciototal += $prixdesayu3 * $desayu3 * $numhab3 : $preciototal = $preciototal;
        $prixdesayu4 != '' ? $preciototal += $prixdesayu4 * $desayu4 * $numhab4 : $preciototal = $preciototal;


        /*
$precioiva = $preciototal*($iva/100);
$precioiva = number_format($precioiva, 2, ",", ".");

$preciosiniva = $preciototal*((100 - $iva)/100);
$preciosiniva = number_format($preciosiniva, 2, ",", ".");

$preciototal = number_format($preciototal, 2, ",", ".");
*/

        $preciosiniva = $preciototal / (1 + ($iva / 100));
        $preciosiniva = number_format($preciosiniva, 2, ",", ".");

        $precioiva = $preciototal / (10 * (1 + ($iva / 100)));
        $precioiva = number_format($precioiva, 2, ",", ".");

        $preciototal = number_format($preciototal, 2, ",", ".");

        ?>
        <table class="formul2" align="center" border="0" cellspacing="0" bgcolor="" width="100%">
            <tr>
                <td width="50%" style="vertical-align:top">

                    <table border="0" cellspacing="0" bgcolor="" width="100%">
                        <tr>
                            <td width="65%">
                                <div>Entrada: <?php echo $dsllegada . " " . $diallegada . " de " . $MESCOMPLETO[$mesllegada] . " " . $aniollegada; ?><br />
                                    Salida: <?php echo $dssalida . " " . $diasalida . " de " . $MESCOMPLETO[$messalida] . " " . $aniosalida; ?><br />Para <?php echo $numNoches . " " . $noches;
                                                                                                                                                            echo $redaccion; ?></div>
                            </td>
                        </tr>
                    </table>

                </td>
                <td width="35%" style="vertical-align:top">

                    <table border="0" cellspacing="0" bgcolor="" width="100%">
                        <tr>
                            <td>
                                <div>Habitaci&oacute;n: <?php echo "€ " . $preciosiniva; ?><br />IVA (<?php echo $iva . "%"; ?>): <?php echo "€ " . $precioiva; ?><br />Precio total: <?php echo "€ " . $preciototal; ?></div>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>

    <br /><br />

    <div width="80%" id="formulario">
        <table width="100%" align="center" class="formul">
            <tr>
                <td>Formulario de Reserva</td>
            </tr>
        </table>
        <table class="formul3" align="center" cellpadding=0 cellspacing="5px" bgcolor="" width="100%">
            <tr>
                <td width="3%"><img class="check" src="images/check.gif" alt="" width="16px" align="" /></td>
                <td width="47%" class="abcd">Nombre: <input type="text" name="nombre" size=20 class="verdana11opcion" onChange="chk_name(this)"></td>
                <td width="3%"><img class="check" src="images/check.gif" alt="" width="16px" align="" /></td>
                <td width="47%" class="abcd">Apellido(s): <input type="text" name="apellidos" size=25 class="verdana11opcion" onChange="chk_name(this)"></td>
            </tr>

            <tr>
                <td width="3%"><img class="check" src="images/check.gif" alt="" width="16px" align="" /></td>
                <td width="97%" colspan=3 class="abcd">Tel&eacute;fono: <input type="text" name="telefonof" size=20 class="verdana11opcion" onChange="chk_telefono(this)"></td>
            </tr>

            <tr>
                <td width="3%"><img class="check" src="images/check.gif" alt="" width="16px" align="" /></td>
                <td width="97%" colspan=3 class="abcd">Email: <input type="text" name="emailf" size=24 class="verdana11opcion" onChange="chk_email(this)"></td>
            </tr>

            <tr>
                <td width="3%"><img class="check" src="images/check.gif" alt="" width="16px" align="" /></td>
                <td width="97%" colspan=3 class="abcd">Confirmar email: <input type="text" name="email2" size=24 class="verdana11opcion" onChange="chk_email2(this.form)"></td>
            </tr>
        </table>


        <!---credit card numbers--->
        <table class="formul4" align="center" cellspacing="5px" bgcolor="" width="100%">
            <tr>
                <td colspan=3 class="creditcard">TARJETA DE CR&Eacute;DITO</td>
            <tr>
            <tr>
                <td width="3%"><img class="check" src="images/check.gif" alt="" width="16px" align="" /></td>
                <td width="47%" class="abcd">N° tarjeta: <input type="text" name="creditcard" size=16 class="verdana11opcion" onChange="chk_tc(this)"></td>
                <td width="3%"><img class="check" src="images/check.gif" alt="" width="16px" align="" /></td>
                <td width="47%" class="abcd">[Caducidad] Mes / A&ntilde;o:
                    <select name="caducames">

                        <?php for ($i = 1; $i <= 12; $i++) {
                            $i < 10 ? $cero = '0' : $cero = ''; ?>
                            <option value=<?php echo $cero . $i;
                                            if ($i == 1) { ?> selected <?php } ?>> <?php echo $cero . $i; ?></option><?php
                                                                                                                    } ?>
                    </select>

                    <select name="caducaano">

                        <?php for ($i = 0; $i < 8; $i++) { ?>
                            <option value=<?php echo date('Y') + $i;
                                            if ($i == 0) { ?> selected <?php } ?>> <?php echo date('Y') + $i; ?></option><?php
                                                                                                                        } ?>
                    </select>


                </td>
            </tr>

            <!--<tr  ><td width="3%"><img class="check" src="images/check.gif" alt=""  width="16px" align=""/></td>
	<td  width="97%" colspan=3 class="abcd">C&oacute;digo Seguridad (CVV):  <input type="text" name="cvv" size=3  class="verdana11opcion" onChange="chk_cvv(this)"></td></tr>-->
            <!---Fin de credit card numbers--->

        </table>

        <table class="formul3" align="center" border="0" cellspacing="5px" bgcolor="" width="100%">

            <tr>
                <td width="3%"><img class="check" src="images/check.gif" alt="" width="16px" align="" /></td>
                <td width="97%" class="comentario">El hotel se reserva el derecho de preautorizar las tarjetas de cr&eacute;dito antes de la fecha de llegada. Si desea cancelar o modificar su reserva llame al Tfn: (0034) 555 555555.
                    <!--En caso de no presentación o anulación menos de 24h antes de las 12:00PM del día de llegada autorizo cargo de la primera noche en la tarjeta indicada así como el comprobar la autenticidad de la misma (si desea anular la reserva debe comunicarlo por teléfono indicando los datos de su reserva):--> <input name="autorizacion" id="autorizacion" value="1" type="checkbox">
                </td>
            </tr>
            <tr>
                <td width="3%"></td>
                <td width="97%" class="comentario" colspan=2>¿Donde nos ha conocido?
                    <input type="text" name="dondeconocido" size=50 class="verdana11opcion"></textarea>
                </td>
            </tr>
            <tr>
                <td width="3%"></td>
                <td width="97%" class="comentario" colspan=2>Observaciones:<br />
                    <textarea name="comentario" rows=4 cols=50 class="verdana11opcion"></textarea>
                </td>
            </tr>
            <tr>
                <td width="3%"></td>
                <td width="97%" class="enviar" colspan=2>
                    <input type="button" value="Confirmar Reserva" class="enviar" onclick="valida_envia2(this.form)">
                </td>
            </tr>
        </table>
    </div>
    <?php
    $fechallegada3 = $fechallegada2;
    $fechasalida3 = $fechasalida2;
    $dsllegada3 = $dsllegada;
    $dssalida3 = $dssalida;
    ?>
    <input type="hidden" name="fechallegada3" value="<?php echo $fechallegada3; ?>">
    <input type="hidden" name="fechasalida3" value="<?php echo $fechasalida3; ?>">
    <input type="hidden" name="numNoches" value="<?php echo $numNoches; ?>">
    <input type="hidden" name="noches" value="<?php echo $noches; ?>">
    <input type="hidden" name="numerodehabs" value="<?php echo $numerodehabs; ?>">
    <input type="hidden" name="habitacion" value="<?php echo $habitacion; ?>">
    <input type="hidden" name="preciosiniva" value="<?php echo $preciosiniva; ?>">
    <input type="hidden" name="precioiva" value="<?php echo $precioiva; ?>">
    <input type="hidden" name="iva" value="<?php echo $iva; ?>">
    <input type="hidden" name="preciototal" value="<?php echo $preciototal; ?>">
    <input type="hidden" name="redaccion" value="<?php echo $redaccion; ?>">
    <input type="hidden" name="numhab1" value="<?php echo $numhab1; ?>">
    <input type="hidden" name="numhab2" value="<?php echo $numhab2; ?>">
    <input type="hidden" name="numhab3" value="<?php echo $numhab3; ?>">
    <input type="hidden" name="numhab4" value="<?php echo $numhab4; ?>">
    <input type="hidden" name="dsllegada3" value="<?php echo $dsllegada3; ?>">
    <input type="hidden" name="dssalida3" value="<?php echo $dssalida3; ?>">
    <input type="hidden" name="ahora" value="<?php echo time(); ?>">


</form>

<br /><br />
