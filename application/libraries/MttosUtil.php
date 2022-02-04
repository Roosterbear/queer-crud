<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once __DIR__ . "/../models/Utilidades.php";

class MttosUtil
{
	public $utilidades;
	
	function __construct(){
		$this->utilidades = new Utilidades();
	}		
}