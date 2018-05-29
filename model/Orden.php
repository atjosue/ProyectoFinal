<?php 
	
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
		
	}

 ?>