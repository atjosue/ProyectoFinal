<?php 
require_once'Conexion.php';


class Carrito
{
	
	private $nombreCombo;
	private $cantidad;
	private $precio;
	private $idCliente;
	private $idCombo;


	function __construct()
	{
		
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

	public function getCantidad()
	{
	    return $this->cantidad;
	}
	
	public function setCantidad($cantidad)
	{
	    $this->cantidad = $cantidad;
	    return $this;
	}

	public function getPrecio()
	{
	    return $this->precio;
	}
	
	public function setPrecio($precio)
	{
	    $this->precio = $precio;
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

	public function getIdCombo()
	{
	    return $this->idCombo;
	}
	
	public function setIdCombo($idCombo)
	{
	    $this->idCombo = $idCombo;
	    return $this;
	}
	

	public function agregarCombo(){
		$objCon = new Conexion();
		$con = $objCon->conectar();
		session_start();
		$sql1="select idCliente as id from cliente where idUsuario='".$_SESSION['IDUSUARIO']."'";
		$res=$con->query($sql1);
		$data=$res->fetch_assoc();

			$sql2="INSERT INTO `metrofooddb`.`carrito` (`nombreCombo`, `idCombo`, `precio`, `idCliente`, `cantidad`) 
				   VALUES ('".$this->nombreCombo."', '".$this->idCombo."', '".$this->precio."', '".$data['id']."','1');";

			

			$res2= $con->query($sql2);
			if ($res2==1) {
				$info=$res2;
			}else{
				$info=null;
			}

			return $info;
	}

	public function extraerCombos(){

		$objCon = new Conexion();
		$con = $objCon->conectar();
		session_start();
		$sql1="select idCliente as id from cliente where idUsuario='".$_SESSION['IDUSUARIO']."'";
		$res=$con->query($sql1);
		$data = $res->fetch_assoc();

			$sql2="SELECT * from carrito where idCliente='".$data['id']."'";
			

			$res2= $con->query($sql2);
			if ($res2->num_rows>0) {
				$info=$res2;
			}else{
				$info=null;
			}

			return $info;



	}

	public function modificarCantidad(){
		$objCon = new Conexion();
		$con = $objCon->conectar();
		session_start();
		$sql1="select idCliente as id from cliente where idUsuario='".$_SESSION['IDUSUARIO']."'";
		$res=$con->query($sql1);
		$data = $res->fetch_assoc();

		$sql2="UPDATE `metrofooddb`.`carrito` SET `cantidad`='".$this->cantidad."' WHERE `idCombo`='".$this->idCombo."';";

			$res2= $con->query($sql2);
			if ($res2==1) {
				$info=$res2;
			}else{
				$info=null;
			}


			return $info;

	}

	public function deleteCombos(){
		$objCon = new Conexion();
		$con = $objCon->conectar();
		session_start();
		$sql1="select idCliente as id from cliente where idUsuario='".$_SESSION['IDUSUARIO']."'";
		$res=$con->query($sql1);
		$data = $res->fetch_assoc();

			$sql2="DELETE FROM `metrofooddb`.`carrito` WHERE `idCliente`='".$data['id']."';";

			$res2= $con->query($sql2);
			if ($res2==1) {
				$info=$res2;
			}else{
				$info=null;
			}

			return $info;

	}

	public function contarCarrito(){
		$objCon = new Conexion();
		$con = $objCon->conectar();
		$sql1="SELECT idCliente as id from cliente where idUsuario='".$this->idCliente."' ";
		$info=$con->query($sql1);
		$data=$info->fetch_assoc();
		$sql2="SELECT COUNT(idCombo) as cont from carrito where idCliente= '".$data['id']."' order by(idCombo);";
		$info=$con->query($sql2);
		$data=$info->fetch_assoc();

		return json_encode($data);
	}

	public function mostarCarrito(){
			$objCon= new Conexion();
			$con=$objCon->conectar();
			$sql = " SELECT * from usuario where  idTipoUsuario=2 AND estadoUsuario=0";
			$info=$con->query($sql);
			

				 if ($info->num_rows>0) {
            
		            $dato = $info;
		        }else{

		            $dato = false;
		        }
		        return $dato;
		}

		public function subtotal(){
			$objCon= new Conexion();
			$con=$objCon->conectar();
			$sql1="select cantidad*precio as subtotal from carrito where idCombo='".$this->idCombo."';";
			$info=$con->query($sql1);
			$data=$info->fetch_assoc();

				$sql2="UPDATE `metrofooddb`.`carrito` SET `subtotal`='".$data['subtotal']."' WHERE `idCombo`='".$this->idCombo."';";
				$infa=$con->query($sql2);
				
				if ($infa==1) {
					$resa=$infa;
				}else{
					$resa=false;
				}
				return $resa;

	}

	public function total(){
		$objCon= new Conexion();
		$con=$objCon->conectar();
		session_start();
		$sql1="select idCliente as id from cliente where idUsuario='".$_SESSION['IDUSUARIO']."'";

		$res=$con->query($sql1);
		$data = $res->fetch_assoc();


		$sql2="SELECT SUM(subtotal) as total from carrito where idCliente='".$data['id']."';";
		
		$resp=$con->query($sql2);
		$datos=$resp->fetch_assoc();
		
		return json_encode($datos);
	}

	public function quitar(){
		$objCon= new Conexion();
		$con=$objCon->conectar();
		session_start();
		$sql1="select idCliente as id from cliente where idUsuario='".$_SESSION['IDUSUARIO']."'";

		$res=$con->query($sql1);
		$data = $res->fetch_assoc();

		$sql2="DELETE FROM `metrofooddb`.`carrito` WHERE `idCombo`='".$this->idCombo."';";
		$infor=$con->query($sql2);
		
			if ($infor==1) {
				$resp=$infor;
			}else{
				$resp=false;
			}

		return $resp;

	}
}

?>