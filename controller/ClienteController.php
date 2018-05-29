<?php 
require_once '../model/Cliente.php';
require_once '../model/Usuario.php';


	if (isset($_POST['key'])) {

		$dec = $_POST['key'];
		
		switch ($dec) {

			case 'agregar':
					agregar();
				break;

			default:
			
			echo $res;
				
				break;
		}
		
	}

	function agregar(){
		$info = $_POST['dataUsuario'];
		$data=json_decode($info);

		//$ObjUsuario = new Usuario();
		$ObjCliente = new Cliente();
		

		$ObjCliente->setNombre($data[0]->value);
		$ObjCliente->setApellido($data[1]->value);
		$ObjCliente->setDireccion($data[2]->value);
		$ObjCliente->setUsuario($data[3]->value);
		$ObjCliente->setCorreoCliente($data[5]->value);
		$ObjCliente->setPass($data[6]->value);
		$ObjCliente->setTelefono($data[4]->value);
		$ObjCliente->setFechaCreacionUsuario(date("y-m-d"));
		$ObjCliente->setFechaModificacionUsuario(date("y-m-d"));
		$ObjCliente->setEstadoUsuario(1);
		$ObjCliente->setIdTipoUsuario(3);
				
		$res=$ObjCliente->agregar();


		echo $res;
	}

 ?>