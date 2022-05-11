<div id="app"></div>
<!-- @@@@@@@@@@@@@@@@@@ Titulo @@@@@@@@@@@@@@@@@@@@@@ -->
<h1 id="form_space" class="centrado">
  <strong>Mantenimiento de equipos</strong>
  <br>
  <small>Universidad Tecnologica de Aguascalientes</small>
</h1>
<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->



<!-- @@@@@@@@@@@@ Menu Equipos / Mantenimientos @@@@@@@@@@-->

<!-- Equipos / Mantenimientos -->
<div class="container">
  <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
  <div class="row text-center up5">
    <div class="col-md-6">
      <h1 id="boton_equipos" class="mtto-boton"><i class="fa fa-desktop gris"></i> Equipos</h1>
    </div>
    <div class="col-md-6">
      <h1 id="boton_mantenimientos" class="fondo_verde mtto-boton"><i class="fa fa-wrench gris"></i> Mantenimientos</h1>
    </div>
  </div>

  <!-- Altas / Bajas - Cambios - Consultas -->
  <div class="row text-center">
    <div class="col-md-3">
      <h3 id="boton_altas" class="fondo_verde mtto-boton">
        <i class="fa fa-arrow-circle-up gris" aria-hidden="true"></i> Altas</h3>
    </div>
    <div class="col-md-9">
      <h3 id="boton_bcc" class="mtto-boton">
        <i class="fa fa-arrow-circle-down gris" aria-hidden="true"></i> Bajas /
        <i class="fa fa-exchange gris" aria-hidden="true"></i> Cambios /
        <i class="fa fa-list gris" aria-hidden="true"></i> Consultas</h3>
    </div>
  </div><!-- Center -->
  <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

  <!-- Esta linea le da un respiro al menu del contenido -->
  <br>
  <hr>
</div><!-- container -->
<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->


<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
<!-- @@@@@@@@@@@@@@@@@@@@ EQUIPOS @@@@@@@@@@@@@@@@@@@ -->
<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

