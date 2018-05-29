<?php 

class ClassName extends AnotherClass
{
	private $idTelefonoRepartidor;
	private $telefono;
	private $idRepartidor;
 
	function __construct(argument)
	{
		
	}

	public function getIdTelefonoRepartidor(){
	    	return $this->idTelefonoRepartidor;
	}
	public function setIdTelefonoRepartidor($idTelefonoRepartidor){
	    	$this->idTelefonoRepartidor = $idTelefonoRepartidor;
	}
	public function getTelefono(){
	    	return $this->telefono;
	}
	public function setTelefono($telefono){
	    	$this->telefono = $telefono;
	}
	public function getIdRepartidor(){
	    	return $this->idRepartidor;
	}
	public function setIdRepartidor($idRepartidor){
	    	$this->idRepartidor = $idRepartidor;
	}

}


 ?>