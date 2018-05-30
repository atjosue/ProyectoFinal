<?php 
require_once'Conexion.php';
require_once'DetalleOrden.php';
	class orden
	{
		private $idOrden;
		private $fechaOrden;
		private $estadoOrden;
		private $estadoEntregaOrden;
		private $idRepartidor;
		private $idCliente;
		private $fechaModificacion;
		private $idRestaurante;
		private $lonRestaurante;
		private $latRestaurante;
		private $lonClinte;
		private $latCliente;
		private $direccion;

		function __construct()
		{
			
		}

		public function getIdOrden()
		{
		    return $this->idOrden;
		}
		
		public function setIdOrden($idOrden)
		{
		    $this->idOrden = $idOrden;
		    return $this;
		}

		public function getFechaOrden()
		{
		    return $this->fechaOrden;
		}
		
		public function setFechaOrden($fechaOrden)
		{
		    $this->fechaOrden = $fechaOrden;
		    return $this;
		}
		public function getEstadoOrden()
		{
		    return $this->estadoOrden;
		}
		
		public function setEstadoOrden($estadoOrden)
		{
		    $this->estadoOrden = $estadoOrden;
		    return $this;
		}

		public function getEstadoEntregaOrden()
		{
		    return $this->estadoEntregaOrden;
		}
		
		public function setEstadoEntregaOrden($estadoEntregaOrden)
		{
		    $this->estadoEntregaOrden = $estadoEntregaOrden;
		    return $this;
		}

		public function getIdRepartidor()
		{
		    return $this->idRepartidor;
		}
		
		public function setIdRepartidor($idRepartidor)
		{
		    $this->idRepartidor = $idRepartidor;
		    return $this;
		}

		public function getIdCliente()
		{
		    return $this->idCliente;
		}
		
		public function setIdCliente($idCliente)
		{
		    $this->idCliente = $idCliente;
		    return $this;
		}
		public function getFechaModificacion()
		{
		    return $this->fechaModificacion;
		}
		
		public function setFechaModificacion($fechaModificacion)
		{
		    $this->fechaModificacion = $fechaModificacion;
		    return $this;
		}
		public function getIdRestaurante()
		{
		    return $this->idRestaurante;
		}
		
		public function setIdRestaurante($idRestaurante)
		{
		    $this->idRestaurante = $idRestaurante;
		    return $this;
		}
		
		public function getLonRestaurante()
		{
		    return $this->lonRestaurante;
		}
		
		public function setLonRestaurante($lonRestaurante)
		{
		    $this->lonRestaurante = $lonRestaurante;
		    return $this;
		}
		public function getLatRestaurante()
		{
		    return $this->latRestaurante;
		}
		
		public function setLatRestaurante($latRestaurante)
		{
		    $this->latRestaurante = $latRestaurante;
		    return $this;
		}

		public function getLonCliente()
		{
		    return $this->lonCliente;
		}
		
		public function setLonCliente($lonCliente)
		{
		    $this->lonCliente = $lonCliente;
		    return $this;
		}

		public function getLatCliente()
		{
		    return $this->latCliente;
		}
		
		public function setLatCliente($latCliente)
		{
		    $this->latCliente = $latCliente;
		    return $this;
		}		
		public function getDireccion()
		{
		    return $this->direccion;
		}
		
		public function setDireccion($direccion)
		{
		    $this->direccion = $direccion;
		    return $this;
		}
		
		public function crearOrden(){
			$objConexion = new Conexion();
			$objDetalle = new DetalleOrden();
			$con=$objConexion->conectar();
			session_start();
			$bandera=1;

	//para obtener el id del cliente que esta haciendo el combo		
			$sql1="select idCliente as id from cliente where idUsuario ='".$_SESSION['IDUSUARIO']."' ";
				$infa = $con->query($sql1);
				$cliente =  $infa->fetch_assoc();

				$this->idCliente= $cliente['id'];

	//seleccionar un repartidor que no este ocupado.
				

				$sql2="SELECT MIN(idRepartidor) as id FROM repartidor WHERE idRestaurante = '".$this->idRestaurante."' AND estadoRepartidor='1';";
					$infe = $con->query($sql2);
					$repart =  $infe->fetch_assoc();

					$this->idRepartidor=$repart['id'];

					

	//para obtener la latitud y longitud del restaurante.

			$sql3="SELECT longRestaurante as lon, latiRestaurante as lati from restaurante where idRestaurante='".$this->idRestaurante."'";
					$infi = $con->query($sql3);
					$ubica =  $infi->fetch_assoc();

					
					$this->latRestaurante=$ubica['lati'];
					$this->lonRestaurante=$ubica['lon'];


	//agregando orden.


			$sql4 = "INSERT INTO `metrofooddb`.`orden` (`estadoOrden`, `estadoEntregaOrden`, `idRepartidor`, `idCliente`, `fechaModificacion`, `idRestaurante`, `lonRestaurante`, `latRestaurante`, `lonCliente`, `latCliente`) VALUES ('1', '1', '".$this->idRepartidor."', '".$this->idCliente."', '".date('y-m-d')."', '".$this->idRestaurante."', '".$this->lonRestaurante."', '".$this->latRestaurante."', '".$this->lonCliente."', '".$this->latCliente."');";

			$ordenCreada = $con->query($sql4);

					$sql4A="UPDATE `metrofooddb`.`repartidor` SET `estadoRepartidor`='2' WHERE `idRepartidor`='".$this->idRepartidor."';";
					$EstadoRepart=$con->query($sql4);

			if ($ordenCreada) {
	//--------------------------------------CREACION DEL DETALLE--------------------------------

					$sql5="SELECT MAX(idOrden) as id FROM orden";
					$resa=$con->query($sql5);
					$reza=$resa->fetch_assoc();

					$this->idOrden=$reza['id'];

	//obtener combos ordenados por la persona.

					$sql6="SELECT * FROM carrito where idCliente='".$this->idCliente."';";
					$comboCarro=$con->query($sql6);

					foreach ($comboCarro as $value) {
	//ingresar Combos con el value
						$objDetalle->setIdCombo($value['idCombo']);
						$objDetalle->setPrecioCombo($value['precio']);
						$objDetalle->setNombreCombo($value['nombreCombo']);
						$objDetalle->setCantidadCombo($value['cantidad']);
						$objDetalle->setIdOrden($this->idOrden);	
						$objDetalle->setSubtotal($value['subtotal']);
						$dodu=$objDetalle->crearDetalle();

						if ($dodu) {
							
						}else{
							$bandera=2;
							break;
						}
					}
						
			}else{
				$bandera=2;
			}

			echo $bandera;
		

			
		}
	}

 ?>