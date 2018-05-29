<?php 
	
	class detalleOrden
	{
		private $idDetalleOrden;
		private $idCombo;
		private $precioCombo;
		private $nombreCombo;
		private $cantidadCombo;
		private $idOrden;

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

	}
 ?>