<div id="area_equipos" class="container">

  <!-- @@@@@@@@@@@@@@@@@@@@@@ ALTAS Equipos @@@@@@@@@@@@@@@@@@@@@@ -->
  <div id="equipos_altas_form" class="ocultar" >

    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    <!-- row1 -->
    <div class="row">
      <!-- Responsable -->
      <div class="col-md-6">
        <h3>
          <i class="fa fa-male gris"></i> Responsable
        </h3>
          <input type="text" id="responsable" name="responsable" value="" class="form-control" />
      </div>

      <!-- Nomenclatura -->
      <div class="col-md-6">
        <h3>
          <i class="fa fa-list-alt gris"></i> Nomenclatura
        </h3>
          <input type="text" id="nomenclatura" name="nomenclatura" value="" class="form-control" onkeyup="to_uppercase(this);"/>
      </div>

      <!-- Departamento -->
      <div class="col-md-12">
        <h3>
          <i class="fa fa-suitcase gris"></i> Area / Departamento
        </h3>
        <select id="departamento_equipo" name="departamento_equipo" class="form-control">
          <option value="0">Seleccione el departamento</option>
          <?php foreach ($areas as $a){ ?>
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <!-- Tabla Areas                                           -->
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <option value="<?php echo $a['id_area'];?>"><?php echo $a['descripcion_area'];?></option>
        <?php } ?>
      </select>
      </div>
    </div><!-- row1 Responsable / Departamento-->
    <div class="up5"></div>
    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    <!-- row2 -->
    <div class="row">
      <!-- Marca -->
      <div class="col-md-4">
        <h3>
          <i class="fa fa-registered gris"></i> Marca
        </h3>
        <select id="marca" name="marca" class="form-control">
          <option value="0">Seleccione marca de equipo</option>
          <?php foreach ($marcas as $marca){ ?>
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <!-- Tabla Marcas                                          -->
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <option value="<?php echo $marca['id_marca'];?>"><?php echo $marca['descripcion_marca'];?></option>
          <?php } ?>
        </select>
      </div>

      <!-- Modelo -->
      <div class="col-md-4">
        <h3>
          <i class="fa fa-tag gris"></i> Modelo
        </h3>
        <select id="modelo" name="modelo" class="form-control">
          <option value="0">Seleccione modelo de equipo</option>
          <?php foreach ($modelos as $modelo){ ?>
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <!-- Tabla Modelos                                         -->
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <option value="<?php echo $modelo['id_modelo'];?>"><?php echo $modelo['descripcion_modelo'];?></option>
          <?php } ?>
        </select>
      </div>

      <!-- Dispositivo -->
      <div class="col-md-4">
        <h3>
          <i class="fa fa-power-off gris"></i> Dispositivo
        </h3>
        <select id="dispositivo" name="dispositivo" class="form-control">
          <option value="0">Seleccione dispositivo</option>
          <?php foreach ($dispositivos as $d){ ?>
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <!-- Tabla Dispositivos                                    -->
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <option value="<?php echo $d['id_dispositivo'];?>"><?php echo $d['descripcion_dispositivo'];?></option>
        <?php } ?>
        </select>
      </div>
    </div><!-- row2 Marca, Modelo y Dispositivo-->

    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    <!-- row3 -->
    <div class="row">
      <!-- Sistema Operativo -->
      <div class="col-md-4">
        <h3>
          <i class="fa fa-windows gris"></i> Sistema Operativo
        </h3>
        <select id="sistema" name="sistema" class="form-control">
          <option value="0">Seleccione Sistema Operativo</option>
          <?php foreach ($sistema as $s){ ?>
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <!-- Array Sistema                                         -->
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <option value="<?php echo $s;?>"><?php echo $s;?></option>
          <?php } ?>
        </select>
      </div>

      <!-- Memoria RAM -->
      <div class="col-md-4">
        <h3>
          <i class="fa fa-exchange gris"></i> RAM
        </h3>
        <select id="ram" name="ram" class="form-control">
          <option value="0">Seleccione cantidad de memoria RAM</option>
          <?php foreach($ram as $r){ ?>
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <!-- Array Ram                                             -->
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <option value="<?php echo $r;?>"><?php echo $r;?></option>
        <?php } ?>
        </select>
      </div>

      <!-- Disco Duro -->
      <div class="col-md-4">
        <h3>
          <i class="fa fa-spinner gris"></i> Disco Duro
        </h3>
        <select id="disco" name="disco" class="form-control">
          <option value="0">Seleccione capacidad de Disco Duro</option>
          <?php foreach($disco as $d){ ?>
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <!-- Array Disco                                           -->
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <option value="<?php echo $d;?>"><?php echo $d;?></option>
          <?php } ?>
        </select>
      </div>
    </div><!-- row3 SO, RAM y DD-->
    <div class="up5"></div>
    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    <!-- row4 -->
    <div class="row">
      <!-- Numero de inventario -->
      <div class="col-md-12">
        <h3>
          <i class="fa fa-check-circle gris"></i> No. de Inventario
        </h3>
          <input type="text" id="inventario" name="inventario" value="" class="form-control" />
      </div>
    </div><!-- row4 Numero de Inventario-->

    <!-- row5 -->
    <div class="row">
      <!-- Antivirus -->
      <div class="col-md-6">
        <h3><i class="fa fa-life-ring gris"></i> Antivirus / Firewall</h3>
        <select id="antivirus" name="antivirus" class="form-control">
          <option value="0">Seleccione Antivirus</option>
          <?php foreach ($antivirus as $a){ ?>
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <!-- Array Antivirus                                       -->
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <option value="<?php echo $a;?>"><?php echo $a;?></option>
        <?php } ?>
        </select>
      </div>
      <!-- Direccion IP -->
      <div class="col-md-6">
        <h3><i class="fa fa-terminal gris"></i> Direccion IP</h3>
        <input type="text" class="form-control" id="direccion_ip">
      </div>
    </div><!-- row5 Antivirus / Direccion IP-->
    <br>
    <hr>
    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    <!-- row6 -->
    <div class="row">
      <!-- Observaciones -->
      <div class="col-md-12">
        <h3>
          <i class="fa fa-commenting gris"></i> Observaciones
          <textarea class="form-control" id="observaciones_equipo" rows="3"></textarea>
        </h3>
      </div>
    </div><!-- row6 Observaciones equipo-->
    <hr>
    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    <!-- row7 -->
    <div class="row up5">
      <!-- Boton Altas Equipos -->
      <div class="col-md-4"></div>
      <div class="col-md-4 text-center">
        <button id="btn_alta_equipo" class="mtto-boton fondo_verde mtto-boton-enviar">Enviar</button>
      </div>
      <div class="col-md-4"></div>
    </div><!-- row7 Boton Alta Equipos -->
  </div><!-- Alta de Equipos -->


  <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
  <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
  <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
  <!-- +++++++++ BCC Equipos Bajas - Cambios - Consultas +++++++++ -->
  <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
  <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
  <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
  <div id="equipos_bcc_form" class="ocultar">

    <!-- Filtro por marca -->
    <h3>
      <i class="fa fa-registered gris"></i> Filtrar por Marca
    </h3>
    <select class="form-control" name="filtro_xmarca_equipo_bcc" id="filtro_xmarca_equipo_bcc">
      <option value="0">Selecciona una marca</option>
      <?php foreach($marcas as $m){ ?>
          <option value="<?php echo $m['id_marca'];?>"><?php echo $m['descripcion_marca'];?></option>
      <?php } ?>
    </select>
    <br />

    <!-- Filtro por area -->
    <h3>
      <i class="fa fa-suitcase gris"></i> Filtrar por Area / Departamento
    </h3>
    <select class="form-control" name="filtro_xarea_equipo_bcc" id="filtro_xarea_equipo_bcc">
      <option value="0">Selecciona area</option>
      <?php foreach($areas as $a){ ?>
        <option value="<?php echo $a['id_area'];?>"><?php echo $a['descripcion_area'];?></option>
      <?php } ?>
    </select>
    <br />

    <br />
    <table class="table table-stripped table-condensed table-bordered table-hover ">
      <tbody>
        <tr>
          <!-- // equipo - inventario - responsable - area - nomenclatura -->
          <th class="text-center">No.</th>
          <th class="text-center">Equipo</th>
          <th class="text-center">Inventario</th>
          <th class="text-center">Persona</th>
          <th class="text-center">Area</th>
          <th class="text-center">Nomenclatura</th>
          <!-- Botones -->
          <th class="text-center">Editar</th>
          <th class="text-center">Eliminar</th>
        </tr>

        <?php $cuenta_equipos = 1; ?>
        <?php foreach($equipos as $e){ ?>
          <?php echo '<tr id="row-equipo-'.$e['id_equipo'].'">'; ?>
          <?php echo '<td>'.$cuenta_equipos.'</td>'; ?>
          <td><?php echo $e['equipo'];?></td>
          <td><?php echo $e['inventario'];?></td>
          <td><?php echo $e['responsable'];?></td>
          <td><?php echo $e['area'];?></td>
          <td><?php echo $e['nomenclatura'];?></td>
          <!-- Botones -->

          <!-- TODO ponerle IDs a los botones para la accion -->
          <?php echo '<td id="editar-equipo-'.$e['id_equipo'].'" class="text-center editar-equipo"><i class="fa fa-pencil fa-2x verde"/></i></td>'; ?>
          <?php echo '<td id="borrar-equipo-'.$e['id_equipo'].'" class="text-center borrar-equipo"><i class="fa fa-times fa-2x rojo"/></i></td>'; ?>
          <?php echo '</tr>'; ?>
          <?php $cuenta_equipos++ ?>
        <?php } ?>
      </tbody>
    </table>

