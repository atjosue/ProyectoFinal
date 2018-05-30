<?php 
	require_once'../model/Carrito.php';
	require_once'../model/Orden.php';
	require_once'../model/DetalleOrden.php';
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
			case 'crearOrden':
				crearOrden();

				break;	
			case 'borrar':
				quitarUNO();

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
		$resp=$objCarrito->deleteCombos();
		echo $resp;
	}
	function cancelar(){
		$objCarrito = new Carrito();
		
		echo $resp;
	}
	function crearOrden(){

		$objOrden = new Orden();
		$datos=$_POST['dataProducto'];
		$data=json_decode($datos);
		
		$objOrden->setLatCliente($data[0]->value);
		$objOrden->setLonCliente($data[1]->value);
		$objOrden->setDireccion($data[2]->value);
		$objOrden->setIdRestaurante($data[3]->value);
		$res = $objOrden->crearOrden();
		echo $res;

	}
	function quitarUNO(){
		$objCarrito = new Carrito();
		$idCombo=$_POST['idCombo'];
		$res=$objCarrito->eliminarCombo($idCombo);
			echo $res;
	}

	
 ?>