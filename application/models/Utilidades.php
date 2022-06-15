<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once __DIR__ . "/../libraries/db/db.php";
//require_once __DIR__."/../libraries/PHPExcel.php";

class Utilidades
{

	public $antivirus = ['ESET','Windows Defender','Otro'];
	public $sistema = ['Windows 11', 'Windows 10 Pro', 'Windows 10 Home', 'Windows 8.1', 'Windows 8', 'Windows 7 Pro', 'Windows XP'];
	public $personal = ['Luis Fernando Perea Gallosso', 'Luis Daniel Herrera Mendez'];
	public $ram = ['2 Gb','4 Gb','6 Gb','8 Gb', '12 Gb','16 Gb'];
	public $disco = ['320 Gb', '500 Gb', '1 Tb'];
	
	
	public function __construct(){

		//$this->excel = new PHPExcel();
	}

	
	/* --------------------------- */
	
	
	public function getFechaHoy(){
		global $DBSito;
	
		$sql = "select convert(char(10),getdate(),126) as fecha";
	
		$rs = $DBSito->Execute($sql);
	
		return $rs->fields['fecha'];
	}
	
	


	// *************************************************************************
	// ***************************** ALTAS *************************************
	// *************************************************************************

	// Equipos
	public function altaEquipos($data){
		global $DBSito;
	
		$responsable = $data['responsable'];
		$departamento = $data['departamento'];
		$marca = $data['marca'];
		$modelo = $data['modelo'];
		$dispositivo = $data['dispositivo'];
		$sistema = $data['sistema'];
		$ram = $data['ram'];
		$disco = $data['disco'];		
		$inventario = $data['inventario'];
		$antivirus = $data['antivirus'];
		$direccion_ip = $data['direccion_ip'];
		$observaciones = $data['observaciones'];
		$nomenclatura = $data['nomenclatura'];
		
		
		$sql = "insert into mtto_equipos (responsable, id_departamento, id_marca, id_modelo, id_dispositivo, sistema, ram, disco, inventario, antivirus, direccion_ip, observaciones, nomenclatura) 
				values ('$responsable', $departamento, $marca, $modelo, $dispositivo, '$sistema', '$ram', '$disco', '$inventario', '$antivirus', '$direccion_ip','$observaciones','$nomenclatura')";
				
	
		$rs = $DBSito->Execute($sql);

		return true;	
		
	}
	
	// Mantenimientos
	public function altaMantenimientos($data){
		// fecha
		global $DBSito;
	
		$fecha = $data['fecha'];
		$id_area = $data['id_area'];
		$id_equipo = $data['id_equipo'];
		$tecnico = $data['tecnico'];
		
		// Informacion para los detalles del mantenimiento
		$formateo = $data['formateo'];
		$temporales = $data['temporales'];
		$defragmentacion = $data['defragmentacion'];
		$limpieza_aplicaciones = $data['limpieza_aplicaciones'];
		$cable_red_ok = $data['cable_red_ok'];
		$limpieza_equipo = $data['limpieza_equipo'];
		$acomodo_cables = $data['acomodo_cables'];
		$limpieza_mouse = $data['limpieza_mouse'];
		$platica_seguridad = $data['platica_seguridad'];
		$limpieza_teclado = $data['limpieza_teclado'];		
		$observaciones = $data['observaciones'];
		// -------------------------------------------------
		
		// Guardar detalles del mantenimiento
		$query_detalles = "insert into mtto_detalles_mantenimiento 
							(formateo, temporales, defragmentacion, limpieza_aplicaciones, 
							limpieza_equipo, limpieza_mouse, limpieza_teclado, cable_red_ok,
							acomodo_cables, platica_seguridad, observaciones) values 
							($formateo,$temporales, $defragmentacion, $limpieza_aplicaciones,
							$limpieza_equipo, $limpieza_mouse, $limpieza_teclado, $cable_red_ok,
							$acomodo_cables, $platica_seguridad, '{$observaciones}')";
		
		$this->altaDetallesMantenimientos($query_detalles);
				
		
		// Obtener ID de detalles del mantenimiento
		$id_detalles_mantenimiento = $this->getUltimoDetalleMantenimiento();
		
		$sql = "insert into mtto_mantenimientos (id_equipo, fecha_realizacion, id_detalle_mantenimiento, tecnico) values
				($id_equipo, '{$fecha}', $id_detalles_mantenimiento, '{$tecnico}')";
	
		$rs = $DBSito->Execute($sql);
			
		return true;
		
	}
	