</div><!-- Equipos bcc -->

</div><!-- Terminacion area equipos -->


<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
<!-- @@@@@@@@@@@@@@@@ MANTENIMIENTOS @@@@@@@@@@@@@@@@ -->
<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
<div id="area_mantenimientos" class="container">
    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    <div id="mantenimientos_altas_form">

    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    <!--        Fecha en la que se hizo el mantenimiento       -->
    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    <!-- row1 -->
    <div class="row">
      <div class="col-md-8">
          <!-- Vacio -->
      </div>
      <div class="col-md-4">
        <h3><i class="fa fa-calendar gris"></i> Fecha de Mantenimiento: </h3>
        <input type="text" id="fecha_captura" name="fecha_captura" calendario value="<?php echo $fecha_hoy;?>" class="form-control" />
      </div>
    </div><!-- row1 Fecha-->
    <hr>

    <div class="row">
      <!-- Departamento -->
      <div class="col-md-12">
        <h3>
          <i class="fa fa-suitcase gris"></i> Area / Departamento
        </h3>
        <select id="departamento_mtto" name="departamento_mtto" class="form-control">
          <option value="0">Seleccione el departamento</option>
          <?php foreach ($areas as $a){ ?>
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <!-- Tabla Areas                                           -->
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <option value="<?php echo $a['id_area'];?>"><?php echo $a['descripcion_area'];?></option>
        <?php } ?>
      </select>
      </div>

      <!-- Equipo -->
      <div class="col-md-12" id="equipos_mtto_dc">

        <!-- Contenido dinamico -->

      </div>
    </div>

    <br>
    <div class="up5"></div>
    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    <!--                   Detalles del Mantenimiento                        -->
    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

    <!-- row3 -->
    <div class="row">
        <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

        <!-- Formateo -->
        <div class="col-md-6">
      		<label class="switch">
          	<input type="checkbox" id="formateo" class="mtto-check">
      			<span class="slider round"></span>
      		</label>
          <span class="labelSwitch"> Formateo de equipo</span>
        </div>

        <!-- Temporales -->
        <div class="col-md-6">
          <label class="switch">
            <input type="checkbox" id="temporales" class="mtto-check" checked="checked">
            <span class="slider round"></span>
          </label>
          <span class="labelSwitch"> Limpieza de temporales</span>
        </div>

        <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

        <!-- Defragmentacion -->
        <div class="col-md-6">
          <label class="switch">
            <input type="checkbox" id="defragmentacion" class="mtto-check">
            <span class="slider round"></span>
          </label>
          <span class="labelSwitch"> Defragmentacion</span>
        </div>

        <!-- Limpieza de Aplicaciones -->
        <div class="col-md-6">
          <label class="switch">
            <input type="checkbox" id="limpieza_aplicaciones" class="mtto-check" checked="checked">
            <span class="slider round"></span>
          </label>
          <span class="labelSwitch"> Limpieza de aplicacion</span>
        </div>

        <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

        <!-- Verificacion de cable de red -->
        <div class="col-md-6">
          <label class="switch">
            <input type="checkbox" id="cable_red_ok" class="mtto-check">
            <span class="slider round"></span>
          </label>
          <span class="labelSwitch"> Verificacion de cable de red</span>
        </div>

        <!-- Limpieza de Equipo -->
        <div class="col-md-6">
          <label class="switch">
            <input type="checkbox" id="limpieza_equipo" class="mtto-check" checked="checked">
            <span class="slider round"></span>
          </label>
          <span class="labelSwitch"> Limpieza de equipo</span>
        </div>

        <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

        <!-- Acomodo de cables -->
        <div class="col-md-6">
          <label class="switch">
            <input type="checkbox" id="acomodo_cables" class="mtto-check">
            <span class="slider round"></span>
          </label>
          <span class="labelSwitch"> Acomodo de cables</span>
        </div>

        <!-- Limpieza de mouse -->
        <div class="col-md-6">
          <label class="switch">
            <input type="checkbox" id="limpieza_mouse" class="mtto-check" checked="checked">
            <span class="slider round"></span>
          </label>
          <span class="labelSwitch"> Limpieza de mouse</span>
        </div>

        <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

        <!-- Platica de seguridad -->
        <div class="col-md-6">
          <label class="switch">
            <input type="checkbox" id="platica_seguridad" class="mtto-check">
            <span class="slider round"></span>
          </label>
          <span class="labelSwitch"> Platica de seguridad</span>
        </div>

        <!-- Limpieza de teclado -->
        <div class="col-md-6">
          <label class="switch">
            <input type="checkbox" id="limpieza_teclado" class="mtto-check" checked="checked">
            <span class="slider round"></span>
          </label>
          <span class="labelSwitch"> Limpieza de teclado</span>
        </div>

        <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    </div><!-- row3 Detalles-->



    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    <!--            Observaciones                -->
    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

    <!-- row5 -->
    <div class="row">
      <div class="col-md-12">
        <div class="up5">
          <h3><i class="fa fa-commenting gris"></i> Observaciones </h3>
            <textarea class="form-control" id="observaciones" rows="3"></textarea>
        </div>
      </div>
    </div><!-- row5 Observaciones-->
    <br>

    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    <!--            Elaborado por                -->
    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

    <!-- row6 -->
    <div class="row">
      <div class="col-md-8">
      <!-- Vacio   -->
      </div>
      <div class="col-md-4">
        <h3>
          <i class="fa fa-wrench gris"></i> Personal que lo elaboro:
        </h3>
        <select id="elaboro" name="elaboro" class="form-control">
          <option value="0">Seleccione el personal</option>
          <?php foreach($personal as $p){ ?>
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <!-- Array personal                                        -->
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <option value="<?php echo $p;?>"><?php echo $p;?></option>
          <?php } ?>
        </select>
      </div>
    </div><!-- row6 Elaborado por-->

    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    <!--                Boton Mantenimiento                    -->
    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

    <!-- row7 -->
    <div class="row up5">
      <div class="col-md-4"></div>
      <div class="col-md-4 text-center">
        <button id="btn_alta_mantenimiento" class="mtto-boton fondo_verde mtto-boton-enviar">Enviar</button>
      </div>
      <div class="col-md-4"></div>
    </div><!-- row7 Boton Alta Mantenimientos -->
  </div>
  <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->


  <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
  <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
  <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
  <!-- +++++ BCC Mantenimientos Bajas - Cambios - Consultas ++++++ -->
  <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
  <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
  <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
  <div id="mantenimientos_bcc_form" class="ocultar">

    <!-- Filtro por area -->
    <h3>
      <i class="fa fa-suitcase gris"></i> Filtrar por Area / Departamento
    </h3>
    <select class="form-control" name="filtro_xarea_mtto_bcc" id="filtro_xarea_mtto_bcc">
      <option value="0">Selecciona area</option>
      <?php foreach($areas as $a){ ?>
        <option value="<?php echo $a['id_area'];?>"><?php echo $a['descripcion_area'];?></option>
      <?php } ?>
    </select>
    <br />

    <!-- Filtro por tecnico -->
    <h3>
      <i class="fa fa-wrench gris"></i> Filtrar por Personal que lo elaboro:
    </h3>
    <select class="form-control" name="filtro_xtecnico_mtto_bcc" id="filtro_xtecnico_mtto_bcc">
      <option value="0">Selecciona tecnico</option>
      <?php $contador = 1;?>
      <?php foreach($personal as $p){ ?>
        <option value="<?php echo $contador;?>"><?php echo $p;?></option>
      <?php $contador++;} ?>
    </select>
    <br />
    <br />

    <div id="tabla_bcc_mantenimientos">
      <table class="table table-stripped table-condensed table-bordered table-hover ">
        <tbody>
          <tr>
  		      <!-- id_mantenimiento - fecha - area - equipo - tecnico -->
            <th class="text-center">No.</th>
            <th class="text-center">Fecha</th>
            <th class="text-center">Equipo</th>
            <th class="text-center">Responsable</th>
            <th class="text-center">Area</th>
            <th class="text-center">Tecnico</th>
            <!-- Botones -->
            <th class="text-center">Editar</th>
            <th class="text-center">Eliminar</th>
          </tr>

          <?php $cuenta_mantenimientos = 1; ?>
          <?php foreach($mantenimientos as $m){ ?>
            <?php echo '<tr id="row-mtto-'.$m['id_mantenimiento'].'">'; ?>
            <?php echo '<td>'.$cuenta_mantenimientos.'</td>'; ?>
            <td><?php echo $m['fecha'];?></td>
            <td><?php echo $m['equipo'];?></td>
            <td><?php echo $m['responsable'];?></td>
            <td><?php echo $m['area'];?></td>
            <td><?php echo $m['tecnico'];?></td>
            <!-- Botones -->
            <?php echo '<td id="editar-mtto-'.$m['id_mantenimiento'].'" class="text-center editar-mtto"><i class="fa fa-pencil fa-2x verde"/></i></td>'; ?>
            <?php echo '<td id="borrar-mtto-'.$m['id_mantenimiento'].'" class="text-center borrar-mtto"><i class="fa fa-times fa-2x rojo"/></i></td>'; ?>
            <?php echo '</tr>'; ?>
            <?php $cuenta_mantenimientos++ ?>
          <?php } ?>
        </tbody>
      </table>
    </div>

  </div>

