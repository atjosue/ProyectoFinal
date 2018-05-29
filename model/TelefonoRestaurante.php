<?php 


class telefonoRestaurante
{
	


	private	$idTelefonoRestaurante;
	private	$idRestaurante;
	private	$telefono;
	private	$estado;

	function __construct(argument)
	{
		# code...
	}

	public function getIdTelefonoRestaurante(){
	    	return $this->idTelefonoRestaurante;
	}
	public function setIdTelefonoRestaurante($idTelefonoRestaurante){
	    	$this->idTelefonoRestaurante = $idTelefonoRestaurante;
	}

	public function getIdRestaurante(){
	    	return $this->idRestaurante;
	}
	public function setIdRestaurante($idRestaurante){
	    	$this->idRestaurante = $idRestaurante;
	}

	public function getTelefono(){
	    	return $this->telefono;
	}
	public function setTelefono($telefono){
	    	$this->telefono = $telefono;
	}
	public function getEstado(){
	    	return $this->estado;
	}
	public function setEstado($estado){
	    	$this->estado = $estado;
	}
}


 ?>