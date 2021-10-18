//habilitar dispo y deshabilitar tarifas, tarifas standart y Est Mínima
function habilita1(form)

{
    form.estado_ocupacion.disabled = false;
    form.num_habitaciones.disabled = false;

    form.ckimporte1.disabled = true;
    form.ckimporte2.disabled = true;
    form.ckimporte3.disabled = true;
    form.ckimporte4.disabled = true;
    form.ckimporte5.disabled = true;
    form.ckimporte1.checked = 0;
    form.ckimporte2.checked = 0;
    form.ckimporte3.checked = 0;
    form.ckimporte4.checked = 0;
    form.ckimporte5.checked = 0;
    form.importe1.disabled = true;
    form.importe2.disabled = true;
    form.importe3.disabled = true;
    form.importe4.disabled = true;
    form.ckdesayuno1.disabled = true;
    form.ckdesayuno2.disabled = true;
    form.ckdesayuno3.disabled = true;
    form.ckdesayuno4.disabled = true;
    form.ckdesayuno1.checked = 0;
    form.ckdesayuno2.checked = 0;
    form.ckdesayuno3.checked = 0;
    form.ckdesayuno4.checked = 0;

    form.ckestanmin1.disabled = true;
    form.ckestanmin2.disabled = true;
    form.ckestanmin3.disabled = true;
    form.ckestanmin4.disabled = true;
    form.estanmin1.disabled = true;
    form.estanmin2.disabled = true;
    form.estanmin3.disabled = true;
    form.estanmin4.disabled = true;
    form.ckestanmin1.checked = 0;
    form.ckestanmin2.checked = 0;
    form.ckestanmin3.checked = 0;
    form.ckestanmin4.checked = 0;
}

//habilitar tarifas y deshabilitar dispo, tarifas standart y Ens Mínima
function habilita2(form)

{
    form.estado_ocupacion.disabled = true;
    form.num_habitaciones.disabled = true;
    form.ckimporte1.disabled = false;
    form.ckimporte2.disabled = false;
    form.ckimporte3.disabled = false;
    form.ckimporte4.disabled = false;
    form.ckimporte5.disabled = false;
    form.ckestanmin1.disabled = true;
    form.ckestanmin2.disabled = true;
    form.ckestanmin3.disabled = true;
    form.ckestanmin4.disabled = true;
    form.estanmin1.disabled = true;
    form.estanmin2.disabled = true;
    form.estanmin3.disabled = true;
    form.estanmin4.disabled = true;
    form.ckestanmin1.checked = 0;
    form.ckestanmin2.checked = 0;
    form.ckestanmin3.checked = 0;
    form.ckestanmin4.checked = 0;

}


//habilitar Estancia Mínima y deshabilitar tarifas y dispo
function habilita3(form)

{
    form.estado_ocupacion.disabled = true;
    form.num_habitaciones.disabled = true;

    form.ckimporte1.disabled = true;
    form.ckimporte2.disabled = true;
    form.ckimporte3.disabled = true;
    form.ckimporte4.disabled = true;
    form.ckimporte5.disabled = true;
    form.ckimporte1.checked = 0;
    form.ckimporte2.checked = 0;
    form.ckimporte3.checked = 0;
    form.ckimporte4.checked = 0;
    form.ckimporte5.checked = 0;
    form.importe1.disabled = true;
    form.importe2.disabled = true;
    form.importe3.disabled = true;
    form.importe4.disabled = true;
    form.ckdesayuno1.disabled = true;
    form.ckdesayuno2.disabled = true;
    form.ckdesayuno3.disabled = true;
    form.ckdesayuno4.disabled = true;
    form.ckdesayuno1.checked = 0;
    form.ckdesayuno2.checked = 0;
    form.ckdesayuno3.checked = 0;
    form.ckdesayuno4.checked = 0;

    form.ckestanmin1.disabled = false;
    form.ckestanmin2.disabled = false;
    form.ckestanmin3.disabled = false;
    form.ckestanmin4.disabled = false;
}

//habilitar tarifas standart y deshabilitar tarifas, dispo y Ens Mínima
function habilita4(form)

{
    form.ckimportets1.disabled = false;
    form.ckimportets2.disabled = false;
    form.ckimportets3.disabled = false;
    form.ckimportets4.disabled = false;
    form.ckimportets5.disabled = false;
    form.ckimportets6.disabled = false;
    form.ckimportets7.disabled = false;
    form.ckimportets8.disabled = false;
    form.ckimportets9.disabled = false;
    form.ckimportets10.disabled = false;
}

function habilitaTodas(form)

{
    form.num_habitaciones.value = 'all';
}

function habilitaHabpendiente(form)

{
    form.num_habitaciones.value = '';
}
/**PENDIENTE: REALIZAR UN BUCLE CON LAS SIG 6 FUNCIONES***/
function habilitaimporte1(form) {
    if (form.importe1.disabled == true) {
        form.importe1.disabled = false;
        form.ckdesayuno1.disabled = false;

    } else {
        form.importe1.disabled = true;
        form.ckdesayuno1.disabled = true;
    }
}

function habilitaimporte2(form) {
    if (form.importe2.disabled == true) {
        form.importe2.disabled = false;
        form.ckdesayuno2.disabled = false;
    } else {
        form.importe2.disabled = true;
        form.ckdesayuno2.disabled = true;
    }
}

function habilitaimporte3(form) {
    if (form.importe3.disabled == true) {
        form.importe3.disabled = false;
        form.ckdesayuno3.disabled = false;
    } else {
        form.importe3.disabled = true;
        form.ckdesayuno3.disabled = true;
    }
}

function habilitaimporte4(form) {
    if (form.importe4.disabled == true) {
        form.importe4.disabled = false;
        form.ckdesayuno4.disabled = false;
    } else {
        form.importe4.disabled = true;
        form.ckdesayuno4.disabled = true;
    }
}

