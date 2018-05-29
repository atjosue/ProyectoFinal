<?php 
	
	
	class orden
	{
		private $idOrden;
		private $fechaOrden;
		private $estadoOrden;
		private $estadoEntregaOrden;
		private $idReoartidor;
		private $idCliente;
		private $fechaModificacion;

		function __construct(argument)
		{
			
		}

		public function getIdOrden(){
		    	return $this->idOrden;
		}
		public function setIdOrden($idOrden){
		    	$this->idOrden = $idOrden;
		}
		public function getFechaOrden(){
		    	return $this->fechaOrden;
		}
		public function setFechaOrden($fechaOrden){
		    	$this->fechaOrden = $fechaOrden;
		}
		public function getEstadoOrden(){
		    	return $this->estadoOrden;
		}
		public function setEstadoOrden($estadoOrden){
		    	$this->estadoOrden = $estadoOrden;
		}
		public function getEstadoEntregaOrden(){
		    	return $this->estadoEntregaOrden;
		}
		public function setEstadoEntregaOrden($estadoEntregaOrden){
		    	$this->estadoEntregaOrden = $estadoEntregaOrden;
		}
		public function getIdRepartidor(){
		    	return $this->idRepartidor;
		}
		public function setIdRepartidor($idRepartidor){
		    	$this->idRepartidor = $idRepartidor;
		}
		public function getIdCliente(){
		    	return $this->idCliente;
		}
		public function setIdCliente($idCliente){
		    	$this->idCliente = $idCliente;
		}
		public function getFechaModificacion(){
		    	return $this->fechaModificacion;
		}
		public function setFechaModificacion($fechaModificacion){
		    	$this->fechaModificacion = $fechaModificacion;
		}
		
	}

 ?>