	public function altaDetallesMantenimientos($query_detalles){
		global $DBSito;
		
		$rs = $DBSito->Execute($query_detalles);		
		
		return true;
	}
	
	public function getUltimoDetalleMantenimiento(){
		global $DBSito;
		
		$sql = "select MAX(id_detalle_mantenimiento) as id from mtto_detalles_mantenimiento";
		
		$rs = $DBSito->Execute($sql);
		
		return $rs->fields['id']; 
	}
	
	// Auxiliares
	public function altaMarcas($descripcion){
		global $DBSito;
		
		if($descripcion == ''){return false;}
		
		$sql = "insert into mtto_marcas (descripcion_marca) values ('$descripcion')";
	
		$rs = $DBSito->Execute($sql);
	
		return true;
	}
	
	public function altaModelos($descripcion, $marca){
		global $DBSito;
		
		if(($descripcion == '')||($marca == '')){return false;}
		
		$sql = "insert into mtto_modelos (descripcion_modelo,id_marca) values ('$descripcion',$marca)";
	
		$rs = $DBSito->Execute($sql);
		
		return true;
	}
	
	public function altaDispositivos($descripcion){
		global $DBSito;
	
		$sql = "insert into mtto_dispositivos (descripcion_dispositivo) values ('$descripcion')";
	
		$rs = $DBSito->Execute($sql);
	
		return true;
	}
	
	public function altaEdificios($descripcion){
		global $DBSito;
	
		$sql = "insert into mtto_edificios (descripcion_edificio) values ('$descripcion')";
	
		$rs = $DBSito->Execute($sql);
	
		return true;
	}
	
	public function altaAreas($descripcion, $edificio, $nomenclatura){
		global $DBSito;
	
		$sql = "insert into mtto_areas (descripcion_area, id_edificio, nomenclatura) values ('$descripcion', $edificio, '$nomenclatura')";
	
		$rs = $DBSito->Execute($sql);
	
		return true;
	}
	
	
	
	// *************************************************************************
	// ****************************** BAJAS ************************************
	// *************************************************************************
	
	// Equipos
	public function bajaEquipos($id){
		global $DBSito;
	
		$sql = "delete from mtto_equipos where id_equipo = ".$id;
			
		// Comment to test and do not delete
		//$rs = $DBSito->Execute($sql);
	
		return true;
	}
	
	public function esteEquipoTieneMtto($id){
		global $DBSito;
		
		$sql = "select count(id_mantenimiento) as cuantos from mtto_mantenimientos where id_equipo =    ".$id;
		
		$rs = $DBSito->Execute($sql);
		
		return $rs->fields['cuantos'];
	}
	
	// Mantenimientos
	public function bajaMantenimientos($id){
		global $DBSito;
	
		$sql = "delete from mtto_mantenimientos where id_mantenimiento = ".$id;
	
		//$this->bajaDetalleMantenimiento($this->getDetalleMantenimiento($id));
		
		// Comment to test and do not delete
		//$rs = $DBSito->Execute($sql);
	
		return true;
	}
	
	public function getDetalleMantenimiento($id){
		global $DBSito;
		
		$sql = "select id_detalle_mantenimiento as id from mtto_mantenimientos where id_mantenimiento = ".$id;
		
		$rs = $DBSito->Execute($sql);
		
		return $rs->fields['id'];		
	}
	
