<?php 

 require_once'../../model/Orden.php';

 if (isset($_POST['key'])) {
 	$key = $_POST['key'];
 	switch ($key) {
 		case 'verificarRepartidor':
 			verificarRepartidor();
 			break;
 		
 		default:
 			# code...
 			break;
 	}

 	function verificarRepartidor()
 		$ObjOrden = new Orden();
 		$resp = $ObjOrden->verificarRepartidor();
 		echo $resp;	
 	}	

 ?>