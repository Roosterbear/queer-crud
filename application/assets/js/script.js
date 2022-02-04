$(document).ready(function(){

// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@@@ FUNCIONES DE BOTONES SUPERIORES @@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

  // Botones principales EQUIPOS - MANTENIMIENTOS
  $("#boton_equipos").click(function(){
    activar_boton_equipos();
    verificar()
  });

  $("#boton_mantenimientos").click(function(){
    activar_boton_mantenimientos();
    verificar();
  });

  // Botones Altas - Bajas / Cambios / Consultas
  $("#boton_altas").click(function(){
    activar_boton_altas();
    verificar();
  });

  $("#boton_bcc").click(function(){
    activar_boton_bcc();
    verificar();
    //mensajeLobibox('error','Aun no esta listo');
  });

  // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
  function verificar(){
    if((equipos_active) && (altas_active)){
      activarAltaEquipos();
    }else if((equipos_active) && (!altas_active)){
      activarBccEquipos();
    }else if((!equipos_active) && (altas_active)){
      activarAltaMantenimientos();
    }else if((!equipos_active) && (!altas_active)){
      activarBccMantenimientos();
    }
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




  // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
  // @@@@@@@@@@@@@@@@@@@@@@@@@@ BOTONES DE ALTAS @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
  // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

  $('#btn_alta_equipo').click(function(){
    var responsable = $('#responsable').val();
    var departamento_equipo = $('#departamento_equipo').val();
    var marca = $('#marca').val();
    var modelo = $('#modelo').val();
    var dispositivo = $('#dispositivo').val();
    var sistema = $('#sistema').val();
    var ram = $('#ram').val();
    var disco = $('#disco').val();
    var inventario = $('#inventario').val();
    var antivirus = $('#antivirus').val();
    var direccion_ip = $('#direccion_ip').val();
    var observaciones = $('#observaciones_equipo').val();
    var nomenclatura = $('#nomenclatura').val();

    $.post(dire_agregar_equipos,{responsable:responsable, departamento:departamento_equipo,
                                marca:marca, modelo:modelo, dispositivo:dispositivo,
                                sistema:sistema, ram:ram, disco:disco, inventario:inventario, nomenclatura:nomenclatura,
                                antivirus:antivirus, direccion_ip:direccion_ip, observaciones:observaciones},function(resp){
      if (!resp){
        mensajeLobibox('error',"Algo salio mal, pero no se que es...");
      }else{
        mensajeLobibox('info',"Equipo agregado satisfactoriamente");
        resetear_equipos();
      }
    });
  });

  // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

  $('#btn_alta_mantenimiento').click(function(){
    var fecha = $('#fecha_captura').val();
    var id_area = $('#departamento_mtto').val();
    var id_equipo = $('#equipo_mtto').val();
    var formateo = $('#formateo').prop('checked')?1:0;
    var temporales = $('#temporales').prop('checked')?1:0;
    var defragmentacion = $('#defragmentacion').prop('checked')?1:0;
    var limpieza_aplicaciones = $('#limpieza_aplicaciones').prop('checked')?1:0;
    var cable_red_ok = $('#cable_red_ok').prop('checked')?1:0;
    var limpieza_equipo = $('#limpieza_equipo').prop('checked')?1:0;
    var acomodo_cables = $('#acomodo_cables').prop('checked')?1:0;
    var limpieza_mouse = $('#limpieza_mouse').prop('checked')?1:0;
    var platica_seguridad = $('#platica_seguridad').prop('checked')?1:0;
    var limpieza_teclado = $('#limpieza_teclado').prop('checked')?1:0;
    var observaciones = $('#observaciones').val();
    var elaboro = $('#elaboro').val();

    $.post(dire_agregar_mantenimientos,{fecha:fecha, id_area:id_area, id_equipo:id_equipo,
                                        formateo:formateo, temporales:temporales,
                                        defragmentacion:defragmentacion, limpieza_aplicaciones:limpieza_aplicaciones,
                                        cable_red_ok:cable_red_ok, limpieza_equipo:limpieza_equipo,
                                        acomodo_cables:acomodo_cables, limpieza_mouse:limpieza_mouse,
                                        platica_seguridad:platica_seguridad, limpieza_teclado:limpieza_teclado,
                                        observaciones:observaciones, elaboro:elaboro
                                        },function(resp){
      if (resp){
        mensajeLobibox('info',"Mantenimiento dado de alta");
        //TODO resetear campos
        $('#departamento_mtto').val(0).prop('selected');
        $('#equipo_mtto').val(0).prop('selected');

        $('#observaciones').val('');
        $('#elaboro').val(0).prop('selected');

      }else{
        mensajeLobibox('error',"Algo salio mal, pero no se que es...");
      }
    });
  });


  $('#departamento_mtto').change(function(){
    var id = $('#departamento_mtto').val();
    var contenido = '';

    $.post(dire_descripcion_equipos,{id:id},function(resp){
        contenido = resp;
        $('#equipos_mtto_dc').html(contenido);
    });

  });



  // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  // +++++++++++++++++++++++++ FILTROS BCC +++++++++++++++++++++++++++++++++++++++
  // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  $('#filtro_xmarca_equipo_bcc').change(function(){
    alert('Filtro por marca equipo');
  });

  $('#filtro_xarea_equipo_bcc').change(function(){
    alert('Filtro por area equipo');
  });

  $('#filtro_xarea_mtto_bcc').change(function(){
    alert('Filtro por area mtto');
  });

  $('#filtro_xtecnico_mtto_bcc').change(function(){
    alert('Filtro por tecnico mtto');
  });

  // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
  // @@@@@@@@@@@@@@@@@@@@@@@@@@ BOTONES DE BAJAS @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
  // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
  $('.borrar-equipo').click(function(){
    var id_label = this.id;
    var variables = id_label.split("-");
    var this_id = variables[2];
    var this_btn = variables[1];
    var this_action = variables[0];
    var borrar = false;

    //TODO Checar primero si hay mantenimientos con ese equipo
    $.post(dire_hay_mantenimientos,{id:this_id}).done(function(data){
      alert(data);
    });

    }

    /*
    $.post(dire_delete,{id:this_id, btn:this_btn}).done(function(data){
      $('#row-equipo-'+this_id).fadeOut();
    });
    */

  });

  $('.borrar-mtto').click(function(){
    var id_label = this.id;
    var variables = id_label.split("-");
    var this_id = variables[2];
    var this_btn = variables[1];
    var this_action = variables[0];
    $.post(dire_delete,{id:this_id, btn:this_btn}).done(function(data){
      $('#row-mtto-'+this_id).fadeOut();
    });
  });


