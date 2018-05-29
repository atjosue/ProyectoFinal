<?php 

class Conexion2
{
	private $host;
	private $user;
	private $password;
	private $database;

	public function __construct()
	{
		$data= require_once '../app/config.php';
		$this->host=$data['host'];
		$this->user=$data['user'];
		$this->password=$data['pass'];
		$this->database=$data['db'];	
	}

	public function conectar()
	{
		$con= new mysqli($this->host, $this->user,$this->password, $this->database);
		if ($con->connect_errno) {
			echo "Error en la conexion";
			die();
		}
		return $con;
	}
}

 ?>