</div><!-- Terminacion area mantenimientos -->

<footer class="container up5">

  <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
  <!-- Esta linea le da un respiro al pie de pagina del contenido -->
  <hr>
  <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

  <div class="botones_footer">
    <span id="boton_marcas" class="text-footer btn-footer">
      Marcas
    </span>

    <span id="boton_modelos" class="text-footer btn-footer">
      Modelos
    </span>

    <span id="boton_dispositivos" class="text-footer btn-footer">
      Dispositivos
    </span>

    <span id="boton_edificios" class="text-footer btn-footer">
      Edificios
    </span>

    <span id="boton_areas" class="text-footer btn-footer">
      Areas
    </span>
  </div>

  <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

  <div id="area_marcas" class="ocultar">
    <h3>Agregar marca</h3>
    <div class="input-group">
      <input type="text" id="input_agregar_marca" name="input_agregar_marca" value="" class="form-control" />
      <span class="input-group-btn">
        <button type="button" campo class="btn btn-md btn-success form-element" id="btn_agregar_marca" title="Agregar marca">
        <i class="fa fa-floppy-o"></i></button>
      </span>
    </div>
  </div>

  <div id="area_modelos" class="ocultar">
    <h3>Agregar modelo</h3>
    <select id="select_agregar_marca" name="select_agregar_marca" class="form-control">
      <option value="0">Elige la marca</option>
      <?php foreach ($marcas as $m) { ?>
      <option value="<?php echo $m['id_marca'];?>"><?php echo $m['descripcion_marca'];?></option>
      <?php } ?>
    </select>
    <br />
    <div class="input-group">
      <input type="text" id="input_agregar_modelo" name="input_agregar_modelo" value="" class="form-control" />
      <span class="input-group-btn">
        <button type="button" campo class="btn btn-md btn-success form-element" id="btn_agregar_modelo" title="Agregar modelo">
        <i class="fa fa-floppy-o"></i></button>
      </span>
    </div>
  </div>

  <div id="area_dispositivos" class="ocultar">
    <h3>Agregar dispositivo</h3>
    <div class="input-group">
      <input type="text" id="input_agregar_dispositivo" name="input_agregar_dispositivo" value="" class="form-control" />
      <span class="input-group-btn">
        <button type="button" campo class="btn btn-md btn-success form-element" id="btn_agregar_dispositivo" title="Agregar dispositivo">
        <i class="fa fa-floppy-o"></i></button>
      </span>
    </div>
  </div>

  <div id="area_edificios" class="ocultar">
    <h3>Agregar edificio</h3>
    <div class="input-group">
      <input type="text" id="input_agregar_edificio" name="input_agregar_edificio" value="" class="form-control" />
      <span class="input-group-btn">
        <button type="button" campo class="btn btn-md btn-success form-element" id="btn_agregar_edificio" title="Agregar edificio">
        <i class="fa fa-floppy-o"></i></button>
      </span>
    </div>
  </div>

  <div id="area_areas" class="ocultar">
    <h3>Agregar area</h3>
    <select id="select_agregar_edificio" name="select_agregar_edificio" class="form-control">
      <option value="0">Elige edificio</option>
      <?php foreach ($edificios as $e) { ?>
      <option value="<?php echo $e['id_edificio'];?>"><?php echo $e['descripcion_edificio'];?></option>
      <?php } ?>
    </select>
    <br />
    <input type="text" id="input_nomenclatura" name="input_nomenclatura" value="" class="form-control" placeholder="Nomenclatura Ej. A1">
    <br />
    <div class="input-group">
      <input type="text" id="input_agregar_area" name="input_agregar_area" value="" class="form-control" placeholder="Nombre de Area"/>
      <span class="input-group-btn">
        <button type="button" campo class="btn btn-md btn-success form-element" id="btn_agregar_area" title="Agregar area">
        <i class="fa fa-floppy-o"></i></button>
      </span>
    </div>
  </div>

  <div class="up5"></div>