	public function bajaDetalleMantenimiento($id){
		global $DBSito;
		
		$sql = "delete from mtto_detalles_mantenimiento where id_detalle_mantenimiento = ".$id;
		
		$rs = $DBSito->Execute($sql);
		
		return true;
	}
	
	// Auxiliares
	public function bajaEdificios($id){
		global $DBSito;
	
		$sql = "";
	
		$rs = $DBSito->Execute($sql);
	
		return $rs->getArray();
	}
	
	public function bajaAreas($id){
		global $DBSito;
	
		$sql = "";
	
		$rs = $DBSito->Execute($sql);
	
		return $rs->getArray();
	
	}
	
	public function bajaModelos($id){
		global $DBSito;
	
		$sql = "";
	
		$rs = $DBSito->Execute($sql);
	
		return $rs->getArray();
	}
	
	public function bajaMarcas($id){
		global $DBSito;
	
		$sql = "";
	
		$rs = $DBSito->Execute($sql);
	
		return $rs->getArray();
	}
	
	public function bajaDispositivos($id){
		global $DBSito;
	
		$sql = "";
	
		$rs = $DBSito->Execute($sql);
	
		return $rs->getArray();
	}	
	
	
	
	// *************************************************************************
	// ****************************** CAMBIOS **********************************
	// *************************************************************************
	
	
	// Equipos
	public function cambioEquipos($data){
		global $DBSito;
		
		$id = $data['id'];
		$responsable = $data['responsable'];				
		$nomenclatura = $data['nomenclatura'];
		$departamento = $data['departamento'];
		//
		$marca = $data['marca'];
		$modelo = $data['modelo'];
		$dispositivo = $data['dispositivo'];
		//
		$sistema = $data['sistema'];
		$ram = $data['ram'];
		$disco = $data['disco'];
		//
		$inventario = $data['inventario'];
		$antivirus = $data['antivirus'];
		$direccion_ip = $data['direccion_ip'];
		$observaciones = $data['observaciones'];
		
		$sql  = "update mtto_equipos set responsable = '{$responsable}', nomenclatura = '{$nomenclatura}', id_departamento = {$departamento}, ";
		$sql .= "id_marca = {$marca}, id_modelo = {$modelo}, id_dispositivo = {$dispositivo}, sistema = '{$sistema}', ram = '{$ram}', disco = '{$disco}', ";
		$sql .= "inventario = '{$inventario}', antivirus = '{$antivirus}', direccion_ip = '{$direccion_ip}', observaciones = '{$observaciones}' ";
		$sql .= "where id_equipo = {$id}";
	
		$rs = $DBSito->Execute($sql);
	
		return true;
		
		
	}
	
	// Mantenimientos
	public function cambioMantenimientos($data){
		global $DBSito;
		
		$id = $data['id'];
		$fecha = $data['fecha'];		
		$tecnico = $data['tecnico'];
		
		// Informacion para los detalles del mantenimiento
		
		$formateo = $data['formateo'];
		$temporales = $data['temporales'];
		$defragmentacion = $data['defragmentacion'];
		$limpieza_aplicaciones = $data['limpieza_aplicaciones'];
		$cable_red_ok = $data['cable_red_ok'];
		$limpieza_equipo = $data['limpieza_equipo'];
		$acomodo_cables = $data['acomodo_cables'];
		$limpieza_mouse = $data['limpieza_mouse'];
		$platica_seguridad = $data['platica_seguridad'];
		$limpieza_teclado = $data['limpieza_teclado'];
		$observaciones = $data['observaciones'];
		
		$sql  = "update mtto_mantenimientos set tecnico = '{$tecnico}', fecha_realizacion = '{$fecha}' ";
		$sql .= "where id_mantenimiento = {$id}";		
	
		$updated_mtto = $rs = $DBSito->Execute($sql);
		
		$sql  = "update mtto_detalles_mantenimiento set formateo = {$formateo}";
		$sql .= ", temporales = {$temporales}, defragmentacion = {$defragmentacion}, limpieza_aplicaciones = {$limpieza_aplicaciones}, cable_red_ok = {$cable_red_ok}";
		$sql .= ", limpieza_equipo = {$limpieza_equipo}, acomodo_cables = {$acomodo_cables}, limpieza_mouse = {$limpieza_mouse}, platica_seguridad = {$platica_seguridad}";
		$sql .= ", limpieza_teclado = {$limpieza_teclado}, observaciones = '{$observaciones}' ";
		$sql .= "where id_detalle_mantenimiento = (select id_detalle_mantenimiento from mtto_mantenimientos where id_mantenimiento = {$id})";
		
		$updated_detalle_mtto = $DBSito->Execute($sql);
			
		$updated_mtto_ok = (($updated_mtto) && ($updated_detalle_mtto))?true:false;
		return $updated_mtto_ok;
		//return $sql;
	}
	
	
	
