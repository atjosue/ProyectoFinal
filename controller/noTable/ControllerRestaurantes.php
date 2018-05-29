<?php 
	require_once'../../model/Restaurante.php';

	if (isset($_POST['key'])) {
		$op=$_POST['key'];

		switch ($op) {
			case 'editarPerfil':
				editarPerfil();
				break;
			case 'first':
				primeraVez();
				break;
			case 'imagen':
				verificarImagen();
				break;
			
			
			default:
				
				break;
		}
	}

	function editarPerfil(){
		$info = json_decode($_POST['dataRestaurante']);
			
		
		$objRestaurante = new Restaurante();
		$objRestaurante->setNombreRestaurante($info[0]->value);
		$objRestaurante->setDescripciopnRestaurante($info[1]->value);
		$objRestaurante->setDireccionRestaurante($info[5]->value);
		$objRestaurante->setInformacionRestaurante($info[2]->value);
		$objRestaurante->setLongitud($info[7]->value);
		$objRestaurante->setLatitud($info[6]->value);
		$objRestaurante->setTel1($info[3]->value);
		$objRestaurante->setTel2($info[4]->value);
		$objRestaurante->setImg($info[8]->value);
		$objRestaurante->setFechaModificacionUsuario(date('y-m-d'));

		$data=$objRestaurante->agregarRestaurante();
		echo $data;
	}

	function verificarImagen(){
	$nombre =$_POST['nombre'];
	$link = '../imagenes/img/'.$nombre;

	$op = 0;

	if (file_exists($link)) {
	    unlink($link);
	    $op = 1;
	} else {
		    
	}
	echo $op;
	
	}

	
 ?>