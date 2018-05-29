<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="pluggins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <script  src="pluggins/bootstrap/jquery/jquery.js"></script>
    <script src="pluggins/js/bootstrap.js"></script>

    <title>MetroFOOD</title>
    

    <!-- Custom styles for this template -->
    <link href="pluggins/bootstrap/design/heroic-features.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
              <a class="navbar-brand" href="#">METROFOOD</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Inicio
                      <span class="sr-only">(current)</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Contactanos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="view/login/login.php">&nbsp;&nbsp;Iniciar Sesion &nbsp;
                      <img src="imagenes/iconos/usuario.png"> &nbsp;</a>
                  </li> 
                </ul>
              </div>
            </div>
          </nav>
        

    <!-- Page Content -->
   <div class="container">
         
      <!-- Jumbotron Header -->
      <header class="jumbotron my-4">
        <h1 class="display-3"> <img src="imagenes/iconos/moto.png" width="100px" height="100px">  MetroFood</h1>
        <p class="lead"> Bienvenido a la pagina en donde podras realizar tus pedidos y asi disfrutar de los mejores productos en pocos minutos.</p>
      </header>

      <!-- Page Features -->
      <div class="row text-center">
          <?php 
            require_once'model/Restaurante.php';

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

                $inicio = "imagenes/img/";
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
                          <div class="card-footer">
                            <a href="view/login/login.php" class="btn btn-primary">Ver Mas...</a>
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
