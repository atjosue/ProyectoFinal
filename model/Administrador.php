<?php 

class administrador
{
	private $usuario;
	private $contra;

	function __construct()
	{
		
	}

	public function getUsuario()
	{
	    return $this->usuario;
	}
	
	public function setUsuario($usuario)
	{
	    $this->usuario = $usuario;
	    return $this;
	}

	public function getContra()
	{
	    return $this->contra;
	}
	
	public function setContra($contra)
	{
	    $this->contra = $contra;
	    return $this;
	}

}


 ?>