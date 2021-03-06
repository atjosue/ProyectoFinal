<?php 
 //require_once 'Conexion.php';
 require_once 'Usuario.php';
class Repartidor extends Usuario 
{
	protected $idRepartidor;
	protected $idUsuario;
	protected $nombreRepartidor;
	protected $apellidoRepartidor;
	protected $telefonoRepartidor;
	protected $dui;
	protected $direccionRepartidor;
	protected $estadoDelRepartidor;
	protected $fechaCreacion;
	protected $fechaModificasion;


	function __construct()
	{
		parent::__construct();	
	}
	public function getIdRepartidor(){
	    	return $this->idRepartidor;
	}
	public function setIdRepartidor($idRepartidor){
	    	$this->idRepartidor = $idRepartidor;
	}
	public function getIdUsario(){
	    	return $this->idUsario;
	}
	public function setIdUsario($idUsario){
	    	$this->idUsario = $idUsario;
	}
	public function getNombreRepartidor(){
	    	return $this->nombreRepartidor;
	}
	public function setNombreRepartidor($nombreRepartidor){
	    	$this->nombreRepartidor = $nombreRepartidor;
	}
	public function getApellidoRepartidor(){
	    	return $this->apellidoRepartidor;
	}
	public function setApellidoRepartidor($apellidoRepartidor){
	    	$this->apellidoRepartidor = $apellidoRepartidor;
	}
	public function getTelefonoRepartidor(){
	    	return $this->telefonoRepartidor;
	}
	public function setTelefonoRepartidor($telefonoRepartidor){
	    	$this->telefonoRepartidor = $telefonoRepartidor;
	}
	public function getDui(){
	    	return $this->dui;
	}
	public function setDui($dui){
	    	$this->dui = $dui;
	}
	public function getDireccionRepartidor(){
	    	return $this->direccionRepartidor;
	}
	public function setDireccionRepartidor($direccionRepartidor){
	    	$this->direccionRepartidor = $direccionRepartidor;
	}
	public function getEstadoRepartidor(){
	    	return $this->estadoRepartidor;
	}
	public function setEstadoRepartidor($estadoRepartidor){
	    	$this->estadoRepartidor = $estadoRepartidor;
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
	
	public function getAllRepartidor($id)
    {
    	

    	$objCon = new Conexion();
    	$con = $objCon->conectar();
  		
  		$sql1="SELECT idRestaurante AS id from restaurante WHERE idUsuario='".$id."';";
  		$info= $con->query($sql1);
  		
  		$data=$info->fetch_assoc();
 
    	//$sqlAll="SELECT r.idRepartidor, r.nombreRepartidor, r.apellidoRepartidor, r.telefono, r.DUI, r.idRestaurante, u.usuario as usuario, u.pass as contra FROM repartidor r INNER JOIN usuario u WHERE r.idUsuario='".$data['id']."' AND u.idUsuario='".$data['id']."';";
    	$sqlAll="SELECT r.idRepartidor, r.nombreRepartidor, r.apellidoRepartidor, r.telefono, r.DUI, r.idRestaurante, u.usuario as usuario, u.pass as contra FROM repartidor r INNER JOIN usuario u, restaurante p WHERE r.idRestaurante='".$data['id']."' AND p.idRestaurante='".$data['id']."' AND r.idUsuario=u.idUsuario AND r.estadoRepartidor!='0'";
    	
       // $sqlAll = "SELECT * from repartidor WHERE estadoRepartidor = 1";
       	
        $info2 = $con->query($sqlAll);
        $data2= $info2->fetch_assoc();

        
       
		      
        return $info2;
    }

     public function agregar($idRestaurante, $usuario,$contra){
     		


    		$fecha=date('y-m-d');
    		$objCon = new Conexion();
    		$con = $objCon->conectar();
			$objUsuario = new Usuario();

			$vendor = false;


			$sql1 = "INSERT INTO `metrofooddb`.`usuario` (`usuario`, `pass`, `fechaCreacionUsuario`, `fechaModificacionUsuario`, `estadoUsuario`, `idTipoUsuario`) VALUES ('".$usuario."', '".$contra."', '".$fecha."', '".$fecha."', '1', '4')";

			$info = $con->query($sql1);

				$sqlId="SELECT idRestaurante AS id from restaurante WHERE idUsuario='".$idRestaurante."';";
		  		$infoId= $con->query($sqlId);
		  		
		  		$dataId=$infoId->fetch_assoc();

					
					$sql2 = "select max(u.idUsuario) as id from usuario u";
					$info2 = $con->query($sql2);
					$data = $info2->fetch_assoc();


					//$sql4 = "INSERT INTO `metrofooddb`.`repartidor` (`idUsuario`, `nombreRepartidor`, `apellidoRepartidor`, `telefono`, `DUI`,`idRestaurante`, `estadoRepartidor`, `longRepartidor`, `latiRepartidor`) VALUES ('".$data['id']."', '".$this->nombreRepartidor."', '".$this->apellidoRepartidor."', '".$this->telefonoRepartidor."','".$this->dui."','".$dataId['id']."', '1', '00000000', '0000000';";

					$sql4="INSERT INTO `repartidor` (`idRepartidor`, `idUsuario`, `nombreRepartidor`, `apellidoRepartidor`, `telefono`, `DUI`, `idRestaurante`, `estadoRepartidor`, `longRepartidor`, `latiRepartidor`) VALUES (NULL, '".$data['id']."', '".$this->nombreRepartidor."', '".$this->apellidoRepartidor."', '".$this->telefonoRepartidor."', '".$this->dui."', '".$dataId['id']."', '1', '0000000000', '0000000000');";
					
					$info4= $con->query($sql4);



						if ($info4==1) {
							$vendor = true;	
						}

				return $vendor;

		}

						    public function eliminarRepartidor($idRepartidor)
					    {

					    	$objCon= new Conexion();
					    	$con=$objCon->conectar();
					    
					       $sql = "UPDATE  repartidor SET estadoRepartidor=0 WHERE idRepartidor=".$idRepartidor;
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


}


 ?>