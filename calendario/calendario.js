jQuery.fn.calendarioDW = function() {
   this.each(function(){
		//saber si estoy mostrando el calendario
		//var mostrando = false;
		//variable con el calendario
		var calendario;
		//variable con los d?as del mes
		var capaDiasMes;
		//variable para mostrar el mes y ano que se est? viendo
		var capaTextoMesAnoActual = $('<div class="visualmesano"></div>');
		//iniciales de los d?as de la semana
		var dias = ["Lu", "Ma", "Mi", "Ju", "Vi", "Sa", "Do"];
		//nombres de los meses
		var nombresMes = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"]

		//elemento input
		var elem = $(this);
		//creo un enlace-bot?n para activar el calendario
		var boton = $("<a class='botoncal' href='#'><span></span></a>");
		//inserto el enlace-bot?n despu?s del campo input
		elem.after(boton);

		//evento para clic en el bot?n
		boton.click(function(e){
			e.preventDefault();
			mostrarCalendario();
		});
		//evento para clic en el campo
		elem.click(function(e){
			this.blur();
			//if (alertaroja == 1)
			mostrarCalendario();
		});

		//funci?n para mostrar el calendario
		function mostrarCalendario(){
			if(2==2){
				//mostrando = true;
				//es que hay que mostrar el calendario
				//dias de la semana
				var capaDiasSemana = $('<div class="diassemana"></div>');
				$(dias).each(function(indice, valor){
					var codigoInsertar = '<span';
					if (indice==0){
						codigoInsertar += ' class="primero"';
					}
					if (indice==6){
						codigoInsertar += ' class="domingo ultimo"';
					}
					codigoInsertar += ">" + valor + '</span>';

					capaDiasSemana.append(codigoInsertar);
				});

				//capa con los d?as del mes
				capaDiasMes = $('<div class="diasmes"></div>');

				//un objeto de la clase date para calculo de fechas
				var objFecha = new Date();
				//miro si en el campo INPUT tengo alguna fecha escrita
				var textoFechaEscrita = elem.val();
				if (textoFechaEscrita!= ""){
					if (validarFechaEscrita(textoFechaEscrita)){
						var arrayFechaEscrita = textoFechaEscrita.split("/");
						//hago comprobaci?n sobre si el a?o tiene dos cifras
						if(arrayFechaEscrita[2].length == 2){
							if (arrayFechaEscrita[2].charAt(0)=="0"){
								arrayFechaEscrita[2] = arrayFechaEscrita[2].substring(1);
							}
							arrayFechaEscrita[2] = parseInt(arrayFechaEscrita[2]);
							if (arrayFechaEscrita[2] < 50)
								arrayFechaEscrita[2] += 2000;
						}
						objFecha = new Date(arrayFechaEscrita[2], arrayFechaEscrita[1]-1, arrayFechaEscrita[0])
					}
				}


				//mes y a?o actuales
				var mes = objFecha.getMonth();
				var ano = objFecha.getFullYear();
				//muestro los d?as del mes y a?o dados
				muestraDiasMes(mes, ano);

				//control para ocultar el calendario
				var botonCerrar = $('<a href="#" class="calencerrar"><span></span></a>');
				botonCerrar.click(function(e){
					e.preventDefault();
					calendario.hide();
				})
				var capaCerrar = $('<div class="capacerrar"></div>');
				capaCerrar.append(botonCerrar)

				//controles para ir al mes siguiente / anterior
				var botonMesSiguiente = $('<a href="#" class="botonmessiguiente"><span></span></a>');
				botonMesSiguiente.click(function(e){
					e.preventDefault();
					mes = (mes + 1) % 12;
					if (mes==0)
						ano++;
					capaDiasMes.empty();
					muestraDiasMes(mes, ano);
				})
				var botonMesAnterior = $('<a href="#" class="botonmesanterior"><span></span></a>');
				botonMesAnterior.click(function(e){
					e.preventDefault();
					mes = (mes - 1);
					if (mes==-1){
						ano--;
						mes = 11
					}
					capaDiasMes.empty();
					muestraDiasMes(mes, ano);
				})

				//controles para ir al a?o siguiente / anterior
				var botonAnoSiguiente = $('<a href="#" class="botonanosiguiente"><span></span></a>');
				botonAnoSiguiente.click(function(e){
					e.preventDefault();
					ano++;
					if (mes==12)
					mes = 0;
					capaDiasMes.empty();
					muestraDiasMes(mes, ano);
				})
				var botonAnoAnterior = $('<a href="#" class="botonanoanterior"><span></span></a>');
				botonAnoAnterior.click(function(e){
					e.preventDefault();
					ano--;
					if (mes==0)
					mes = 12;
					capaDiasMes.empty();
					muestraDiasMes(mes, ano);
				})


				//capa para mostrar el texto del mes y ano actual
				var capaTextoMesAno = $('<div class="textomesano"></div>');
				var capaTextoMesAnoControl = $('<div class="mesyano"></div>')
				capaTextoMesAno.append(botonAnoSiguiente);
				capaTextoMesAno.append(botonAnoAnterior);
				capaTextoMesAno.append(botonMesSiguiente);
				capaTextoMesAno.append(botonMesAnterior);
				capaTextoMesAno.append(capaTextoMesAnoControl);
				capaTextoMesAnoControl.append(capaTextoMesAnoActual);

				//calendario y el borde
				calendario = $('<div class="capacalendario"></div>');
				var calendarioBorde = $('<div class="capacalendarioborde"></div>');
				calendario.append(calendarioBorde);
				calendarioBorde.append(capaCerrar);
				calendarioBorde.append(capaTextoMesAno);
				calendarioBorde.append(capaDiasSemana);
				calendarioBorde.append(capaDiasMes);

				//inserto el calendario en el documento
				$(document.body).append(calendario);
				//lo posiciono con respecto al boton
				calendario.css({
					top: boton.offset().top + "px",
					left: (boton.offset().left + 20) + "px"
				})
				//muestro el calendario
				calendario.show();

			}else{
				//es que el calendario ya se estaba mostrando...
				calendario.fadeOut();
				calendario.fadeIn();

			}

		}

		function muestraDiasMes(mes, ano){
			//console.log("muestro (mes, ano): ", mes, " ", ano)
			//muestro en la capaTextoMesAno el mes y ano que voy a dibujar
			capaTextoMesAnoActual.text(nombresMes[mes] + " " + ano);

			//muestro los d?as del mes
			var contadorDias = 1;

			//calculo la fecha del primer d?a de este mes
			var primerDia = calculaNumeroDiaSemana(1, mes, ano);
			//calculo el ?ltimo d?a del mes
			var ultimoDiaMes = ultimoDia(mes,ano);

			//escribo la primera fila de la semana
			for (var i=0; i<7; i++){
				if (i < primerDia){
					//si el dia de la semana i es menor que el numero del primer dia de la semana no pongo nada en la celda
					var codigoDia = '<span class="diainvalido';
					if (i == 0)
						codigoDia += " primero";
					codigoDia += '"></span>';
				} else {
					var codigoDia = '<span';
					if ((contadorDias < diadeHoy && mes == mesActual && ano == anoActual) || (mes < mesActual && ano == anoActual) || (ano < anoActual)){
					if (i == 0)
						codigoDia += ' class="primero diaspasados"';
					if (i == 6)
						codigoDia += ' class="ultimo diaspasados"';
					if (i != 6 && i != 0)
						codigoDia += ' class="diaspasados"';
				} else if (mesActual == mes && anoActual == ano && diadeHoy == contadorDias){
					if (i == 0)
						codigoDia += ' class="primero diaactual"';
					if (i == 6)
						codigoDia += ' class="ultimo diaactual"';
					if (i != 6 && i != 0)
						codigoDia += ' class="diaactual"';
				} else {
					if (i == 0)
						codigoDia += ' class="primero"';
					if (i == 6)
						codigoDia += ' class="ultimo domingo"';
					}
					codigoDia += '>' + contadorDias + '</span>';
					contadorDias++;
				}
				var diaActual = $(codigoDia);
				capaDiasMes.append(diaActual);
			}

			//recorro todos los dem?s d?as hasta el final del mes
			var diaActualSemana = 1;

			marcado1 = $("#elemento1").val();
			marcadoSplit1 = marcado1.split("/");
			marcado1Dia = marcadoSplit1[0];
			marcado1Mes = marcadoSplit1[1]-1;
			marcado1Ano = marcadoSplit1[2];
			marcado1Date = new Date(marcado1Ano, marcado1Mes, marcado1Dia);

			marcado2 = $("#elemento2").val();
			marcadoSplit2 = marcado2.split("/");
			marcado2Dia = marcadoSplit2[0];
			marcado2Mes = marcadoSplit2[1]-1;
			marcado2Ano = marcadoSplit2[2];
			marcado2Date = new Date(marcado2Ano, marcado2Mes, marcado2Dia);

			while (contadorDias <= ultimoDiaMes){
				var diavigenteDate = new Date(ano, mes, contadorDias);
				var codigoDia = '<span';
					if ((contadorDias < diadeHoy && mes == mesActual && ano == anoActual) || (mes < mesActual && ano == anoActual) || (ano < anoActual)){
					if (diaActualSemana % 7 == 1)
						codigoDia += ' class="primero diaspasados"';
					if (diaActualSemana % 7 == 0)
						codigoDia += ' class="ultimo diaspasados"';
					if (diaActualSemana % 7 != 0 && diaActualSemana % 7 != 1)
						codigoDia += ' class="diaspasados"';
				} else if (mesActual == mes && anoActual == ano && diadeHoy == contadorDias){
					if (diaActualSemana % 7 == 1)
						codigoDia += ' class="primero diaactual"';
					if (diaActualSemana % 7 == 0)
						codigoDia += ' class="ultimo diaactual"';
					if (diaActualSemana % 7 != 0 && diaActualSemana % 7 != 1)
						codigoDia += ' class="diaactual"';
				} else if (diavigenteDate > marcado1Date && diavigenteDate <= marcado2Date){
					if (diaActualSemana % 7 == 1)
						codigoDia += ' class="primero diareservado"';
					if (diaActualSemana % 7 == 0)
						codigoDia += ' class="ultimo diareservado"';
					if (diaActualSemana % 7 != 0 && diaActualSemana % 7 != 1)
						codigoDia += ' class="diareservado"';
				} else if (marcado1Mes == mes && marcado1Ano == ano && marcado1Dia == contadorDias){
					if (diaActualSemana % 7 == 1)
						codigoDia += ' class="primero diapulsado"';
					if (diaActualSemana % 7 == 0)
						codigoDia += ' class="ultimo diapulsado"';
					if (diaActualSemana % 7 != 0 && diaActualSemana % 7 != 1)
						codigoDia += ' class="diapulsado"';
				} else {
				//si estamos a principio de la semana escribo la clase primero
				if (diaActualSemana % 7 == 1)
					codigoDia += ' class="primero"';
				//si estamos al final de la semana es domingo y ultimo dia
				if (diaActualSemana % 7 == 0)
					codigoDia += ' class="domingo ultimo"';
				//si es el dia actual
				if (diaActualSemana % 7 == 0)
					codigoDia += ' class="domingo ultimo"';
					}
				codigoDia += '>' + contadorDias + '</span>';
				contadorDias++;
				diaActualSemana++;
				var diaActual = $(codigoDia);
				capaDiasMes.append(diaActual);
			}

			//compruebo que celdas me faltan por escribir vacias de la ?ltima semana del mes
			diaActualSemana--;
			if (diaActualSemana%7!=0){
				//console.log("dia actual semana ", diaActualSemana, " -- %7=", diaActualSemana%7)
				for (var i=(diaActualSemana%7)+1; i<=7; i++){
					var codigoDia = '<span class="diainvalido';
					if (i==7)
						codigoDia += ' ultimo'
					codigoDia += '"></span>';
					var diaActual = $(codigoDia);
					capaDiasMes.append(diaActual);
				}
			}

			//crear el evento para cuando se pulsa un d?a de mes
			//console.log(capaDiasMes.children());
			capaDiasMes.children().click(function(e){
				var numDiaPulsado = $(this).text();
				if (numDiaPulsado != "" && ( (numDiaPulsado >= diadeHoy && mes == mesActual && ano == anoActual) || (mes > mesActual && ano == anoActual) || (ano > anoActual)  )){
					elem.val(numDiaPulsado + "/" + (mes+1) + "/" + ano);

                    //script para aumentar en un d?a la fecha de salida cuando se clicka el de llegada
                    //se a?ade 1 hora m?s (3600000 milisegundos) al d?a de a?adido para el elemento2 para compensar el desajuste del cambio de mes
			adjuntar = $('<script type="text/javascript">primerElemento = document.getElementById("elemento1").value; milisegundos=parseInt(24*60*60*1000); fechaprimerElemento = primerElemento.split("/"); 	diaelemento1 = fechaprimerElemento[0]; meselemento1 = fechaprimerElemento[1]-1; anoelemento1 = fechaprimerElemento[2]; 	fechaelemento1 = new Date(anoelemento1,meselemento1,diaelemento1); tiempo=fechaelemento1.getTime(); fechaelemento1.setTime(parseInt(tiempo+milisegundos+6000000)); dia=fechaelemento1.getDate(); mes=fechaelemento1.getMonth()+1; anio=fechaelemento1.getFullYear(); $("#elemento2").val(dia + "/" + mes + "/" + anio);</script>');
		$(document.body).append(adjuntar);

					calendario.fadeOut();
				}
			})
		}
		//funci?n para calcular el n?mero de un d?a de la semana
		function calculaNumeroDiaSemana(dia,mes,ano){
			var objFecha = new Date(ano, mes, dia);
			var numDia = objFecha.getDay();
			if (numDia == 0)
				numDia = 6;
			else
				numDia--;
			return numDia;
		}

		//funci?n para ver si una fecha es correcta
		function checkdate ( m, d, y ) {
			// funci?n por http://kevin.vanzonneveld.net
			// extraida de las librer?as phpjs.org manual en http://www.desarrolloweb.com/manuales/manual-librerias-phpjs.html
			return m > 0 && m < 13 && y > 0 && y < 32768 && d > 0 && d <= (new Date(y, m, 0)).getDate();
		}

		//funcion que devuelve el ?ltimo d?a de un mes y a?o dados
		function ultimoDia(mes,ano){
			var ultimo_dia=28;
			while (checkdate(mes+1,ultimo_dia + 1,ano)){
			   ultimo_dia++;
			}
			return ultimo_dia;
		}

		function validarFechaEscrita(fecha){
			var arrayFecha = fecha.split("/");
			if (arrayFecha.length!=3)
				return false;
			return checkdate(arrayFecha[1], arrayFecha[0], arrayFecha[2]);
		}
   });
   return this;
};
