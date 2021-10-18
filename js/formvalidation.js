      //validamos que el formulario con el botón submit con id=btsubmit no se envíe más de una vez
      function checkSubmit() {
         document.getElementById("btsubmit").value = "Enviando...";
         document.getElementById("btsubmit").disabled = true;
         return true;
      }
      //validación de fechas de entrada y salida
      function check_fechaentrada(form) {}

      function check_fechasalida(form) {}

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

      function valida_envia1(form) {
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

      function valida_envia2(form) {
         //valido la selección de al menos una habitación
         if ((form.numhabitaciones1 ? form.numhabitaciones1.value == 0 : 1 == 1) && (form.numhabitaciones2 ? form.numhabitaciones2.value == 0 : 1 == 1) && (form.numhabitaciones3 ? form.numhabitaciones3.value == 0 : 1 == 1) && (form.numhabitaciones4 ? form.numhabitaciones4.value == 0 : 1 == 1)) {
            alert("Selecciona el número de habitaciones que deseas reservar")
            return 0;
         }

         if (form.numhabitaciones1 && form.desayunos1) {
            if (form.numhabitaciones1.value == 0 && form.desayunos1.value != 0) {
               alert("Para incluir un desayuno en un tipo de habitación debe seleccionar al menos una habitación de ese tipo")
               form.desayunos1.value = 0
               return 0;
            }
         }

         if (form.numhabitaciones2 && form.desayunos2) {
            if (form.numhabitaciones2.value == 0 && form.desayunos2.value != 0) {
               alert("Para incluir un desayuno en un tipo de habitación debe seleccionar al menos una habitación de ese tipo")
               form.desayunos2.value = 0
               return 0;
            }
         }

         if (form.numhabitaciones3 && form.desayunos3) {
            if (form.numhabitaciones3.value == 0 && form.desayunos3.value != 0) {
               alert("Para incluir un desayuno en un tipo de habitación debe seleccionar al menos una habitación de ese tipo")
               form.desayunos3.value = 0
               return 0;
            }
         }

         if (form.numhabitaciones4 && form.desayunos4) {
            if (form.numhabitaciones4.value == 0 && form.desayunos4.value != 0) {
               alert("Para incluir un desayuno en un tipo de habitación debe seleccionar al menos una habitación de ese tipo")
               form.desayunos4.value = 0
               return 0;
            }
         }
         //el formulario se envia
         form.submit();
      }
