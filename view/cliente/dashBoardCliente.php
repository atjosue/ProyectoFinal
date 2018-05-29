<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../contenido/vendor/bootstrap/css/bootstrap.css">
    <script src="../../pluggins/plugins/JQuery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../../pluggins/plugins/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="../../pluggins/sweetalert-master/dist/sweetalert.css">
    <script type="text/javascript" src=".././../pluggins/sweetalert-master/dist/sweetalert.min.js" ></script>
    <script type="text/javascript" src="../../resources/js/dashboardCliente.js" ></script>

    <title>MetroFood(cliente)</title>

   

    <!-- Custom styles for this template -->


  </head>

 <body>

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">METROFOOD</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <p style=" color:white; font-size: 20px; margin-top: 15px; "><?php echo " Bienvenido: "; session_start(); print_r($_SESSION['USUARIO']); ?></p>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="ordenar.php">Carrito <img src="../../imagenes/iconos/agregarCarrito.png"></a>
      </li>
      <li class="nav-item active">
        <p style=" color:white; font-size: 20px; margin-top: 5px; " id="contadorCarrito"></p>
      </li>
     
    </ul>
    <form class="form-inline my-2 my-lg-0">&nbsp;&nbsp;
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <li></li>
    <a href="../../app/cerrarSesion.php">
      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Cerrar sesión</button>
    </a>
  </div>
  
</nav>

    <!-- Page Content -->
   <div class="container">

      <!-- Jumbotron Header -->
      <header class="jumbotron my-4">
        <h1 class="display-3"> <img src="../../imagenes/iconos/moto.png" width="100px" height="100px">  MetroFood</h1>
        <p class="lead">Bienvenido a la pagina en donde podras realizar tus pedidos y asi disfrutar de los mejores productos en pocos minutos.</a>
      </header>

      <!-- Page Features -->
      <div class="row text-center">


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
                            <p class="card-text">"'.$value['descripcionRestaurante'].'"</p>
                        
                          </div>
                          <div class="card-footer" >
                            <form action="perfilRestaurante.php" method="POST">
                            <input type="hidden" name="id" id="id" value="'.$value['idRestaurante'].'">
                            <input type="submit" class="btn btn-primary" value="Ver Mas..." ></input>

                            </form>
                          </div>
                        </div>
                      </div>
                     

                      ';
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
             
              <br><hr><br>

             <!--------------------------------- CARRUSEL-------------------------------------------- -->

             <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="8"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="9"></li>
                  
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="imagenes/carousellindex/1.jpg" alt="First slide" style="width:1200px; height: 500px;">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="imagenes/carousellindex/2.jpg" alt="Second slide" style="width:1200px; height: 500px;">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="imagenes/carousellindex/3.jpg" alt="Forth slide" style="width:1200px; height: 500px;">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="imagenes/carousellindex/4.jpg" alt="Fifth slide" style="width:1200px; height: 500px;">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="imagenes/carousellindex/5.png" alt="Sixth slide" style="width:1200px; height: 500px;">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="imagenes/carousellindex/6.jpg" alt="Seventh slide" style="width:1200px; height: 500px;">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="imagenes/carousellindex/7.jpg" alt="Eighth slide" style="width:1200px; height: 500px;">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="imagenes/carousellindex/8.jpg" alt="Nineth slide" style="width:1200px; height: 500px;">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="imagenes/carousellindex/9.jpg" alt="Tenth slide" style="width:1200px; height: 500px;">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>

             <br><hr><br>


    </div>

    <!-- /.container -->

   
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
         <p class="m-0 text-center text-white">Copyright &copy; MetroFood 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->

  </body>
</html>
