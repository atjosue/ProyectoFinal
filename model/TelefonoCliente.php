<?php 
	
	class telefonoCliente
	{

		private $idTelefonoCliente;
		private $Telefono;
		private $idCliente;
		

		function __construct(){

		}

		public function getIdTelefonoCliente(){
		    	return $this->idTelefonoCliente;
		}
		public function setIdTelefonoCliente($idTelefonoCliente){
		    	$this->idTelefonoCliente = $idTelefonoCliente;
		}
		public function getTelefono(){
		    	return $this->Telefono;
		}
		public function setTelefono($telefono){
		    	$this->Telefono = $telefono;
		}
		public function getIdCliente(){
		    	return $this->idCliente;
		}
		public function setIdCliente($idCliente){
		    	$this->idCliente = $idCliente;
		}

	}

 ?>