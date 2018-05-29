<?php 
require_once '../../model/Repartidor.php';
require_once '../../model/Usuario.php';
if (isset($_POST['key'])) {
	$key=$_POST['key'];

	switch ($key) {
		case 'agregar':
			agregar();
			break;
		
		default:
			
			break;
	}
	
}

	function agregar(){
		$info = $_POST['dataRep'];
		$data=json_decode($info);

		session_start();
		$idRestaurante=$_SESSION['IDUSUARIO'];
		$usuario=$data[4];
		$pass=$data[5];
		

		//$ObjUsuario = new Usuario();
		$ObjRepartidor = new Repartidor();
		

		$ObjRepartidor->setNombreRepartidor($data[0]->value);
		$ObjRepartidor->setApellidoRepartidor($data[1]->value);
		$ObjRepartidor->setTelefonoRepartidor($data[2]->value);
		$ObjRepartidor->setDui($data[3]->value);
				
		$res=$ObjRepartidor->agregar($idRestaurante,$usuario,$pass);


		echo $res;
	}




 ?>