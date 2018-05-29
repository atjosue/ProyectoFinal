<?php

require_once 'Conexion.php';


	class Usuario extends Conexion
	{
		private $idUsuario;
		private $usuario;
		private $pass;
		private $fechaCreacionUsuario;
		private $fechaModificacionUsuario;
		private $estadoUsuario;
		private $idTipoUsuario;

		function __construct()
		{
			parent::__construct();
		}

		public function getIdUsuario(){

			return $this->idUsuario;
		}

		public function getUsuario(){
			return $this->usuario;
		}
		public function setUsuario($usuario){
			$this->usuario=$usuario;
		}
		public function getPass(){
			return $this->pass;
		}
		public function setPass($pass){
			$this->pass=$pass;
		}
		public function getFechaCreacionUsuario(){
			return $this->fechaCreacionUsuario;
		}
		public function setFechaCreacionUsuario($fechaCreacionUsuario){
			$this->fechaCreacionUsuario=$fechaCreacionUsuario;
		}
		public function getFechaModificacionUsuario()
		{
		    return $this->fechaModificacionUsuario;
		}
		
		public function setFechaModificacionUsuario($FechaModificacionUsuario)
		{
		    $this->fechaModificacionUsuario = $FechaModificacionUsuario;
		    return $this;
		}
		public function getEstadoUsuario(){
			return $this->estadoUsuario;
		}
		public function setEstadoUsuario($estadoUsuario){
			$this->estadoUsuario=$estadoUsuario;
		}
		public function getIdTipoUsuario(){
			return $this->idTipoUsuario;
		}
		public function setIdTipoUsuario($idTipoUsuario){
			$this->idTipoUsuario=$idTipoUsuario;
		}

		public function encriptar($var){
			$newPass = sha1($var);
			return $newPass;
		}

		public function logear($user, $pass){



			$con=$this->conectar();

			
			
			$sql="SELECT usuario AS usuario, idTipoUsuario as rol, idUsuario as idUsuario from usuario where usuario = '".$user."' && pass='".$pass."' && estadoUsuario ='1'";

			$info=$con->query($sql);
			$data  = $info->fetch_assoc();
		
			if ($info->num_rows>=1) {

				session_start();
				$_SESSION['ROL']=$data['rol'];
				$_SESSION['IDUSUARIO']=$data['idUsuario'];
				$_SESSION['USUARIO']=$data['usuario'];

					if ($_SESSION['ROL']=='1') {

						$op = 1;
						
						
					}else if ($_SESSION['ROL']=='2') {
						$op = 2;
						
					}else if ($_SESSION['ROL']=='3') {
						$op =3;
						
						
					}else if ($_SESSION['ROL']=='4') {
						$op = 4;
				
					}	

			}else{
				$op = 5;	
			}

			return $op;
		}

		//verificar usuario

		public function findUser($user){


			$con = $this->conectar();
			$sql = "SELECT COUNT(u.idUsuario) as numero from usuario u where usuario = '".$user."'";

			$info = $con->query($sql);
			$data = $info->fetch_assoc();

				if($data['numero']>0) {
					$data['dec'] = true;
				}else{
					$data['dec'] = false;
				}

			return json_encode($data);

		}

		public function getAllRestaurantes(){
			$con=$this->conectar();
			$sql = " SELECT * from usuario where  idTipoUsuario=2 AND estadoUsuario=1";
			$info=$con->query($sql);
			

				 if ($info->num_rows>0) {
            
		            $dato = $info;
		        }else{

		            $dato = false;
		        }
		        return $dato;
		}

		public function getAllRestaurantesEliminados(){
			$con=$this->conectar();
			$sql = " SELECT * from usuario where  idTipoUsuario=2 AND estadoUsuario=0";
			$info=$con->query($sql);
			

				 if ($info->num_rows>0) {
            
		            $dato = $info;
		        }else{

		            $dato = false;
		        }
		        return $dato;
		}

		public function getAllClientes(){
			$con=$this->conectar();
			$sql = " SELECT * from usuario where  idTipoUsuario=3 AND estadoUsuario=1";
			$info=$con->query($sql);
			

				 if ($info->num_rows>0) {
            
		            $dato = $info;
		        }else{

		            $dato = false;
		        }
		        return $dato;
		}

		public function getAllClientesEliminados(){
			$con=$this->conectar();
			$sql = " SELECT * from usuario where  idTipoUsuario=3 AND estadoUsuario=0";
			$info=$con->query($sql);
			

				 if ($info->num_rows>0) {
            
		            $dato = $info;
		        }else{

		            $dato = false;
		        }
		        return $dato;
		}

		 public function agregarUsuarioRestaurante(){

		    	$con = $this->conectar();

		    	$sql="INSERT INTO `metrofooddb`.`usuario` (`usuario`, `pass`, `fechaCreacionUsuario`, `fechaModificacionUsuario`, `estadoUsuario`, `idTipoUsuario`) VALUES ('".$this->usuario."', '".$this->encriptar($this->pass)."', '".$this->fechaCreacionUsuario."', '".$this->fechaModificacionUsuario."', '1', '2')";
		    	$data=$con->query($sql);

		    		if ($data==1) {

		    			$sql2="select MAX(idUsuario) as id from usuario";
		    			$dato=$con->query($sql2);
		   				$id=$dato->fetch_assoc();

		    				

		    				$sql3="INSERT INTO `metrofooddb`.`restaurante` (`idUsuario`, `nombreRestaurante`, `descripcionRestaurante`, `estadoRestaurante`, `longRestaurante`, `latiRestaurante`, `direccion`, `informacionRestaurante`, `img`, `tel1`, `tel2`) VALUES ('".$id['id']."', '', '', '1', '', '', '', '', '', '', '');";
		    				

		    				$resp=$con->query($sql3);
		    			}

		    	return $resp;

		   	}

   		 public function primeraVez(){

		    	$con = $this->conectar();
		    	session_start();
				$sql1="select idRestaurante as id from restaurante where idUsuario ='".$_SESSION['IDUSUARIO']."' ";	

				$info = $con->query($sql1);
				$resp =  $info->fetch_assoc();

				$this->idRestaurante = $resp['id'];


		    	$sql2="select nombreRestaurante as nombre from restaurante where idRestaurante='".$this->idRestaurante."'";

		    	$infa=$con->query($sql2);
		    	$data=$infa->fetch_assoc();

		    	$dato=false;

		    		if ($data['nombre']=="") {
		    			$dato=true;
		    		}

		    	return $dato;
		    }

		     //-----Datos para la modificacion desde el administrador
		    public function getUser($idUsuario)
			    {
			    	$con=$this->conectar();
			        
			        $sql = "SELECT * FROM `usuario` WHERE estadoUsuario=1 AND idUsuario=".$idUsuario;
			        $info=$con->query($sql);
			        $res=$info->fetch_assoc();

			        $data=$res;

			      
			       
			       // $data['idUsuario']=$res['idUsuario'];
			       // $data['usuario'] = $res['usuario'];
			        //$data['pass']= $res['pass'];
			       // $data['nombrerol']= $res['nombre'];
			        
			        return json_encode($data);



			    }


			     public function updateUser($idUsuario)
				    {
				    	
				    	if ($this->pass=="") {
				    		 $sql = "UPDATE  usuario SET usuario = '".$this->usuario."', fechaModificacionUsuario='".$this->fechaModificacionUsuario."' WHERE idUsuario=".$idUsuario;
				  				    	}else{
				  			 $sql = "UPDATE  usuario SET usuario = '".$this->usuario."',pass= '".$this->encriptar($this->pass)."', fechaModificacionUsuario='".$this->fechaModificacionUsuario."' WHERE idUsuario=".$idUsuario;	    		
				  				    	}
				     
							$con = $this->conectar();
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

				    public function deleteUser($idUsuario)
					    {
					    
					       $sql = "UPDATE  usuario SET estadoUsuario=0, fechaModificacionUsuario=now() WHERE idUsuario=".$idUsuario;
					       $con= $this->conectar();
					       $res = $con->query($sql);
					        $data = array();
					        if ($res) {
					            $data['estado']=true;
					            $data['descripcion']="Datos eliminados exitosamente";
					        }else{
					            $data['estado']=false;
					            $data['descripcion']="Error en la eliminacion ";
					        }

					    return json_encode($data);

					    }

					     public function recuperarUsuario($idUsuario)
					    {
					    
					       $sql = "UPDATE  usuario SET estadoUsuario=1, fechaModificacionUsuario=now() WHERE idUsuario=".$idUsuario;
					       $con= $this->conectar();
					       $res = $con->query($sql);

					        $data = array();
					        if ($res) {
					            $data['estado']=true;
					            $data['descripcion']="Usuario recuperado exitosamente";
					        }else{
					            $data['estado']=false;
					            $data['descripcion']="Error en la Recuperacion ";
					        }

					    return json_encode($data);

					    }
				
	}
 ?>