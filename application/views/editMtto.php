<h1 class="texto_cerrando_mtto"></h1>

<h1 id="form_space" class="centrado titulo_edicion_mttos">
  <strong>Edicion de Mantenimientos <small id="id_mtto_individual" class="gris"><?php echo $id ?></small></strong>
  <br>
  <small>Universidad Tecnologica de Aguascalientes</small>
</h1>

<div id="area_mantenimientos" class="container">

<!-- @@@@@@@@@@@@@@@@@@ EDICION Mantenimientos @@@@@@@@@@@@@@@@@@@@@@ -->
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

    <h1 class="gris"><strong>Area:</strong> <?php echo $mtto['area'];?></h1>
    <h1 class="gris"><strong>Equipo:</strong> <?php echo $mtto['equipo'];?> <small><?php echo $mtto['sistema'];?></small></h1>
    <h1 class="gris"><strong>Responsable:</strong> <?php echo $mtto['responsable'];?></h1>
    

    
    <br>
    <div class="up5"></div>
    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    <!--                   Detalles del Mantenimiento                        -->
    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

    <!-- row3 -->
    <div class="row">
        <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

        <?php $check_text = 'checked="checked"'; ?>

        <!-- Formateo -->
        <div class="col-md-6">
      		<label class="switch">
          	<input type="checkbox" id="formateo" class="mtto-check" <?php echo $mtto['formateo']?$check_text:'';?>>
      			<span class="slider round"></span>
      		</label>
          <span class="labelSwitch"> Formateo de equipo</span>
        </div>

        <!-- Temporales -->
        <div class="col-md-6">
          <label class="switch">
            <input type="checkbox" id="temporales" class="mtto-check" <?php echo $mtto['temporales']?$check_text:'';?>>
            <span class="slider round"></span>
          </label>
          <span class="labelSwitch"> Limpieza de temporales</span>
        </div>

        <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

        <!-- Defragmentacion -->
        <div class="col-md-6">
          <label class="switch">
            <input type="checkbox" id="defragmentacion" class="mtto-check" <?php echo $mtto['defragmentacion']?$check_text:'';?>>
            <span class="slider round"></span>
          </label>
          <span class="labelSwitch"> Defragmentacion</span>
        </div>

        <!-- Limpieza de Aplicaciones -->
        <div class="col-md-6">
          <label class="switch">
            <input type="checkbox" id="limpieza_aplicaciones" class="mtto-check" <?php echo $mtto['limpieza_aplicaciones']?$check_text:'';?>>
            <span class="slider round"></span>
          </label>
          <span class="labelSwitch"> Limpieza de aplicacion</span>
        </div>

        <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

        <!-- Verificacion de cable de red -->
        <div class="col-md-6">
          <label class="switch">
            <input type="checkbox" id="cable_red_ok" class="mtto-check" <?php echo $mtto['cable_red_ok']?$check_text:'';?>>
            <span class="slider round"></span>
          </label>
          <span class="labelSwitch"> Verificacion de cable de red</span>
        </div>

        <!-- Limpieza de Equipo -->
        <div class="col-md-6">
          <label class="switch">
            <input type="checkbox" id="limpieza_equipo" class="mtto-check" <?php echo $mtto['limpieza_equipo']?$check_text:'';?>>
            <span class="slider round"></span>
          </label>
          <span class="labelSwitch"> Limpieza de equipo</span>
        </div>

        <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

        <!-- Acomodo de cables -->
        <div class="col-md-6">
          <label class="switch">
            <input type="checkbox" id="acomodo_cables" class="mtto-check" <?php echo $mtto['acomodo_cables']?$check_text:'';?>>
            <span class="slider round"></span>
          </label>
          <span class="labelSwitch"> Acomodo de cables</span>
        </div>

        <!-- Limpieza de mouse -->
        <div class="col-md-6">
          <label class="switch">
            <input type="checkbox" id="limpieza_mouse" class="mtto-check" <?php echo $mtto['limpieza_mouse']?$check_text:'';?>>
            <span class="slider round"></span>
          </label>
          <span class="labelSwitch"> Limpieza de mouse</span>
        </div>

        <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

        <!-- Platica de seguridad -->
        <div class="col-md-6">
          <label class="switch">
            <input type="checkbox" id="platica_seguridad" class="mtto-check" <?php echo $mtto['platica_seguridad']?$check_text:'';?>>
            <span class="slider round"></span>
          </label>
          <span class="labelSwitch"> Platica de seguridad</span>
        </div>

        <!-- Limpieza de teclado -->
        <div class="col-md-6">
          <label class="switch">
            <input type="checkbox" id="limpieza_teclado" class="mtto-check" <?php echo $mtto['limpieza_teclado']?$check_text:'';?>>
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
            <textarea class="form-control" id="observaciones" rows="3"><?php echo $mtto['observaciones'];?></textarea>
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
          <i class="fa fa-wrench gris"></i> Tecnico que lo elaboro:
        </h3>
        <?php $select_personal = ''; ?>
        <select id="tecnico" name="tecnico" class="form-control">
          <option value="0">Seleccione el personal</option>
          <?php foreach($personal as $p){ ?>

          <?php $select_personal = $mtto['tecnico'] === $p?'selected=\"selected\"':''; ?>
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <!-- Array personal                                        -->
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <option value="<?php echo $p;?>" <?php echo $select_personal;?>><?php echo $p;?></option>
          <?php } ?>
        </select>
      </div>
    </div><!-- row6 Elaborado por-->

    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    <!--                Boton Mantenimiento                    -->
    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

    <!-- row7 -->
    <div class="row up5">
      <div class="col-md-2"></div>
      <div class="col-md-4 text-center">
        
      <button id="btn_editar_mantenimiento" class="mtto-boton fondo_verde mtto-boton-enviar">Guardar</button>
      </div>
      <div class="col-md-4 text-center">
        <button id="btn_cerrar_editar_mantenimiento" class="mtto-boton mtto-boton-enviar">Cerrar</button>
      </div>
      <div class="col-md-2"></div>
    </div><!-- row7 Boton Alta Mantenimientos -->
  </div>
  <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

  <div class="up5"></div>
<script type="text/javascript">
var dire_actualizar_mantenimientos = "<?=base_url()?>"+"index.php/Mantenimientos/updateMtto/";
</script>
