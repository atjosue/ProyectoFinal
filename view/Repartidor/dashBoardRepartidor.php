<?php 
  /*  session_start();
  if($_SESSION['ROl']=='1'){

  }else{
    session_destroy();
    header('location: ../../index.php');
  }
*/
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Gestion de restaurantes</title>
  <link rel="stylesheet" type="text/css" href="../../contenido/vendor/bootstrap/css/bootstrap.css">
  <script src="../../pluggins/bootstrap/js/bootstrap.min.js"></script>  
  <script type="text/javascript" src="../../contenido/vendor/js/bootstrap.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">MetroFood(REPARTIDORES)</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item active">
        <a class="nav-link" href=""></a>
      </li>
     <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
  -->
    </ul>
   
    <li></li>
    <a href="../../app/cerrarSesion.php"><button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Cerrar sesión</button></a>
  </div>
</nav>

<!-- restarurantes -->
<div class="container">
    <?php 
      require_once'../../model/Repartidor.php';
      require_once'../../model/Pedido.php';
    
      $objRepartidor= new Repartidor();
      $info = $objRepartidor->getAllRepartidor();
      $dataR =$info->fech_assoc();

      $nombreCompleto = $dataR['nombre'].concat( $dataR['nombre']);
      
      $objPedido = new Pedido();
      $objPedido->pedidos();

      echo '  
            <div class="row col-md-12 col-xs-12 col-sm-12">

                <div>$dataR[''] <br> <h4>Bienvenido</h4></div>
            <div class="col-xs-6"></div>
          <div class="col-xs-6">
              <div class="btn btn-lg btn-warning rounded-circle" id="pedidos"> <br><br><br><br><br>Tiene una entrega </div>
         </div>


            </div>
      ' ;


     ?>
</div>
</body>
 <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
         <p class="m-0 text-center text-white">Copyright &copy; MetroFood 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
   
</html>