function habilitaimporte5(form) {
    if (form.importe5.disabled == true) {
        form.importe5.disabled = false;
        form.ckimporte6.disabled = true;
    } else {
        form.importe5.disabled = true;
    }

    if (form.ckimporte5.checked == 0) {
        form.ckimporte6.disabled = false;
    } else {
        form.ckimporte6.disabled = true;
    }
}

function habilitaimporte6(form) {
    if (form.ckimporte6.checked == 0) {
        form.ckimporte5.disabled = false;
    } else {
        form.ckimporte5.disabled = true;
    }
}
/*****************/

/**PENDIENTE: REALIZAR UN BUCLE CON LAS SIG 10 FUNCIONES***/
function habilitaimportets1(form) {
    if (form.importets1.disabled == true) {
        form.importets1.disabled = false;
    } else {
        form.importets1.disabled = true;
    }
}

function habilitaimportets2(form) {
    if (form.importets2.disabled == true) {
        form.importets2.disabled = false;
    } else {
        form.importets2.disabled = true;
    }
}

function habilitaimportets3(form) {
    if (form.importets3.disabled == true) {
        form.importets3.disabled = false;
    } else {
        form.importets3.disabled = true;
    }
}

function habilitaimportets4(form) {
    if (form.importets4.disabled == true) {
        form.importets4.disabled = false;
    } else {
        form.importets4.disabled = true;
    }
}

function habilitaimportets5(form) {
    if (form.importets5.disabled == true) {
        form.importets5.disabled = false;
    } else {
        form.importets5.disabled = true;
    }
}

function habilitaimportets6(form) {
    if (form.importets6.disabled == true) {
        form.importets6.disabled = false;
    } else {
        form.importets6.disabled = true;
    }
}

function habilitaimportets7(form) {
    if (form.importets7.disabled == true) {
        form.importets7.disabled = false;
    } else {
        form.importets7.disabled = true;
    }
}

function habilitaimportets8(form) {
    if (form.importets8.disabled == true) {
        form.importets8.disabled = false;
    } else {
        form.importets8.disabled = true;
    }
}

function habilitaimportets9(form) {
    if (form.importets9.disabled == true) {
        form.importets9.disabled = false;
    } else {
        form.importets9.disabled = true;
    }
}

function habilitaimportets10(form) {
    if (form.importets10.disabled == true) {
        form.importets10.disabled = false;
    } else {
        form.importets10.disabled = true;
    }
}
/************************/

function habilitaestanmin1(form) {
    if (form.estanmin1.disabled == true) {
        form.estanmin1.disabled = false;
    } else {
        form.estanmin1.disabled = true;
    }
}

function habilitaestanmin2(form) {
    if (form.estanmin2.disabled == true) {
        form.estanmin2.disabled = false;
    } else {
        form.estanmin2.disabled = true;
    }
}

function habilitaestanmin3(form) {
    if (form.estanmin3.disabled == true) {
        form.estanmin3.disabled = false;
    } else {
        form.estanmin3.disabled = true;
    }
}

function habilitaestanmin4(form) {
    if (form.estanmin4.disabled == true) {
        form.estanmin4.disabled = false;
    } else {
        form.estanmin4.disabled = true;
    }
}

//validación de fechas de entrada y salida
function check_fechaentrada(form) {

}

function check_fechasalida(form) {

}

//validación de número entero
function chk_number1(ctrl) {
    regexp = /^[0-9]*$/;
    if (ctrl.value.search(regexp) == -1) {
        alert("El valor introducido es inválido.\nPor favor introduzca un número, sin puntos ni comas");
        ctrl.value = "";
    }
}

//validación de número real utilizando el . para los decimales
function chk_number2(ctrl) {
    regexp = /^[0-9]*\.?[0-9]*$/;
    if (ctrl.value.search(regexp) == -1) {
        alert("El valor introducido es inválido.\nPor favor introduzca un número.\nUtilice el punto(.) en caso de utilizar decimales");
        ctrl.value = "";
    }
}

function valida_envia(form) {

    //valido la fecha de llegada
    if (form.elemento1.value.length == 0) {
        alert("Debe introducir una Fecha de llegada")
        return 0;
    }

    //valido la fecha de salida
    if (form.elemento2.value.length == 0) {
        alert("Debe introducir una Fecha de salida")
        return 0;
    }
    //valido que la fecha de salida sea posterior a la fecha de entrada
    // alertaroja = 1;
    primerElemento = document.getElementById("elemento1").value;
    segundoElemento = document.getElementById("elemento2").value;



    fechaprimerElemento = primerElemento.split('/');
    diaelemento1 = fechaprimerElemento[0];
    meselemento1 = fechaprimerElemento[1] - 1;
    anoelemento1 = fechaprimerElemento[2];
    fechaelemento1 = new Date(anoelemento1, meselemento1, diaelemento1);

    fechasegundoElemento = segundoElemento.split('/');
    diaelemento2 = fechasegundoElemento[0];
    meselemento2 = fechasegundoElemento[1] - 1;
    anoelemento2 = fechasegundoElemento[2];
    fechaelemento2 = new Date(anoelemento2, meselemento2, diaelemento2);

    if (fechaelemento2 <= fechaelemento1) {
        //alertaroja = 2;
        alert("La Fecha de salida ha de ser posterior a la Fecha de entrada")
        return 0;
    }

    if (fechaelemento1 < fechaActual) {
        alert("La Fecha de entrada ha de ser posterior o igual al día de hoy")
        return 0;
    }

    //el formulario se envia
    form.submit();
}


function valida_enviavg(form) {


    //el formulario se envia
    form.submit();
}

