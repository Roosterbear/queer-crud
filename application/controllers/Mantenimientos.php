<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mantenimientos extends CI_Controller {

	public $mttos_util;

	public function __construct(){
		parent::__construct ();

		$this->load->library('MttosUtil');
		$this->mttos_util = new MttosUtil();
	}

	public function index(){
		$data = $this->loadData();
		
		$this->load->view('header');
		$this->load->view('index',$data);
		$this->load->view('footer');
	}

	
	
	
	
	// Función para cargar 
	public function loadData(){
		$data['fecha_hoy'] = $this->mttos_util->utilidades->getFechaHoy();
		
		//Equipos
		$data['equipos'] = $this->getEquipos();
		
		//Mantenimientos
		$data['mantenimientos'] = $this->getMantenimientos();
		
		//Auxiliares
		$data['edificios'] = $this->getEdificios();
		$data['areas'] = $this->getAreas();
		$data['marcas'] = $this->getMarcas();
		$data['modelos'] = $this->getModelos();
		$data['dispositivos'] = $this->getDispositivos();
		
		//Arrays
		$data['antivirus'] = $this->mttos_util->utilidades->antivirus;
		$data['sistema'] = $this->mttos_util->utilidades->sistema;
		$data['personal'] = $this->mttos_util->utilidades->personal;
		$data['ram'] = $this->mttos_util->utilidades->ram;
		$data['disco'] = $this->mttos_util->utilidades->disco;
		
		return $data;
	}

	
	
	
	
	// *************************************************************************
	// ***************************** ALTAS *************************************
	// *************************************************************************

	// Equipos
	public function altaEquipos(){
		if($_POST){
			$data['responsable'] = $_REQUEST['responsable'];
			$data['departamento'] = $_REQUEST['departamento'];
			$data['marca'] = $_REQUEST['marca'];
			$data['modelo'] = $_REQUEST['modelo'];
			$data['dispositivo'] = $_REQUEST['dispositivo'];
			$data['sistema'] = $_REQUEST['sistema'];
			$data['ram'] = $_REQUEST['ram'];
			$data['disco'] = $_REQUEST['disco'];
			$data['inventario'] = $_REQUEST['inventario'];
			$data['antivirus'] = $_REQUEST['antivirus'];
			$data['direccion_ip'] = $_REQUEST['direccion_ip'];
			$data['observaciones'] = $_REQUEST['observaciones'];
			$data['nomenclatura'] = $_REQUEST['nomenclatura'];
		}else{
			return false;
		}

		echo $this->mttos_util->utilidades->altaEquipos($data);
	}


	// Mantenimientos
	public function altaMantenimientos(){
		if($_POST){
			$data['fecha'] = $_REQUEST['fecha'];
			$data['id_area'] = $_REQUEST['id_area'];
			$data['id_equipo'] = $_REQUEST['id_equipo'];
			$data['formateo'] = $_REQUEST['formateo'];
			$data['temporales'] = $_REQUEST['temporales'];
			$data['defragmentacion'] = $_REQUEST['defragmentacion'];
			$data['limpieza_aplicaciones'] = $_REQUEST['limpieza_aplicaciones'];
			$data['cable_red_ok'] = $_REQUEST['cable_red_ok'];
			$data['limpieza_equipo'] = $_REQUEST['limpieza_equipo'];
			$data['acomodo_cables'] = $_REQUEST['acomodo_cables'];
			$data['limpieza_mouse'] = $_REQUEST['limpieza_mouse'];
			$data['platica_seguridad'] = $_REQUEST['platica_seguridad'];
			$data['limpieza_teclado'] = $_REQUEST['limpieza_teclado'];
			$data['observaciones'] = $_REQUEST['observaciones'];
			$data['tecnico'] = $_REQUEST['tecnico'];
		}else{
			return false;
		}

		echo $this->mttos_util->utilidades->altaMantenimientos($data);
	}


	// Auxiliares
	public function altaMarcas(){
		if($_POST){
			$descripcion = $_REQUEST['descripcion'];
		}else{
			return false;
		}

		echo $this->mttos_util->utilidades->altaMarcas($descripcion);
	}

	public function altaModelos(){
		if($_POST){
			$descripcion = $_REQUEST['descripcion'];
			$marca = $_REQUEST['marca'];
		}else{
			return false;
		}

		echo $this->mttos_util->utilidades->altaModelos($descripcion,$marca);
	}

	public function altaDispositivos(){
		if($_POST){
			$descripcion = $_REQUEST['descripcion'];
		}else{
			return false;
		}

		echo $this->mttos_util->utilidades->altaDispositivos($descripcion);
	}

	public function altaEdificios(){
		if($_POST){
			$descripcion = $_REQUEST['descripcion'];
		}else{
			return false;
		}

		echo $this->mttos_util->utilidades->altaEdificios($descripcion);
	}

	public function altaAreas(){
		if($_POST){
			$descripcion = $_REQUEST['descripcion'];
			$edificio = $_REQUEST['edificio'];
			$nomenclatura = $_REQUEST['nomenclatura'];
		}else{
			return false;
		}

		echo $this->mttos_util->utilidades->altaAreas($descripcion, $edificio, $nomenclatura);
	}

	
	
	
	
	// *************************************************************************
	// ****************************** BAJAS ************************************
	// *************************************************************************

	public function delete(){
		if($_POST){
			$id = $_REQUEST['id'];
			$btn = $_REQUEST['btn'];
		}else{
			return false;
		}

		if ($btn == 'mtto'){
			$this->mttos_util->utilidades->bajaMantenimientos($id);
		}elseif ($btn == 'equipo'){
			$this->mttos_util->utilidades->bajaEquipos($id);
		}else{
			return false;
		}
		return true;
	}

	public function hayMantenimientos(){		
		if($_POST){
			$id = $_REQUEST['id'];			
		}else{
			return false;
		}		
		
		echo $this->mttos_util->utilidades->esteEquipoTieneMtto($id);
	}


	
	
	
	// *************************************************************************
	// ****************************** CAMBIOS **********************************
	// *************************************************************************


	// Equipos
	public function editarEquipo($id=''){
		$data = $this->loadData();
		$data['id'] = $id;		
		$data['equipo'] = $this->mttos_util->utilidades->getEquipoById($id);
			
		$this->load->view('header');
		$this->load->view('editEquipo',$data);
		$this->load->view('footer');
	}
	
	public function updateEquipo(){
	
		if($_POST){
			$data['id'] = $_REQUEST['id'];
			$data['responsable'] = $_REQUEST['responsable'];				
			$data['nomenclatura'] = $_REQUEST['nomenclatura'];
			$data['departamento'] = $_REQUEST['departamento'];
			//
			$data['marca'] = $_REQUEST['marca'];
			$data['modelo'] = $_REQUEST['modelo'];
			$data['dispositivo'] = $_REQUEST['dispositivo'];
			//
			$data['sistema'] = $_REQUEST['sistema'];
			$data['ram'] = $_REQUEST['ram'];
			$data['disco'] = $_REQUEST['disco'];
			//
			$data['inventario'] = $_REQUEST['inventario'];
			$data['antivirus'] = $_REQUEST['antivirus'];
			$data['direccion_ip'] = $_REQUEST['direccion_ip'];
			$data['observaciones'] = $_REQUEST['observaciones'];		
			
		}else{
			return false;
		}
				
		echo $this->mttos_util->utilidades->cambioEquipos($data)?'Equipo actualizado':'Error';
	}

	
	// **************************************************************************
	
	
	// Mantenimientos
	public function editarMtto($id=''){
		$data = $this->loadData();
		$data['id'] = $id;		
		$data['mtto'] = $this->mttos_util->utilidades->getMantenimientoById($id);
				
		$this->load->view('header');
		$this->load->view('editMtto',$data);
		$this->load->view('footer');
	}
	
	public function updateMtto(){
		if($_POST){
			$data['id'] = $_REQUEST['id'];
			$data['fecha'] = $_REQUEST['fecha'];			
			$data['tecnico'] = $_REQUEST['tecnico'];
			$data['formateo'] = $_REQUEST['formateo'];
			$data['temporales'] = $_REQUEST['temporales'];
			$data['defragmentacion'] = $_REQUEST['defragmentacion'];
			$data['limpieza_aplicaciones'] = $_REQUEST['limpieza_aplicaciones'];
			$data['cable_red_ok'] = $_REQUEST['cable_red_ok'];
			$data['limpieza_equipo'] = $_REQUEST['limpieza_equipo'];
			$data['acomodo_cables'] = $_REQUEST['acomodo_cables'];
			$data['limpieza_mouse'] = $_REQUEST['limpieza_mouse'];
			$data['platica_seguridad'] = $_REQUEST['platica_seguridad'];
			$data['limpieza_teclado'] = $_REQUEST['limpieza_teclado'];
			$data['observaciones'] = $_REQUEST['observaciones'];			
			
		}else{
			return false;
		}
		
		$mantenimiento_ok = ($this->mttos_util->utilidades->cambioMantenimientos($data));
		
		
		echo $mantenimiento_ok?'Mantenimiento actualizado':'Error';
		
	}
	
	// Auxiliares



	
	
	
	// *************************************************************************
	// ****************************** DESPLEGADO *******************************
	// *************************************************************************

	// Equipos
	public function getEquipos(){
		return $this->mttos_util->utilidades->getEquipos();
	}
	// Mantenimientos
	public function getMantenimientos(){
		return $this->mttos_util->utilidades->getMantenimientos();
	}

		
	// Equipos
	public function showEquipos(){
		$filtro = '';
		$marca = 0;
		$area = 0;
		
		if($_POST){
			$filtro = $_POST['filtro'];
			$marca = $_POST['marca'];
			$area = $_POST['area'];
			
			return $this->mttos_util->utilidades->getEquiposHTML($filtro, $marca, $area);
		}
		return $this->mttos_util->utilidades->getEquiposHTML($filtro='',$marca=0, $area=0);
	}
	
	
	// Mantenimientos
	public function showMantenimientos(){
		return $this->mttos_util->utilidades->getMantenimientosHTML();
	}
	
	
	
	// Auxiliares
	public function getEdificios(){
		return $this->mttos_util->utilidades->getEdificios();
	}

	public function getAreas(){
		return $this->mttos_util->utilidades->getAreas();
	}

	public function getModelos(){
		return $this->mttos_util->utilidades->getModelos();
	}

	public function getMarcas(){
		return $this->mttos_util->utilidades->getMarcas();
	}

	public function getDispositivos(){
		return $this->mttos_util->utilidades->getDispositivos();
	}


	// *************************************************************************
	// *************************************************************************
	// *************************************************************************
	// *************************************************************************
	// *************************************************************************

	public function getDescripcionEquipos(){
		if($_POST){
			$id = $_REQUEST['id'];
		}else{
			return false;
		}

		echo $this->mttos_util->utilidades->getDescripcionEquiposHTML($id);
	}
}


