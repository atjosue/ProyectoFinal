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
  <a class="navbar-brand" href="#">MetroFood(ADMIN)</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item active">
        <a class="nav-link" href="gestion.php">Gestion</a>
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

<!-- restarurantes -->
<div class="container">
  


 <div class="row text-center">
          <?php 
            require_once'../../model/Restaurante.php';

              $objRestaurante =  new restaurante();
              $data = $objRestaurante->getAllInformacionHOME();

              //echo $data;
              //var_dump($data);
              //die();
             // $datos = $data->fetch_assoc();
              $br = 4;
              $cont=0;

//x
              foreach ($data as $value) {

                $inicio = "../../imagenes/img/";
                $nameIMG;
              
                echo "<br><br>";

                $ima = $value["img"];

               

                if ($ima=="") {
                   $nameIMG="imagenNo";
                }else{
                  $nameIMG=$value['img'];
                }

                $fin = ".png";
                $link = $inicio.$nameIMG.$fin;

               echo ' <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                          <img class="card-img-top" src="'.$link.'" >
                          <div class="card-body">
                            <h4 class="card-title">"'.$value['nombreRestaurante'].'"</h4>
                          </div>
                          <div class="card-footer">
                            <a href="view/login/login.php" class="btn btn-primary">Gestionars</a>
                          </div>
                        </div>
                      </div> ';
                    $cont++;

                        if ($cont==$br) {
                          echo " <div class='clearfix'></div>";

                          $br++;
                          $br++;
                          $br++;
                          $br++;
                        }
                       
              }


             ?>
       

      </div>
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