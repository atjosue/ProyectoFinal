<?php 
		
	if (isset($_POST['key1'])) {
			require_once '../model/Restaurante.php';
		}else{
			require_once '../../model/Restaurante.php';
		}	
			

	if (isset($_POST['key'])) {
		$op=$_POST['key'];

		switch ($op) {
			case 'a':
				agregarRestaurante();
				break;
			case 'first':
				primeraVez();
				break;
			
			default:
				
				break;
		}
	}

	function agregarRestaurante(){
		$info = $_POST['dataUsuario'];
		$data = json_decode($info);
		var_dump($info);
		die();

		$objRestaurante =  new Restaurante();
		
		$objRestaurante->setUsuario($data[0]->value);
		$objRestaurante->setPass($data[1]->value);
		$objRestaurante->setFechaCreacion(date('y-m-d'));
		$objRestaurante->setFechaModificacion(date('y-m-d'));
		$res=$objRestaurante->AgregarUsuario();

		echo $res;
	}

	function primeraVez(){
		echo "hola";
		$objRestaurante= new Restaurante();
		$res=$objRestaurante->primeraVez();
		echo $res;
	}
 ?>