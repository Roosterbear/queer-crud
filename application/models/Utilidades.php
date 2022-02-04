<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once __DIR__ . "/../libraries/db/db.php";
//require_once __DIR__."/../libraries/PHPExcel.php";

class Utilidades
{

	public $antivirus = ['ESET','Windows Defender','Otro'];
	public $sistema = ['Windows 10 Pro', 'Windows 10 Home', 'Windows 8.1', 'Windows 8', 'Windows 7 Pro', 'Windows XP'];
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
		$elaboro = $data['elaboro'];
		
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
				($id_equipo, '{$fecha}', $id_detalles_mantenimiento, '{$elaboro}')";
	
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
	
		$rs = $DBSito->Execute($sql);
	
		return true;
	}
	
	public function esteEquipoTieneMtto($id){
		$sql = "select count(id_mantenimiento) as cuantos from mtto_mantenimientos where id_equipo =    ";
	}
	
	// Mantenimientos
	public function bajaMantenimientos($id){
		global $DBSito;
	
		$sql = "delete from mtto_mantenimientos where id_mantenimiento = ".$id;
	
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
	public function cambioEquipos($campo, $valor){
		global $DBSito;
	
		$sql = "";
	
		$rs = $DBSito->Execute($sql);
	
		return $rs->getArray();
	}
	
	// Mantenimientos
	public function cambioMantenimientos($campo, $valor){
		global $DBSito;
	
		$sql = "";
	
		$rs = $DBSito->Execute($sql);
	
		return $rs->getArray();
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

	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	
	// Mantenimientos
	public function getMantenimientos(){
		global $DBSito;
	
		// id_mantenimiento - fecha - area - equipo - tecnico
		$sql = "select mt.id_mantenimiento
				,mt.fecha_realizacion as fecha
				,a.descripcion_area as area
				,m.descripcion_marca+' - '+mo.descripcion_modelo as equipo
				,mt.tecnico
				from mtto_mantenimientos mt
				inner join mtto_equipos e on mt.id_equipo = e.id_equipo
				inner join mtto_marcas m on m.id_marca = e.id_marca
				inner join mtto_modelos mo on mo.id_modelo = e.id_modelo
				inner join mtto_areas a on a.id_area = e.id_departamento
				";
		
		
		$sql .= "";
		
		$rs = $DBSito->Execute($sql);
	
		return $rs->getArray();
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