	// Auxiliares
	public function cambioEdificios($campo, $valor){
		global $DBSito;
	
		$sql = "";
	
		$rs = $DBSito->Execute($sql);
	
		return $rs->getArray();
	}
	
	public function cambioAreas($campo, $valor){
		global $DBSito;
	
		$sql = "";
	
		$rs = $DBSito->Execute($sql);
	
		return $rs->getArray();
	
	}
	
	public function cambioModelos($campo, $valor){
		global $DBSito;
	
		$sql = "";
	
		$rs = $DBSito->Execute($sql);
	
		return $rs->getArray();
	}
	
	public function cambioMarcas($campo, $valor){
		global $DBSito;
	
		$sql = "";
	
		$rs = $DBSito->Execute($sql);
	
		return $rs->getArray();
	}
	
	public function cambioDispositivos($campo, $valor){
		global $DBSito;
	
		$sql = "";
	
		$rs = $DBSito->Execute($sql);
	
		return $rs->getArray();
	}	
	
	
	// *************************************************************************
	// ****************************** DESPLEGADO *******************************
	// *************************************************************************
	
	// Equipos
	public function getEquipos(){
		global $DBSito;	
		
		// id_equipo - equipo - inventario - responsable - area - nomenclatura
		$sql = "select e.id_equipo 
				,m.descripcion_marca+' - '+mo.descripcion_modelo as equipo
				,e.inventario
				,e.responsable
				,a.descripcion_area as area
				,e.nomenclatura
				
				from mtto_equipos e
				inner join mtto_marcas m on m.id_marca = e.id_marca
				inner join mtto_modelos mo on mo.id_modelo = e.id_modelo
				inner join mtto_areas a on a.id_area = e.id_departamento
				";
	
		$rs = $DBSito->Execute($sql);
	
		return $rs->getArray();
	}	
	
	// Mantenimientos
	public function getMantenimientos(){
		global $DBSito;
	
		// id_mantenimiento - fecha - area - equipo - tecnico
		$sql = "select mt.id_mantenimiento
				,mt.fecha_realizacion as fecha
				,m.descripcion_marca+' - '+mo.descripcion_modelo as equipo
				,e.responsable
				,a.descripcion_area as area
				,mt.tecnico
				from mtto_mantenimientos mt
				inner join mtto_equipos e on mt.id_equipo = e.id_equipo
				inner join mtto_marcas m on m.id_marca = e.id_marca
				inner join mtto_modelos mo on mo.id_modelo = e.id_modelo
				inner join mtto_areas a on a.id_area = e.id_departamento
				";
	
		$rs = $DBSito->Execute($sql);
	
		return $rs->getArray();
	}
	
	// --------------------------------------------------------------------
	
