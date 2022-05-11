<h1 id="form_space" class="centrado">
  <strong>Edicion de Equipos</strong>
  <br>
  <small>Universidad Tecnologica de Aguascalientes</small>
</h1>

<div id="area_equipos" class="container">

  <!-- @@@@@@@@@@@@@@@@@@@@@@ ALTAS Equipos @@@@@@@@@@@@@@@@@@@@@@ -->
  <div id="equipos_edit_form">

    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    <!-- row1 -->
    <div class="row">
      <!-- Responsable -->
      <div class="col-md-6">
        <h3>
          <i class="fa fa-male gris"></i> Responsable
        </h3>
          <input type="text" id="responsable" name="responsable" value="<?php echo $responsable?>" class="form-control" />
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




<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->