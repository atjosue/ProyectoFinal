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
	<link rel="stylesheet" type="text/css" href="../../pluggins/bootstrap/css/bootstrap.css">
	<script src="../../pluggins/bootstrap/js/bootstrap.min.js"></script>	
	<script type="text/javascript" src="../../contenido/vendor/js/bootstrap.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">MetroFood(ADMIN)</a>
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
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <li></li>
    <a href="../../app/cerrarSesion.php"><button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Cerrar sesión</button></a>
  </div>
</nav>

<div class="container">
	   <header class="jumbotron bg-secondary my-4">
       <div class="row text-center">

        <div class="col-lg-4 col-md-4 mb-4">
          <a class="nav-link"  href="gestionClientes.php">
          <div class="card  border-dark   text-white bg-dark ">
            <img class="card-img-top" src="../../imagenes/iconos/users.png" alt="">
            
            <div class="card-footer border-dark   ">
              <h4 class="card-title">CLIENTES</h4>
            </div>
          </div>
          </a>
          
        </div>

        <div class="col-lg-4 col-md-4 mb-4">
          <a class="nav-link" href="gestionRestaurantes.php" >
          <div class="card text-white  border-dark  bg-dark  ">
            <img class="card-img-top" src="../../imagenes/iconos/restaurantes.png" alt="">
          
            <div class="card-footer border-dark  bg-dark  ">
              <h4 class="card-title">RESTAURANTES</h4>
            </div>
          </div>
          </a>
          
        </div>

        <div class="col-lg-4 col-md-4 mb-4">
          <a class="nav-link" href="gestionRepartidores.php">
          <div class="card border-dark   mb-3 text-white bg-dark  ">
            <img class="card-img-top" src="../../imagenes/iconos/repartidor.png" alt="">
            <div class="card-footer border-dark  ">
              <h4 class="card-title">REPARTIDORES</h4>
            </div>
          </div>
          </a>
          
        </div>
     </header>
     <div class="clearfix"></div>
     <header class="jumbotron bg-secondary my-4">
       <div class="row text-center">
        <div class="col-lg-2 col-md-2 mb-2"></div>
        <div class="col-lg-8s col-md-8 mb-8">
          <div class="card border-secondary   mb-3 text-white bg-secondary  ">
            <img class="card-img-top" src="http://placehold.it/500x325" alt="">
          </div>

        <div class="col-lg-2 col-md-2 mb-2"></div>
        </div>
     </header>
</div>


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
