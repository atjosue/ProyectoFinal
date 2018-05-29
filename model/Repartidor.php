<?php 
 require_once 'Conexion.php';
class Repartidor
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
 
    	$sqlAll="SELECT r.idRepartidor, r.nombreRepartidor, r.apellidoRepartidor, r.telefono, r.DUI, r.idRestaurante, u.usuario as usuario, u.pass as contra FROM repartidor r INNER JOIN usuario u WHERE r.idUsuario='".$data['id']."' AND u.idUsuario='".$data['id']."';";
    	
       // $sqlAll = "SELECT * from repartidor WHERE estadoRepartidor = 1";
       	
        $info2 = $con->query($sqlAll);
        $data2= $info2->fetch_assoc();

        
       
		      
        return $info2;
    }

     public function agregar($idRestaurante, $usuario,$contra){
     		$passEncrip=sha1($contra);
    		$con = $this->conectar();
    		$fecha=now();
			$objUsuario = new Usuario();

			$vendor = false;

			$sql1 = "INSERT INTO `metrofooddb`.`usuario` (`usuario`, `pass`, `fechaCreacionUsuario`, `fechaModificacionUsuario`, `estadoUsuario`, `idTipoUsuario`) VALUES ('".$usuario."', '".$passEncrip."', '".$fecha."', '".$fecha."', '1', '4')";

			echo $sql;
			die();

			$info = $con->query($sql1);
			
				if ($info) {
					
					$sql2 = "select max(u.idUsuario) as id from usuario u";


					$info2 = $con->query($sql2);

					$data = $info2->fetch_assoc();

					$sql4 = "INSERT INTO `metrofooddb`.`cliente` (`idUsuario`, `nombreCliente`, `apellidoCliente`, `estado`, `direccion`, `longCliente`, `latiCliente`, `correoCliente`, `telefonoCLiente`) VALUES ('".$data['id']."', '".$this->nombre."', '".$this->apellido."', '1', 'col San Anotnio San Salvador', '00000000', '0000000', '".$this->correoCliente."', '".$this->telefono."');";

				
							$info4= $con->query($sql4);

						if ($info4>0) {
							$vendor = true;	
						}

				}
				
				return $vendor;

		}


}


 ?>