	// Equipo por ID
	public function getEquipoById($id){
		global $DBSito;
	
		$sql = "select me.id_equipo
				,me.responsable
				,me.id_departamento
				,ma.descripcion_area
				,me.id_marca
				,mm.descripcion_marca
				,me.id_modelo
				,mmm.descripcion_modelo
				,me.id_dispositivo
				,md.descripcion_dispositivo
				,me.sistema
				,me.ram
				,me.disco
				,me.inventario
				,me.observaciones
				,me.antivirus
				,me.direccion_ip
				,me.nomenclatura
				from mtto_equipos me
				inner join mtto_areas ma on me.id_departamento = ma.id_area
				inner join mtto_marcas mm on me.id_marca = mm.id_marca
				inner join mtto_modelos mmm on me.id_modelo = mmm.id_modelo
				inner join mtto_dispositivos md on me.id_dispositivo = md.id_dispositivo
				where me.id_equipo = ".$id;
	
		$rs = $DBSito->Execute($sql);
	
		return $rs->fields;
	}
	
	// Mantenimiento por ID
	public function getMantenimientoById($id){
		global $DBSito;
			
		$sql = "select mt.id_mantenimiento
				,mt.fecha_realizacion as fecha
				,m.descripcion_marca+' - '+mo.descripcion_modelo+' ['+e.inventario+']' as equipo
				,e.responsable+' ['+e.nomenclatura+']' as responsable
				,a.id_area as id_departamento
				,ed.descripcion_edificio+' / '+descripcion_area as area
				,mt.tecnico
				,dm.formateo
				,dm.temporales
				,dm.defragmentacion
				,dm.limpieza_aplicaciones
				,dm.limpieza_equipo
				,dm.limpieza_mouse
				,dm.limpieza_teclado
				,dm.cable_red_ok
				,dm.acomodo_cables
				,dm.platica_seguridad
				,dm.observaciones
				,e.sistema
				from mtto_mantenimientos mt
				inner join mtto_equipos e on mt.id_equipo = e.id_equipo
				inner join mtto_marcas m on m.id_marca = e.id_marca
				inner join mtto_modelos mo on mo.id_modelo = e.id_modelo
				inner join mtto_areas a on a.id_area = e.id_departamento
				inner join mtto_edificios ed on ed.id_edificio = a.id_edificio
				inner join mtto_detalles_mantenimiento dm on dm.id_detalle_mantenimiento = mt.id_detalle_mantenimiento
				where id_mantenimiento = ".$id;
	
		$rs = $DBSito->Execute($sql);
	
		return $rs->fields;
	}
	
	// --------------------------------------------------------------------
	
	public function getEquiposHTML(){
		$equipos = $this->getEquipos();
		// id_equipo - equipo - inventario - responsable - area - nomenclatura
		$html = '<table class="table table-stripped table-condensed table-bordered table-hover "><tr>';
		$html .= '<th class="text-center">No.</th>';
		$html .= '<th class="text-center">Equipo</th>';
		$html .= '<th class="text-center">Inventario</th>';
		$html .= '<th class="text-center">Responsable</th>';
		$html .= '<th class="text-center">Area</th>';
		$html .= '<th class="text-center">Nomenclatura</th>';
		$html .= '<th class="text-center">Editar</th>';
		$html .= '<th class="text-center">Eliminar</th></tr>';
		
		$cuenta_equipos = 0;
		foreach($equipos as $e){
			$html .= '<tr id="row-equipo-'.$e['id_equipo'].'">';
			$html .= '<td>'.++$cuenta_equipos.'</td>';
			$html .= '<td>'.$e['equipo'].'</td>';
			$html .= '<td>'.$e['inventario'].'</td>';
			$html .= '<td>'.$e['responsable'].'</td>';			
			$html .= '<td>'.$e['area'].'</td>';			
			$html .= '<td>'.$e['nomenclatura'].'</td>';			
			$html .= '<td id="editar-equipo-'.$e['id_equipo'].'" class="text-center editar-equipo">';
			$html .= '<i class="fa fa-pencil fa-2x verde"/></i></td>';			
			$html .= '<td id="borrar-equipo-'.$e['id_equipo'].'" class="text-center borrar-equipo"><i class="fa fa-times fa-2x rojo"/></i></td></tr>';

		}
		
		$html .= '<table>';
		echo $html;	
	}
	
	
	
