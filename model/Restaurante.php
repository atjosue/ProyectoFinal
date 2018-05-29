<?php 

require_once'Usuario.php';

class Restaurante extends Usuario
{

	private $idRestaurante;
	private $idUsuario;
	private $nombreRestaurante;
	private $descripcionRestaurante;
	private $estadoRestaurante;
	private $direccionRestaurante;
	private $longitud;
	private $latitud;
	private $informacionRestaurante;
	private $img;
	private $tel1;
	private $tel2;

	function __construct()
	{
		parent::__construct();
	}

	public function getIdRestaurante()
	{
	    return $this->IdRestaurante;
	}
	
	public function setIdRestaurante($IdRestaurante)
	{
	    $this->IdRestaurante = $IdRestaurante;
	    
	}


	public function getIdUsuario()
	{
	    return $this->idUsuario;
	}
	
	public function setIdUsuario($IdUsuario)
	{
	    $this->idUsuario = $IdUsuario;
	   
	}

	public function getNombreRestaurante()
	{
	    return $this->nombreRestaurante;
	}
	
	public function setNombreRestaurante($nombreRestaurante)
	{
	    $this->nombreRestaurante = $nombreRestaurante;
	    
	}

	public function getDescripciopnRestaurante()
	{
	    return $this->descripciopnRestaurante;
	}
	
	public function setDescripciopnRestaurante($descripciopnRestaurante)
	{
	    $this->descripciopnRestaurante = $descripciopnRestaurante;
	    
	}

	public function getEstadoRestaurante()
	{
	    return $this->estadoRestaurante;
	}
	
	public function setEstadoRestaurante($estadoRestaurante)
	{
	    $this->estadoRestaurante = $estadoRestaurante;
	    
	}
	public function getDireccionRestaurante()
	{
	    return $this->direccionRestaurante;
	}
	
	public function setDireccionRestaurante($direccionRestaurante)
	{
	    $this->direccionRestaurante = $direccionRestaurante;
	    
	}

	public function getLongitud()
	{
	    return $this->longitud;
	}
	
	public function setLongitud($longitud)
	{
	    $this->longitud = $longitud;
	    return $this;
	}

	public function getLatitud()
	{
	    return $this->latitud;
	}
	
	public function setLatitud($latitud)
	{
	    $this->latitud = $latitud;
	    return $this;
	}

	public function getInformacionRestaurante()
	{
	    return $this->informacionRestaurante;
	}
	
	public function setInformacionRestaurante($informacionRestaurante)
	{
	    $this->informacionRestaurante = $informacionRestaurante;
	    return $this;
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

    public function getTel1()
    {
        return $this->tel1;
    }
    
    public function setTel1($tel1)
    {
        $this->tel1 = $tel1;
        return $this;
    }

    public function getTel2()
    {
        return $this->tel2;
    }
    
    public function setTel2($tel2)
    {
        $this->tel2 = $tel2;
        return $this;
    }

	public function getAll()
    {
    	$objCon = new Conexion();
    	$con = $objCon->conectar();
        $sqlAll = "SELECT * from restaurante WHERE estadoRestaurante = 1";

        $info = $con->query($sqlAll);
        if ($info->num_rows>0) {
            
            $dato = $info;
        }else{

            $dato = false;
        }
        return $dato;
    }


    public function agregarRestaurante(){

		$objCon = new Conexion();
    	$con = $objCon->conectar();
		
		session_start();

				$sql1="select idRestaurante as id from restaurante where idUsuario ='".$_SESSION['IDUSUARIO']."' ";	

				$info = $con->query($sql1);
				$resp =  $info->fetch_assoc();

				$this->idRestaurante = $resp['id'];



		$sql2="UPDATE `metrofooddb`.`restaurante` SET `nombreRestaurante`='".$this->nombreRestaurante."', `descripcionRestaurante`='".$this->descripciopnRestaurante."', `longRestaurante`='".$this->longitud."', `latiRestaurante`='".$this->latitud."', `direccion`='".$this->direccionRestaurante."', `informacionRestaurante`='".$this->informacionRestaurante."', `img`='".$this->img."', `tel1`='".$this->tel1."', `tel2`='".$this->tel2."' WHERE `idRestaurante`='".$this->idRestaurante."';";

		


		$result=$con->query($sql2);

			if ($result==true) {
				$sql3="UPDATE `metrofooddb`.`usuario` SET `fechaModificacionUsuario`='".date('y-m-d')."' WHERE `idUsuario`='".$this->idRestaurante."';";

				$ress=$con->query($sql3);
			}

		return $ress;
    }

    public function getAllInformacion()
    {
    	$this->setIdRestaurante("");
    	$objCon = new Conexion();
    	$con = $objCon->conectar();
    	session_start();
		$sql1="select idRestaurante as id from restaurante where idUsuario ='".$_SESSION['IDUSUARIO']."' ";	

		$info = $con->query($sql1);
		$data =  $info->fetch_assoc();

		$this->idRestaurante = $data['id'];


        $sqlAll = "SELECT * from restaurante WHERE estadoRestaurante = '1' && idRestaurante='".$this->idRestaurante."';";
        

        $info = $con->query($sqlAll);

        if ($info->num_rows>=0) {  
            $dato = $info;
        }else{

            $dato = false;
        }

       
        return $dato;
    }

    public function getAllInformacionHOME()
    {
    	
    	$objCon = new Conexion();
    	$con = $objCon->conectar();
    		


        $sqlAll = "SELECT * from restaurante WHERE estadoRestaurante = '1'";
        

        $data = $con->query($sqlAll);
        //$info = $data->fetch_assoc();

       
        if ($data->num_rows>0) {  
             $info = $data;
        }else{

            $info = false;
        }

       
        return $info;
    }


}

	


 ?>