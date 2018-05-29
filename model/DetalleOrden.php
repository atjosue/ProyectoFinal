<?php 
	
	class detalleOrden
	{
		private $idDetalleOrden;
		private $idCliente;
		private $idProducto;
		private $estadoDetalle;
		private $precioProducto;

		function __construct(argument)
		{
			
		}
		public function getIdDetalleOrden(){
		    	return $this->idDetalleOrden;
		}
		public function setIdDetalleOrden($idDetalleOrden){
		    	$this->idDetalleOrden = $idDetalleOrden;
		}
		public function getIdCliente(){
		    	return $this->idCliente;
		}
		public function setIdCliente($idCliente){
		    	$this->idCliente = $idCliente;
		}
		public function getIdProducto(){
		    	return $this->idProducto;
		}
		public function setIdProducto($idProducto){
		    	$this->idProducto = $idProducto;
		}
		public function getEstadoProducto(){
		    	return $this->estadoProducto;
		}
		public function setEstadoProducto($estadoProducto){
		    	$this->estadoProducto = $estadoProducto;
		}
		public function getPrecioProducto(){
		    	return $this->precioProducto;
		}
		public function setPrecioProducto($precioProducto){
		    	$this->precioProducto = $precioProducto;
		}
	}
 ?>