$(document).ready(function(){
    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    // @@@@@@@@@@@@@@@@@@@@ FUNCIONES DE BOTONES SUPERIORES @@@@@@@@@@@@@@@@@@@@@@@@
    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

    // Botones principales EQUIPOS - MANTENIMIENTOS
    $("#boton_equipos").click(function(){
      activar_boton_equipos();
      verificar();
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
    });


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
        antivirus:antivirus, direccion_ip:direccion_ip, observaciones:observaciones},
        function(resp){
          if (!resp){
              mensajeLobibox('error',"Algo salio mal, pero no se que es...");
            }else{
              mensajeLobibox('info',"Equipo agregado satisfactoriamente");
              resetear_equipos();
              desplegadoEquipos();
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
      var tecnico = $('#tecnico').val();

      $.post(dire_agregar_mantenimientos,{fecha:fecha, id_area:id_area, id_equipo:id_equipo,
        formateo:formateo, temporales:temporales,
        defragmentacion:defragmentacion, limpieza_aplicaciones:limpieza_aplicaciones,
        cable_red_ok:cable_red_ok, limpieza_equipo:limpieza_equipo,
        acomodo_cables:acomodo_cables, limpieza_mouse:limpieza_mouse,
        platica_seguridad:platica_seguridad, limpieza_teclado:limpieza_teclado,
        observaciones:observaciones, tecnico:tecnico},
        function(resp){
          if (resp){
            mensajeLobibox('info',"Mantenimiento dado de alta");
            //TODO resetear campos
            $('#departamento_mtto').val(0).prop('selected');
            $('#equipo_mtto').val(0).prop('selected');
            $('#observaciones').val('');
            $('#tecnico').val(0).prop('selected');
            desplegadoMttos();
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
      var id_marca_filtro = $('#filtro_xmarca_equipo_bcc').val();
      desplegadoEquiposPorMarca(id_marca_filtro);
    });

    $('#filtro_xarea_equipo_bcc').change(function(){
      alert('Filtro por area equipo');
    });

    $('#filtro_xarea_mtto_bcc').change(function(){
      alert('Filtro por area mantenimiento');
    });

    $('#filtro_xtecnico_mtto_bcc').change(function(){
      alert('Filtro por tecnico mantenimiento');
    });

    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    // @@@@@@@@@@@@@@@@@@@@@@@@@@ BOTONES DE BAJAS @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    $(document).on('click','.borrar-equipo',function(){
      var id_label = this.id;
      var variables = id_label.split("-");
      var this_id = variables[2];
      var this_btn = variables[1];
      var this_action = variables[0];


      //TODO Checar primero si hay mantenimientos con ese equipo
      $.post(dire_hay_mantenimientos,{id:this_id}).done(function(data){
        $('#row-mtto-'+this_id).fadeOut();
        if(data > 0){
          mensajeLobibox('error','Este equipo tiene registrado al menos un mantenimiento');
        }else{
          $.post(dire_delete,{id:this_id, btn:this_btn}).done(function(data){
            $('#row-equipo-'+this_id).fadeOut();
          });
        }
      });
    });

    $(document).on('click','.borrar-mtto',function(){
      var id_label = this.id;
      var variables = id_label.split("-");
      var this_id = variables[2];
      var this_btn = variables[1];
      var this_action = variables[0];
      $.post(dire_delete,{id:this_id, btn:this_btn}).done(function(data){
        $('#row-mtto-'+this_id).fadeOut();
      });
    });

    $(document).on('click','#eliminar',function(){
      var id = this.id;
      var part = id.split("-");
      id = res[1];

      $.post(dire_eliminar,{id:id}).done(function(data){
        $('#row-mtto-'+id).fadeOut();
      });
    });
    //


    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    // @@@@@@@@@@@@@@@@@@@@@@@@@ BOTONES DE EDITAR  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    $(document).on('click','.editar-equipo',function(){
      var id_label = this.id;
      var variables = id_label.split("-");
      var this_id = variables[2];
      window.open('http://sito-misc.app.utags.edu.mx/mantenimientos/index.php/Mantenimientos/editarEquipo/'+this_id);            
    });

    
    $(document).on('click','.editar-mtto',function(){
      var id_label = this.id;
      var variables = id_label.split("-");
      var this_id = variables[2];
      window.open('http://sito-misc.app.utags.edu.mx/mantenimientos/index.php/Mantenimientos/editarMtto/'+this_id);
    });

    
    $('#btn_editar_equipo').click(function(){
      var id = $('#id_equipo_individual').html();
      var responsable = $('#responsable').val();
      var nomenclatura = $('#nomenclatura').val();
      var departamento = $('#departamento_equipo').val();
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
      
    
        $.post(dire_actualizar_equipos,{id:id,
                                        responsable:responsable,
                                        nomenclatura:nomenclatura,
                                        departamento:departamento,
                                        marca:marca,
                                        modelo:modelo,
                                        dispositivo:dispositivo,
                                        sistema:sistema,
                                        ram:ram,
                                        disco:disco,
                                        inventario:inventario,
                                        antivirus:antivirus,
                                        direccion_ip:direccion_ip,
                                        observaciones:observaciones
                                        }, function(data){
          $('#area_equipos').html('');
          $('.titulo_edicion_equipos').html('');
          $('.texto_cerrando_equipo').html('<h1>'+data+'</h1><small>Cerrando ventana... </small>');
                                                    
         
          setTimeout(()=>{
            window.close();
          },1500);
        }); //post
      }); //click

    $('#btn_cerrar_editar_equipo').click(function(){
        window.close();
    });
  


    $('#btn_editar_mantenimiento').click(function(){
      var id = $('#id_mtto_individual').html();
      var fecha = $('#fecha_captura').val();
      var tecnico = $('#tecnico').val();
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

      $.post(dire_actualizar_mantenimientos,{ id:id,
                                              fecha:fecha,
                                              tecnico:tecnico,
                                              formateo:formateo,
                                              temporales:temporales,
                                              defragmentacion:defragmentacion,
                                              limpieza_aplicaciones:limpieza_aplicaciones,
                                              cable_red_ok:cable_red_ok,
                                              limpieza_equipo:limpieza_equipo,
                                              acomodo_cables:acomodo_cables,
                                              limpieza_mouse:limpieza_mouse,
                                              platica_seguridad:platica_seguridad,
                                              limpieza_teclado:limpieza_teclado,
                                              observaciones:observaciones
                                            }, function(data){

                                              
            $('#area_mantenimientos').html('');
            $('.titulo_edicion_mttos').html('');
            $('.texto_cerrando_mtto').html('<h1>'+data+'</h1><small>Cerrando ventana... </small>');
            setTimeout(()=>{
              window.close();
            },1500);
          }); //post
      }); //click

    $('#btn_cerrar_editar_mantenimiento').click(function(){
      setTimeout(()=>{
        window.close();
        },25);
    });

  }); // Document Ready
