      //	var alertaroja = 1;
      var fechaActual = new Date();
      //mes y año actuales
      var diadeHoy = fechaActual.getDate();
      var mesActual = fechaActual.getMonth();
      var anoActual = fechaActual.getFullYear();
      var fechaActual = new Date(anoActual, mesActual, diadeHoy);
      $(document).ready(function() {
         $(".campofecha").calendarioDW();
         $(".campofecha2").calendarioDW2();
      })
