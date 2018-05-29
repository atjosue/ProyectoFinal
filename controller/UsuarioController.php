<?php 

	require_once'../model/Usuario.php';
	require_once'../model/Cliente.php';

	if (isset($_POST['key'])) {

		$dec = $_POST['key'];
		
		switch ($dec) {

			case 'sesion':
					login();

				break;

			case 'finduser':
					verificar();
				break;
			case 'agregarRestaurante':
					agregarRestaurante();
				break;
			case 'agregarRepartidor':
					agregarRepartidor();
				break;	

			case 'first':
				primeraVez();
				break;

			case 'solicitarInfo':
				solicitarInfo();
				break;		

			case 'modificar':
					modificar();
				break;

			case 'eliminar':
					eliminar();
				break;

			case 'recuperar':
					recuperar();
				break;		
	

			default:
				
				break;
		}
		
	}

	 function login(){

	 	$data = json_decode($_POST['dataLogin']);

	 	$ObjUsuario = new Usuario();
	 	
		$user = $data[0]->value;
		
		$pass2 = $ObjUsuario->encriptar($data[1]->value);

		$res = $ObjUsuario->logear($user,$pass2);

		echo $res;

	};

	function verificar(){
		
		$user = $_POST['usuario'];
		
		$ObjUsuario = new Usuario();

		$data = $ObjUsuario->finduser($user);

		echo $data;
	}

	function agregarRestaurante(){

			$info = json_decode($_POST['dataUsuario']);

			$objUsuario =  new Usuario();
			
			$objUsuario->setUsuario($info[0]->value);
			$objUsuario->setPass($info[1]->value);
			$objUsuario->setFechaCreacionUsuario(date('y-m-d'));
			$objUsuario->setFechaModificacionUsuario(date('y-m-d'));
				
			$res=$objUsuario->agregarUsuarioRestaurante();

			echo $res;
		}

		function agregarRepartidor(){

			$info = json_decode($_POST['dataRepartidor']);

			$objRepartidor =  new Usuario();
			
			$objUsuario->setUsuario($info[0]->value);
			$objUsuario->setPass($info[1]->value);
			$objUsuario->setFechaCreacionUsuario(date('y-m-d'));
			$objUsuario->setFechaModificacionUsuario(date('y-m-d'));
				
			$res=$objUsuario->agregarUsuarioRestaurante();

			echo $res;
		}

	
	function primeraVez(){
		$objUsuario= new Usuario();
		$res=$objUsuario->primeraVez();
		echo $res;
	}

	function solicitarInfo()
	{
		$objUsuario = new Usuario();
		$idUsuario = $_POST['idUsuario'];
		
		$data = $objUsuario->getUser($idUsuario);

		echo $data;

	}

		function modificar()
	{
		$objUsuario = new Usuario();
		$dataUsuario = $_POST['info'];
		$decodeInfo = json_decode($dataUsuario);		
		$usuario = $decodeInfo[0]->value;
		$pass= $decodeInfo[1]->value;
		$fechaModificacionUsuario = date("y-m-d");
		$idUsuario=$decodeInfo[3]->value;
		if ($pass=="") {

		$objUsuario->setUsuario($usuario);
		$objUsuario->setFechaModificacionUsuario($fechaModificacionUsuario);

		}else{

		$objUsuario->setUsuario($usuario);
		$objUsuario->setPass($pass);
		$objUsuario->setFechaModificacionUsuario($fechaModificacionUsuario);

		}

		$res = $objUsuario->updateUser($idUsuario);
		echo $res;

	/*	$objUsuario->setUsuario($usuario);
		$objUsuario->setPass($pass);
		$objUsuario->setFechaModificacionUsuario;
		$res = $objUsuario->updateUser($idUsuario);
		echo $res;
		*/
	}

	function eliminar()
	{
		$objUsuario = new Usuario();
		$idUsuario = $_POST['idUsuario'];
		$res = $objUsuario->deleteUser($idUsuario);
		echo $res;
		
	}

	function recuperar()
	{
		$objUsuario = new Usuario();
		$idUsuario = $_POST['idUsuario'];
		$res = $objUsuario->recuperarUsuario($idUsuario);
		echo $res;
		
	}
	
 ?>