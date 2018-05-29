<?php 
	require_once'../model/Carrito.php';
	if (isset($_POST['key'])){
		switch ($_POST['key']) {
			case 'cantidad':
				modificarCantidad();
				break;
			case 'Acarrito':
				Acarrito();
				break;
			case 'subtotal':
				subtotal();
				break;
			case 'total':
				total();
				break;				
			case 'ordenar':
				ordenar();
				break;
			case 'cancelar':
				cancelar();
				break;	
			case 'quitar':
				quitar();
				break;		
			default:
				
				break;
		}
	}

	function modificarCantidad(){
		$objCarrito = new Carrito();
		$objCarrito->setCantidad($_POST['x']);
		$objCarrito->setIdCombo($_POST['idCombo']);
		$res=$objCarrito->modificarCantidad();
		echo $res;

	}
	function subtotal(){
		$objCarrito = new Carrito();
		$objCarrito->setIdCombo($_POST['idCombo']);
		$res=$objCarrito->subtotal();
		echo $res;
	}
	function total(){
		$objCarrito = new Carrito();
		$resp=$objCarrito->total();
		echo $resp;
	}
	function quitar(){
		$objCarrito = new Carrito();
		$dul=$objCarrito->setIdCombo($_POST['idCombo']);

		$resp=$objCarrito->quitar();
		echo $resp;
	}

	
 ?>