</footer>


<script type="text/javascript">

// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@ INICIALIZACION DE VARIABLES Y ESTADOS @@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
var dire_agregar_marca = "<?=base_url()?>"+"index.php/Mantenimientos/altaMarcas/";
var dire_agregar_modelo = "<?=base_url()?>"+"index.php/Mantenimientos/altaModelos/";
var dire_agregar_dispositivo = "<?=base_url()?>"+"index.php/Mantenimientos/altaDispositivos/";
var dire_agregar_edificio = "<?=base_url()?>"+"index.php/Mantenimientos/altaEdificios/";
var dire_agregar_area = "<?=base_url()?>"+"index.php/Mantenimientos/altaAreas/";
var dire_agregar_equipos = "<?=base_url()?>"+"index.php/Mantenimientos/altaEquipos/";
var dire_agregar_mantenimientos = "<?=base_url()?>"+"index.php/Mantenimientos/altaMantenimientos/";
var dire_delete = "<?=base_url()?>"+"index.php/Mantenimientos/delete/";
var dire_hay_mantenimientos = "<?=base_url()?>"+"index.php/Mantenimientos/hayMantenimientos/";
var dire_descripcion_equipos = "<?=base_url()?>"+"index.php/Mantenimientos/getDescripcionEquipos/";


var altas_active = true;
var equipos_active =  false;

var contenido = '';
</script>
