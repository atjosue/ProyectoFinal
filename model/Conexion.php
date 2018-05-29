<?php 

//require_once'../app/config.php';
class Conexion
{
	private $host;
	private $user;
	private $password;
	private $database;

	public function __construct()
	{
		
		$this->host='localhost';
		$this->user='root';
		$this->password='';
		$this->database='metrofooddb';	
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