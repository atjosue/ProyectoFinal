<?php 
 require_once 'Conexion.php';
 require_once 'Usuario.php';

class Cliente extends Usuario
{
	
	private $idCliente;
	private $idUsuario;
	private $nombre;
	private $apellido;
	private $correoCliente;
	private $telefono;
	private $estado;
	private $direccion;

	function __construct()
	{
		parent::__construct();
	}

	public function getIdCliente(){
	    	return $this->idCliente;
	}
	
	public function getIdUsuario(){
	    	return $this->idUsuario;
	}
	public function setIdUsuario($idUsuario){
	    	$this->idUsuario = $idUsuario;
	}
	public function getNombre(){
	    	return $this->nombre;
	}
	public function setNombre($nombre){
	    	$this->nombre = $nombre;
	}

	public function getApellido()
	{
	    return $this->apellido;
	}
	
	public function setApellido($Apellido)
	{
	    $this->apellido = $Apellido;
	 
	}

	public function getEstado(){
	    	return $this->estado;
	}
	public function setEstado($estado){
	    	$this->estado = $estado;
	}
	
	public function getCorreoCliente()
	{
	    return $this->correoCliente;
	}
	
	public function setCorreoCliente($correoCliente)
	{
	    $this->correoCliente = $correoCliente;
	    return $this;
	}

	public function getTelefono(){
	   	return $this->telefono;
	}

	public function setTelefono($Telefono){
		  $this->telefono = $Telefono;
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

	public function ver(){
		echo $this->apellido;
		echo $this->nombre;
		echo $this->correoCliente;

	}

	public function getAll()
    {
    	$con = $this->conectar();
        $sqlAll = "SELECT * from cliente WHERE estado = 1";
        $info = $con->query($sqlAll);
        if ($info->num_rows>0) {
            
            $dato = $info;
        }else{

            $dato = false;
        }
        return $dato;
    }

    public function agregar(){

    		$con = $this->conectar();
			$objUsuario = new Usuario();

			$vendor = false;

			$sql1 = "INSERT INTO `metrofooddb`.`usuario` (`usuario`, `pass`, `fechaCreacionUsuario`, `fechaModificacionUsuario`, `estadoUsuario`, `idTipoUsuario`) VALUES ('".$this->getUsuario()."', '".$this->encriptar($this->getPass())."', '".$this->getFechaCreacionUsuario()."', '".$this->getFechaModificacionUsuario()."', '".$this->getEstadoUsuario()."', '".$this->getIdTipoUsuario()."')";

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