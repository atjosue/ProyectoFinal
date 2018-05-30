<?php 

	require_once'Conexion.php';
	
	class DetalleOrden 
	{
		private $idDetalleOrden;
		private $idCombo;
		private $precioCombo;
		private $nombreCombo;
		private $cantidadCombo;
		private $idOrden;
		private $subtotal;

		function __construct()
		{
			
		}

		public function getOdDetalleOrden()
		{
		    return $this->odDetalleOrden;
		}
		
		public function setOdDetalleOrden($odDetalleOrden)
		{
		    $this->odDetalleOrden = $odDetalleOrden;
		    return $this;
		}

		public function getIdCombo()
		{
		    return $this->idCombo;
		}
		
		public function setIdCombo($idCombo)
		{
		    $this->idCombo = $idCombo;
		    return $this;
		}
		public function getPrecioCombo()
		{
		    return $this->precioCombo;
		}
		
		public function setPrecioCombo($precioCombo)
		{
		    $this->precioCombo = $precioCombo;
		    return $this;
		}
		public function getNombreCombo()
		{
		    return $this->nombreCombo;
		}
		
		public function setNombreCombo($nombreCombo)
		{
		    $this->nombreCombo = $nombreCombo;
		    return $this;
		}

		public function getCantidadCombo()
		{
		    return $this->cantidadCombo;
		}
		
		public function setCantidadCombo($cantidadCombo)
		{
		    $this->cantidadCombo = $cantidadCombo;
		    return $this;
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

		public function getSubtotal()
		{
		    return $this->subtotal;
		}
		
		public function setSubtotal($subtotal)
		{
		    $this->subtotal = $subtotal;
		    return $this;
		}

		public function crearDetalle(){
			$objConexion = new Conexion();
			$con=$objConexion->conectar();
			$sql7="INSERT INTO `metrofooddb`.`detalle_orden` (`idCombo`, `precioCombo`, `nombreCombo`, `cantidad`, `idOrden`, `subtotal`) VALUES ('".$this->idCombo."', '".$this->precioCombo."', '".$this->nombreCombo."', '".$this->cantidadCombo."', '".$this->idOrden."', '".$this->subtotal."');";
			$respues=$con->query($sql7);
			
			return $respues;
		}

		public function getAllDetalleCliente($idOrden){
			$ObjConexion = new Conexion();
			$con = $ObjConexion->conectar();

			$sql=" SELECT * From detalle_orden where idOrden='".$idOrden."';";
			$data=$con->query($sql);
			
			return $data;

		}

	}
 ?>