//Ejm
  $('#eliminar').click(function(){
    var id = this.id;
    var part = id.split("-");
    id = res[1];

    $.post(dire_eliminar,{id:id}).done(function(data){
      $('#row-mtto-'+id).fadeOut();
    });
  });
//


  // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
  // @@@@@@@@@@@@@@@@@@@@@@@@@ BOTONES DE CAMBIOS @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
  // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
  $('.editar-equipo').click(function(){
    var id_label = this.id;
    var variables = id_label.split("-");
    var this_id = variables[2];
    var this_btn = variables[1];
    var this_action = variables[0];
    alert("se va a "+this_action+" el elemento "+this_id+" de "+this_btn);
  });

  $('.editar-mtto').click(function(){
    var id_label = this.id;
    var variables = id_label.split("-");
    var this_id = variables[2];
    var this_btn = variables[1];
    var this_action = variables[0];
    alert("se va a "+this_action+" el elemento "+this_id+" de "+this_btn);
  });





  // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
  // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ FOOTER @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
  // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@


  // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
  // Marcas footer
  $('#boton_marcas').click(function(){
    hideRestFooter('marcas');
  });

  $('#btn_agregar_marca').click(function(){
    var descripcion = $('#input_agregar_marca').val();

    $.post(dire_agregar_marca,{descripcion:descripcion},function(resp){
  		if(resp){
        mensajeLobibox('success','Marca '+ descripcion +' agregada satisfactoriamente');
      }else{
        mensajeLobibox('error','Algo salio mal');
      }
  	});

  });

  // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
  // Modelos footer
  $('#boton_modelos').click(function(){
    hideRestFooter('modelos');
  });

  $('#btn_agregar_modelo').click(function(){
    var descripcion = $('#input_agregar_modelo').val();
    var marca = $('#select_agregar_marca').val();

    $.post(dire_agregar_modelo,{descripcion:descripcion,marca:marca},function(resp){
  		if(resp){
        mensajeLobibox('success','Modelo '+descripcion+' agregado satisfactoriamente');
      }else{
        mensajeLobibox('error','Algo salio mal');
      }
  	});
  });

  // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
  // Dispositivos footer
  $('#boton_dispositivos').click(function(){
    hideRestFooter('dispositivos');
  });

  $('#btn_agregar_dispositivo').click(function(){
    var descripcion = $('#input_agregar_dispositivo').val();

    $.post(dire_agregar_dispositivo,{descripcion:descripcion},function(resp){
  		if(resp){
        mensajeLobibox('success','Dispositivo '+ descripcion +' agregado satisfactoriamente');
      }else{
        mensajeLobibox('error','Algo salio mal');
      }
  	});
  });

  // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
  // Edificios footer
  $('#boton_edificios').click(function(){
    hideRestFooter('edificios');
  });

  $('#btn_agregar_edificio').click(function(){
    var descripcion = $('#input_agregar_edificio').val();

    $.post(dire_agregar_edificio,{descripcion:descripcion},function(resp){
  		if(resp){
        mensajeLobibox('success','Edificio '+ descripcion +' agregado satisfactoriamente');
      }else{
        mensajeLobibox('error','Algo salio mal');
      }
  	});
  });

  // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
  // Areas footer
  $('#boton_areas').click(function(){
    hideRestFooter('areas');
  });

  $('#btn_agregar_area').click(function(){
    var descripcion = $('#input_agregar_area').val();
    var edificio = $('#select_agregar_edificio').val();
    var nomenclatura = $('#input_nomenclatura').val();

    $.post(dire_agregar_area,{descripcion:descripcion,edificio:edificio, nomenclatura:nomenclatura},function(resp){
  		if(resp){

        // TODO no manda este mensaje ---------------------------------------------
        mensajeLobibox('success','Area '+descripcion+' agregada satisfactoriamente');
      }else{
        mensajeLobibox('error','Algo salio mal');
      }
  	});
  });

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

});

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