	public function getMantenimientosHTML(){
		$mantenimientos = $this->getMantenimientos();
		//id_mantenimiento - fecha - area - equipo - tecnico
		$html = '<table class="table table-stripped table-condensed table-bordered table-hover "><tr>';
		$html .= '<th class="text-center">No.</th>';
		$html .= '<th class="text-center">Fecha</th>';
		$html .= '<th class="text-center">Area</th>';
		$html .= '<th class="text-center">Equipo</th>';
		$html .= '<th class="text-center">Responsable</th>';		
		$html .= '<th class="text-center">Editar</th>';
		$html .= '<th class="text-center">Eliminar</th></tr>';
		
		$cuenta_mttos = 0;
		foreach($mantenimientos as $m){
			$html .= '<tr id="row-mtto-'.$m['id_mantenimiento'].'">';
			$html .= '<td>'.++$cuenta_mttos.'</td>';
			$html .= '<td>'.$m['fecha'].'</td>';
			$html .= '<td>'.$m['area'].'</td>';
			$html .= '<td>'.$m['equipo'].'</td>';			
			$html .= '<td>'.$m['responsable'].'</td>';								
			$html .= '<td id="editar-mtto-'.$m['id_mantenimiento'].'" class="text-center editar-mtto"><i class="fa fa-pencil fa-2x verde"/></i></td>';			
			$html .= '<td id="borrar-mtto-'.$m['id_mantenimiento'].'" class="text-center borrar-mtto"><i class="fa fa-times fa-2x rojo"/></i></td></tr>';				
		}		

		$html .= '<table>';
		echo $html;
	}
	
	
	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	
	// Auxiliares
	public function getEdificios(){
		global $DBSito;
		
		$sql = "select * from mtto_edificios";
		
		$rs = $DBSito->Execute($sql);
		
		return $rs->getArray();
	}
	
	public function getAreas(){
		global $DBSito;
		
		$sql = "select * from mtto_areas";
		
		$rs = $DBSito->Execute($sql);
		
		return $rs->getArray();
		
	}
	
	public function getModelos(){
		global $DBSito;
	
		$sql = "select * from mtto_modelos";
	
		$rs = $DBSito->Execute($sql);
	
		return $rs->getArray();
	}
	
	public function getMarcas(){
		global $DBSito;
	
		$sql = "select * from mtto_marcas";
	
		$rs = $DBSito->Execute($sql);
	
		return $rs->getArray();
	}
	
	public function getDispositivos(){
		global $DBSito;
	
		$sql = "select * from mtto_dispositivos";
	
		$rs = $DBSito->Execute($sql);
	
		return $rs->getArray();
	}
	
	
	// ------------------------------------------
	
	public function getDescripcionEquipos($id){
		global $DBSito;
		
		$sql = "select e.id_equipo, e.nomenclatura+' - '+e.inventario+' - '+ m.descripcion_marca+' '+mo.descripcion_modelo as salida
				from mtto_equipos e
				inner join mtto_marcas m on m.id_marca = e.id_marca
				inner join mtto_modelos mo on mo.id_modelo = e.id_modelo
				where e.id_departamento = {$id}";

		$rs = $DBSito->Execute($sql);		
		return $rs->getArray();
	}
	
	public function getDescripcionEquiposHTML($id){
		$equipos = $this->getDescripcionEquipos($id);
		
		$html = '<h3><i class="fa fa-desktop gris"></i> Equipo</h3>';
		$html .= '<select id="equipo_mtto" name="equipo_mtto" class="form-control"><option value="0">Seleccione el departamento</option>';
		foreach($equipos as $e){
			$html .= '<option value="'.$e['id_equipo'].'">'.$e['salida'].'</option>';						
		}
		
		$html .= '</select>';
		return $html;
		
	}
	
	// -------------------------------------------
}






