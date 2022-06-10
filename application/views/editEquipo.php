<h1 class="marihuana"></h1>

<h1 id="form_space" class="centrado titulo_edicion_equipos">
  <strong>Edicion de Equipo <small id="id_equipo_individual" class="gris"><?php echo $id ?></small></strong>
  <br>
  <small>Universidad Tecnologica de Aguascalientes</small>
</h1>

<div id="area_equipos" class="container">

  <!-- @@@@@@@@@@@@@@@@@@@@@@ EDICION Equipos @@@@@@@@@@@@@@@@@@@@@@ -->
  <div id="equipos_edit_form">

    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    <!-- row1 -->
    <div class="row">
      <!-- Responsable -->
      <div class="col-md-6">
        <h3>
          <i class="fa fa-male gris"></i> Responsable
        </h3>
          <input type="text" id="responsable" name="responsable" value="<?php echo $equipo['responsable']?>" class="form-control" />
      </div>

      <!-- Nomenclatura -->
      <div class="col-md-6">
        <h3>
          <i class="fa fa-list-alt gris"></i> Nomenclatura
        </h3>
          <input type="text" id="nomenclatura" name="nomenclatura" value="<?php echo $equipo['nomenclatura']?>" class="form-control" onkeyup="to_uppercase(this);"/>
      </div>

      <!-- Departamento -->
      <div class="col-md-12">
        <h3>
          <i class="fa fa-suitcase gris"></i> Area / Departamento
        </h3>
        <?php $select_area = ''; ?>
        <select id="departamento_equipo" name="departamento_equipo" class="form-control">
          <option value="0">Seleccione el departamento</option>
          <?php foreach ($areas as $a){ ?>

          <?php $select_area = $equipo['id_departamento'] === $a['id_area']?'selected=\"selected\"':''; ?>
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <!-- Tabla Areas                                           -->
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <option value="<?php echo $a['id_area'];?>" <?php echo $select_area;?>><?php echo $a['descripcion_area'];?></option>
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
        <?php $select_marca = ''; ?>
        <select id="marca" name="marca" class="form-control">
          <option value="0">Seleccione marca de equipo</option>
          <?php foreach ($marcas as $marca){ ?>
            <?php $select_marca = $equipo['id_marca'] === $marca['id_marca']?'selected=\"selected\"':''; ?>
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <!-- Tabla Marcas                                          -->
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <option value="<?php echo $marca['id_marca'];?>" <?php echo $select_marca;?>><?php echo $marca['descripcion_marca'];?></option>
          <?php } ?>
        </select>
      </div>

      <!-- Modelo -->
      <div class="col-md-4">
        <h3>
          <i class="fa fa-tag gris"></i> Modelo
        </h3>
        <?php $select_modelo = ''; ?>
        <select id="modelo" name="modelo" class="form-control">
          <option value="0">Seleccione modelo de equipo</option>
          <?php foreach ($modelos as $modelo){ ?>
            <?php $select_modelo = $equipo['id_modelo'] === $modelo['id_modelo']?'selected=\"selected\"':''; ?>
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <!-- Tabla Modelos                                         -->
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <option value="<?php echo $modelo['id_modelo'];?>" <?php echo $select_modelo;?>><?php echo $modelo['descripcion_modelo'];?></option>
          <?php } ?>
        </select>
      </div>

      <!-- Dispositivo -->
      <div class="col-md-4">
        <h3>
          <i class="fa fa-power-off gris"></i> Dispositivo
        </h3>
        <?php $select_dispositivo = ''; ?>
        <select id="dispositivo" name="dispositivo" class="form-control">
          <option value="0">Seleccione dispositivo</option>
          <?php foreach ($dispositivos as $d){ ?>
            <?php $select_dispositivo = $equipo['id_dispositivo'] === $d['id_dispositivo']?'selected=\"selected\"':''; ?>
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <!-- Tabla Dispositivos                                    -->
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <option value="<?php echo $d['id_dispositivo'];?>" <?php echo $select_dispositivo;?>><?php echo $d['descripcion_dispositivo'];?></option>
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
        <?php $select_sistema = ''; ?>
        <select id="sistema" name="sistema" class="form-control">
          <option value="0">Seleccione Sistema Operativo</option>
          <?php foreach ($sistema as $s){ ?>
            <?php $select_sistema = $equipo['sistema'] === $s?'selected=\"selected\"':''; ?>
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <!-- Array Sistema                                         -->
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <option value="<?php echo $s;?>" <?php echo $select_sistema;?>><?php echo $s;?></option>
          <?php } ?>
        </select>
      </div>

      <!-- Memoria RAM -->
      <div class="col-md-4">
        <h3>
          <i class="fa fa-exchange gris"></i> RAM
        </h3>
        <?php $select_ram = ''; ?>
        <select id="ram" name="ram" class="form-control">
          <option value="0">Seleccione cantidad de memoria RAM</option>
          <?php foreach($ram as $r){ ?>
            <?php $select_ram = $equipo['ram'] === $r?'selected=\"selected\"':''; ?>
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <!-- Array Ram                                             -->
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <option value="<?php echo $r;?>" <?php echo $select_ram;?>><?php echo $r;?></option>
        <?php } ?>
        </select>
      </div>

      <!-- Disco Duro -->
      <div class="col-md-4">
        <h3>
          <i class="fa fa-spinner gris"></i> Disco Duro
        </h3>
        <?php $select_disco = ''; ?>
        <select id="disco" name="disco" class="form-control">
          <option value="0">Seleccione capacidad de Disco Duro</option>
          <?php foreach($disco as $d){ ?>
            <?php $select_disco = $equipo['disco'] === $d?'selected=\"selected\"':''; ?>
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <!-- Array Disco                                           -->
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <option value="<?php echo $d;?>" <?php echo $select_disco;?>><?php echo $d;?></option>
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
          <input type="text" id="inventario" name="inventario" value="<?php echo $equipo['inventario'];?>" class="form-control" />
      </div>
    </div><!-- row4 Numero de Inventario-->

    <!-- row5 -->
    <div class="row">
      <!-- Antivirus -->
      <div class="col-md-6">
        <h3><i class="fa fa-life-ring gris"></i> Antivirus / Firewall</h3>
        <?php $select_antivirus = ''; ?>
        <select id="antivirus" name="antivirus" class="form-control">
          <option value="0">Seleccione Antivirus</option>
          <?php foreach ($antivirus as $a){ ?>
            <?php $select_antivirus = $equipo['antivirus'] === $a?'selected=\"selected\"':''; ?>
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <!-- Array Antivirus                                       -->
          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          <option value="<?php echo $a;?>" <?php echo $select_antivirus;?>><?php echo $a;?></option>
        <?php } ?>
        </select>
      </div>
      <!-- Direccion IP -->
      <div class="col-md-6">
        <h3><i class="fa fa-terminal gris"></i> Direccion IP</h3>
        <input type="text" class="form-control" id="direccion_ip" value="<?php echo $equipo['direccion_ip'];?>">
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
          <textarea class="form-control" id="observaciones_equipo" rows="3"><?php echo $equipo['observaciones'];?></textarea>
        </h3>
      </div>
    </div><!-- row6 Observaciones equipo-->
    <hr>
    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    <!-- row7 -->
    <div class="row up5">
      <!-- Boton Altas Equipos -->
      <div class="col-md-2"></div>
      <div class="col-md-4 text-center">
        <button id="btn_editar_equipo" class="mtto-boton fondo_verde mtto-boton-enviar">Guardar</button>
      </div>
      <div class="col-md-4 text-center">
        <button id="btn_cerrar_editar_equipo" class="mtto-boton mtto-boton-enviar">Cerrar</button>
      </div>
      <div class="col-md-2"></div>
    </div><!-- row7 Boton Alta Equipos -->
  </div><!-- Alta de Equipos -->
  <div class="up5"></div>
  
<script type="text/javascript">
var dire_actualizar_equipos = "<?=base_url()?>"+"index.php/Mantenimientos/updateEquipo/";
</script>
