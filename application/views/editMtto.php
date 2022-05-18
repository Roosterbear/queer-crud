

<h1 id="form_space" class="centrado">
  <strong>Edicion de Mantenimientos</strong>
  <br>
  <small>Universidad Tecnologica de Aguascalientes</small>
</h1>


<div id="area_mantenimientos" class="container">
    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    <div id="mantenimientos_edit_form">

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
        <input type="text" id="fecha_captura" name="fecha_captura" calendario value="<?php echo $mtto['fecha'] ?>" class="form-control" />
      </div>
    </div><!-- row1 Fecha-->
    <hr>


<!-- TODO show selects of ID, and change them like "ALTAS" -->



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
