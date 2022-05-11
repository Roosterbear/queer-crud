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
			$data['elaboro'] = $_REQUEST['elaboro'];
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
		$equipo = $this->mttos_util->utilidades->getEquipo($id);

		$data['responsable'] = $equipo['responsable'];
		$this->load->view('header');
		$this->load->view('editEquipo',$data);
		$this->load->view('footer');
	}

	// Mantenimientos
	public function editarMtto($id=''){
		$data = $this->loadData();
		$data['id'] = $id;		
		$mtto = $this->mttos_util->utilidades->getMantenimiento($id);
		
		$data['tecnico'] = $mtto['tecnico'];
		$this->load->view('header');
		$this->load->view('editMtto',$data);
		$this->load->view('footer');
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


