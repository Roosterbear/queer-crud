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
