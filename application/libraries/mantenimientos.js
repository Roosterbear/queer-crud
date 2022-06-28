
$("[calendario]").datepicker({
        startView: 0,
        format: "yyyy-mm-dd",
        language: "es",
        weekStart: 1,
        autoclose: true,
        orientation: "bottom auto",
        todayHighlight: true,
        keyboardNavigation: false
        //daysOfWeekDisabled: []
});

function to_uppercase(e) {
    e.value = e.value.toUpperCase();
}

function mensajeLobibox(tipo,mensaje){
      Lobibox.notify(tipo, {
            msg: mensaje,
            iconSource: "fontAwesome",
            size: 'mini',
            width: 400,
            rounded: true,
            delay: 5000,
            sound: false,
            position: 'top center',
            delayIndicator: false,
      });
/*
success (verde)
info    (azul)
error   (rojo)
warning (naranja)
default (black)
*/
}

// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

  function verificar(){
    if((equipos_active) && (altas_active)){
      activarAltaEquipos();
    }else if((equipos_active) && (!altas_active)){
      activarBccEquipos();
      desplegadoEquipos();
    }else if((!equipos_active) && (altas_active)){
      activarAltaMantenimientos();
    }else if((!equipos_active) && (!altas_active)){
      activarBccMantenimientos();
      desplegadoMttos();
    }
  }

  

    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    // @@@@@@@@@@@@@@@@@@@@@@@@@ DESPLEGADO EQUIPOS @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

    function desplegadoEquipos(){
      $.post(dire_mostrar_equipos).done(function(data){
        $('#area_dinamica_bcc_equipos').html(data);
      });
    }

    function desplegadoEquiposPorMarca(marca, area){
      $.post(dire_mostrar_equipos,{filtro:'marca',marca:marca, area:area}).done(function(data){
        $('#area_dinamica_bcc_equipos').html(data);
      });
    }

    function desplegadoEquiposPorArea(marca, area){
      $.post(dire_mostrar_equipos,{filtro:'area',marca:marca, area:area}).done(function(data){
        $('#area_dinamica_bcc_equipos').html(data);
      });
    }

    function desplegadoMttoPorArea(area, tecnico){
      $.post(dire_mostrar_mantenimientos,{filtro:'area',area:area, tecnico:tecnico}).done(function(data){
        $('#area_dinamica_bcc_mttos').html(data);
      });
    }

    function desplegadoMttoPorTecnico(area, tecnico){
      $.post(dire_mostrar_mantenimientos,{filtro:'tecnico',area:area, tecnico:tecnico}).done(function(data){
        $('#area_dinamica_bcc_mttos').html(data);
      });
    }
    

    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    // @@@@@@@@@@@@@@@@@@@@@@ DESPLEGADO MANTENIMIENTOS @@@@@@@@@@@@@@@@@@@@@@@@@@@@
    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

    function desplegadoMttos(){
      $.post(dire_mostrar_mantenimientos).done(function(data){
        $('#area_dinamica_bcc_mttos').html(data);
      });
    }


  // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
  function activarAltaEquipos(){
    document.querySelector("#equipos_altas_form").classList.remove('ocultar');
    document.querySelector("#mantenimientos_altas_form").classList.add('ocultar');
    document.querySelector("#equipos_bcc_form").classList.add('ocultar');
    document.querySelector("#mantenimientos_bcc_form").classList.add('ocultar');
  }

  function activarAltaMantenimientos(){
    document.querySelector("#equipos_altas_form").classList.add('ocultar');
    document.querySelector("#mantenimientos_altas_form").classList.remove('ocultar');
    document.querySelector("#equipos_bcc_form").classList.add('ocultar');
    document.querySelector("#mantenimientos_bcc_form").classList.add('ocultar');
  }

  function activarBccEquipos(){
    document.querySelector("#equipos_altas_form").classList.add('ocultar');
    document.querySelector("#mantenimientos_altas_form").classList.add('ocultar');
    document.querySelector("#equipos_bcc_form").classList.remove('ocultar');
    document.querySelector("#mantenimientos_bcc_form").classList.add('ocultar');
  }

  function activarBccMantenimientos(){
    document.querySelector("#equipos_altas_form").classList.add('ocultar');
    document.querySelector("#mantenimientos_altas_form").classList.add('ocultar');
    document.querySelector("#equipos_bcc_form").classList.add('ocultar');
    document.querySelector("#mantenimientos_bcc_form").classList.remove('ocultar');
  }



  // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
  function activar_boton_equipos(){
    equipos_active = true;
    document.querySelector("#boton_equipos").classList.add('fondo_verde');
    document.querySelector("#boton_mantenimientos").classList.remove('fondo_verde');
  }

  function activar_boton_mantenimientos(){
    equipos_active = false;
    document.querySelector("#boton_mantenimientos").classList.add('fondo_verde');
    document.querySelector("#boton_equipos").classList.remove('fondo_verde');
  }

  function activar_boton_altas(){
    altas_active = true;
    document.querySelector("#boton_altas").classList.add('fondo_verde');
    document.querySelector("#boton_bcc").classList.remove('fondo_verde');
  }

  function activar_boton_bcc(){
    altas_active = false;
    document.querySelector("#boton_bcc").classList.add('fondo_verde');
    document.querySelector("#boton_altas").classList.remove('fondo_verde');
  }
  // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

  function resetear_equipos(){
    $('#responsable').val('');
    $('#departamento_equipo').val(0);
    $('#marca').val(0);
    $('#modelo').val(0);
    $('#dispositivo').val(0);
    $('#sistema').val(0);
    $('#ram').val(0);
    $('#disco').val(0);
    $('#inventario').val('');
    $('#antivirus').val(0);
    $('#direccion_ip').val('');
    $('#observaciones_equipo').val("");
    $('#nomenclatura').val('');
  }

  function hideRestFooter(cual_area_dejar){
    var area = '#area_'+cual_area_dejar;
    $('#area_marcas').hide();
    $('#area_modelos').hide();
    $('#area_dispositivos').hide();
    $('#area_edificios').hide();
    $('#area_areas').hide();
    //TODO si se vuelve a oprimir, ocultar
    $(area).show();
  }
