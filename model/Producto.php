<?php 
	require_once 'Conexion.php';
	class Producto
	{

		private $idProducto;
		private $nombreProducto;
		private $descripcionProducto;
		private $precioProducto;
		private $estado;
		private $fechaCreacion;
		private $fechaModificacion;
		private $idRestaurante;
		private $img;


		function __construct()
		{
			
		}

		public function getIdProducto(){
		    	return $this->idProducto;
		}
		public function setIdProducto($idProducto){
		    	$this->idProducto = $idProducto;
		}

		public function getNombreProducto(){
		    	return $this->nombreProducto;
		}
		public function setNombreProducto($nombreProducto){
		    	$this->nombreProducto = $nombreProducto;
		}

		public function getDescripcionProducto(){
		    	return $this->descripcionProducto;
		}
		public function setDescripcionProducto($descripcionProducto){
		    	$this->descripcionProducto = $descripcionProducto;
		}

		public function getPrecioProducto(){
		    	return $this->precioProducto;
		}
		public function setPrecioProducto($precioProducto){
		    	$this->precioProducto = $precioProducto;
		}

		public function getEstado(){
		    	return $this->estado;
		}
		public function setEstado($estado){
		    	$this->estado = $estado;
		}

		public function getFechaCreacion(){
		    	return $this->fechaCreacion;
		}
		public function setFechaCreacion($fechaCreacion){
		    	$this->fechaCreacion = $fechaCreacion;
		}
		
		public function getFechaModificacion(){
		    	return $this->fechaModificacion;
		}
		public function setFechaModificacion($fechaModificacion){
		    	$this->fechaModificacion = $fechaModificacion;
		}
	
		public function getImg()
		{
		    return $this->img;
		}
		
		public function setImg($img)
		{
		    $this->img = $img;
		    return $this;
		}

		public function getId()
		{
		    return $this->idRestaurante;
		}
		
		public function setId($idRestaurante)
		{
		    $this->idRestaurante = $idRestaurante;
		    return $this;
		}

		public function getAll()
    {
    	
    	$objCon = new Conexion();
    	$con = $objCon->conectar();

    	
    	$sql1="select idRestaurante as id from restaurante where idUsuario ='".$_SESSION['IDUSUARIO']."' ";

    	$infa=$con->query($sql1);
    	$data=$infa->fetch_assoc();

        $sqlAll = "SELECT * from combo WHERE estadoCombo = '1' && idRestaurante='".$data['id']."'";  

        $info = $con->query($sqlAll);

        if ($info->num_rows>0) {
            
            $dato = $info;
        }else{

            $dato = false;
        }

        return $dato;
    }

    public function productoParametro($var){

    		$objCon = new Conexion();
    	$con = $objCon->conectar();

    	  $sqlAll = "SELECT * from combo WHERE estadoCombo = '1' && idRestaurante='".$var."'";  

	        $info = $con->query($sqlAll);

	        if ($info->num_rows>0) {
	            
	            $dato = $info;
	        }else{

	            $dato = false;
	        }

	        return $dato;
    }

    public function agregarProducto(){

		$objCon = new Conexion();
    	$con = $objCon->conectar();

		session_start();
		$sql1="select idRestaurante as id from restaurante where idUsuario ='".$_SESSION['IDUSUARIO']."' ";	

		$info = $con->query($sql1);
		$data =  $info->fetch_assoc();

		$this->idRestaurante = $data['id'];
		

    	$sql2 = "INSERT INTO `metrofooddb`.`combo` (`nombreCombo`, `descripcionCombo`, `precioCombo`, `estadoCombo`, `fechaCreacionCombo`, `fechaModificacionCombo`, `idRestaurante`, `img`) VALUES ('".$this->nombreProducto."', '".$this->descripcionProducto."', '".$this->precioProducto."', '".$this->estado."', '".$this->fechaCreacion."', '".$this->fechaModificacion."', '".$this->idRestaurante."', '".$this->img."');";
    	

    	$res=$con->query($sql2);

    	
    	return $res;
    } 

    public function traerCombo($id){

    	$objCon = new Conexion();
    	$con = $objCon->conectar();

    	$sql = "SELECT * FROM combo where idCombo='".$id."';";

    	$info = $con->query($sql);
    	$data = $info->fetch_assoc();
    		return json_encode($data);
    }

    	public function getCombo($idCombo)
			    {
			    	$objCon= new Conexion();
			    	$con=$objCon->conectar();
			    	$sql1="SELECT idCombo as id FROM combo WHERE img='".$idCombo."'";
			    	$res=$con->query($sql1);
			    	$data=$res->fetch_assoc();
			        
			        $sql = "SELECT * FROM `combo` WHERE estadoCombo=1 AND idCombo=".$data['id'];
					 
			        $info=$con->query($sql);
			        $res1=$info->fetch_assoc();
     
			       // $data['idUsuario']=$res['idUsuario'];
			       // $data['usuario'] = $res['usuario'];
			        //$data['pass']= $res['pass'];
			       // $data['nombrerol']= $res['nombre'];
			        
			        return json_encode($res1);



			    }

			    public function updateCombo($idCombo)
				    {
				    	
				  
				    		 $sql = "UPDATE  combo SET nombreCombo = '".$this->nombreProducto."', precioCombo = '".$this->precioProducto."',img = '".$this->img."', descripcionCombo = '".$this->descripcionProducto."', fechaModificacionCombo ='".$this->fechaModificacion."' WHERE idCombo=".$idCombo;
				  			$objCon = new Conexion();  	
							$con = $objCon->conectar();
							$res=$con->query($sql);

				        $data = array();
				        if ($res) {
				            $data['estado']=true;
				            $data['descripcion']="Datos modificados exitosamente";
				        }else{
				            $data['estado']=false;
				            $data['descripcion']="Error en la modificacion ";
				        }

				      
				    return json_encode($data);
				       
				    }

				    public function deleteCombo($idCombo)
					    {

					    	$objCon= new Conexion();
					    	$con=$objCon->conectar();
					    	$sql1="SELECT idCombo as id FROM combo WHERE img='".$idCombo."'";
					    	$res=$con->query($sql1);
					    
					    	$data=$res->fetch_assoc();
					    
					       $sql = "UPDATE  combo SET estadoCombo=0, fechaModificacionCombo=now() WHERE idCombo=".$data['id'];
					 
					       $res1 = $con->query($sql);

					        $data = array();
					        if ($res1) {
					            $data['estado']=true;
					            $data['descripcion']="Datos eliminados exitosamente";
					        }else{
					            $data['estado']=false;
					            $data['descripcion']="Error en la eliminacion ";
					        }

					

					    return json_encode($data);

					    }

					     public function RecuperarCombo($idCombo)
					    {

					    	$objCon= new Conexion();
					    	$con=$objCon->conectar();
					    
					       $sql = "UPDATE  combo SET estadoCombo=1, fechaModificacionCombo=now() WHERE idCombo=".$idCombo;
					 
					       $res1 = $con->query($sql);

					        $data = array();
					        if ($res1) {
					            $data['estado']=true;
					            $data['descripcion']="Datos eliminados exitosamente";
					        }else{
					            $data['estado']=false;
					            $data['descripcion']="Error en la eliminacion ";
					        }

					

					    return json_encode($data);

					    }


					    public function getAllDesactivados()
    {
    	
					    	$objCon = new Conexion();
					    	$con = $objCon->conectar();

					    	session_start();
					    	$sql1="select idRestaurante as id from restaurante where idUsuario ='".$_SESSION['IDUSUARIO']."' ";

					    	$infa=$con->query($sql1);
					    	$data=$infa->fetch_assoc();

					        $sqlAll = "SELECT * from combo WHERE estadoCombo = '0' && idRestaurante='".$data['id']."'";  

					        $info = $con->query($sqlAll);

					        if ($info->num_rows>0) {
					            
					            $dato = $info;
					        }else{

					            $dato = false;
					        }

					        return $dato;
					    }


}


 ?>