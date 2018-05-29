<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../pluggins/bootstrap/css/bootstrap.css">
    <script src="../../pluggins/plugins/JQuery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../../pluggins/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../pluggins/sweetalert-master/dist/sweetalert.css">
    <script type="text/javascript" src=".././../pluggins/sweetalert-master/dist/sweetalert.min.js" ></script>
    <script type="text/javascript" src="../../resources/js/PerfilRestaurantecliente.js" ></script>

    <title>MetroFood(cliente)</title>

   

    <!-- Custom styles for this template -->


  </head>

 <body>

  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="#">MetroFood</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="dashBoardCliente.php">Inicio <span class="sr-only">(current)</span></a>
      </li>
     
    
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <li class="nav-item">
        <a class="nav-link disabled" href="#">   </a>
      </li>
    <a href="../../app/cerrarSesion.php"><button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Cerrar sesión</button></a>
  </div>
</nav>  

    <!-- Page Content -->

<!-- --------------------------------------------------------Para el header---------------------------------------------------------------->
      <?php 
            $id=$_POST['id'];

            require_once'../../model/Restaurante.php';

            $objRestaurante = new Restaurante();
            $con=$objRestaurante->conectar();
            $sql="SELECT * from restaurante WHERE estadoRestaurante = '1' && idRestaurante='".$id."'";

            $data=$con->query($sql);
            $info = $data->fetch_assoc();
           


        echo '<div class="container">

      <!-- Jumbotron Header -->
      <header class="jumbotron my-4">
        <h1 class="display-3"> <img src="../../imagenes/iconos/moto.png" width="100px" height="100px">'.$info['nombreRestaurante'].'</h1>
        <p class="lead">'.$info['informacionRestaurante'].'</p>
      </header>

      <!-- Page Features -->
      <div class="row text-center">


               <div class="row text-center">';
        ?>
<!-- -------------------------------------------------------- FIn  del header---------------------------------------------------------------->

<!-- -------------------------------------------------------- Mostrar COmbos---------------------------------------------------------------->

<?php 
              require_once'../../model/Producto.php';
              $idRestaurante=$_POST['id'];

              $objProducto =  new Producto();
              $data = $objProducto->productoParametro($idRestaurante);
              //$datos = $data->fetch_assoc();
              $br = 4;
              $cont=0;
              $esta = 1.5;

              foreach ($data as $value) {

                $inicio = "../../imagenes/img/";
                $nameIMG;
                $ima = $value['img'];

                if ($ima=="") {
                   $nameIMG="imagenNo";
                }else{
                  $nameIMG=$value['img'];
                }
               

                $fin = ".png";
                $link = $inicio.$nameIMG.$fin;

               echo '
                       <div class="col-lg-3 col-md-6 mb-4">
                          <div class="card">
                          <img class="card-img-top" src="'.$link.'" >
                            <div class="card-body" style:" overflow:hidden; text-overflow: ellipsis;">
                              <h4 class="card-title">'.$value['nombreCombo'].'</h4>
                              <p class="card-text"></p>
                            </div>
                            <div class="card-footer">
                              <a  class="btn btn-primary agregarACarrito" id="'.$value['idCombo'].'" name="'.$value['img'].'">Leer mas...</a>
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
                       $esta++;
              }



             ?>
       

      </div>
        

      </div>
             

    </div>
       

<!-- -------------------------------------------------------- FIn  de Mostrar COmbos---------------------------------------------------------------->
   

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
/***************************************************MODAL VER COMBO******************************************************
 <div class="modal " tabindex="-1" role="dialog" id="comboView" aria-labelledby="myModalLabel" aria-hidden="true">
                          <br><br><br><br><br><br>
                          <div class="modal-dialog modal-lg" role="document" >
                            <div class="modal-content">
                              <div class="modal-header close">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  &times;
                                </button>
                              </div>
                              <div class="modal-body">

                                    <div class="row">
                                      <br><br><br>
                                          <div class="col-sm-8 col-md-8 col-xs-8 ">
                                                <h4><p id="nombreLeer"> <br></p><h4>
                                                  <br><br>
                                              <h5><div id="descripcionLeer"></div></h5>

                                          </div>
                                          
                                          <div class="col-sm-4 col-md-4 col-xs-4" id="formDatos">
                                            
                                              <input type="hidden" name="precioPre" id="precioPre" >
                                              <input type="hidden" name="idComboPre" id="idComboPre" >
                                              <input type="hidden" name="nombrePre" id="nombrePre" >
                                              

                                              <br><br><br>
                                              <div class="col-lg-12 col-md-12 form-control"> <h3> Precio del Producto: <br><div id="precioLeer"></div></h3></div>
                                              <div class="clearfix"></div><br><br><br>
                                              <div class="col-lg-12 col-md-12 btn btn-success" id="EnviarACarrito" >   
                                                    <h4>Añadir a Carrito<img src="../../imagenes/iconos/agregarCarrito.png"></h4>
                                              </div>
                                          </div>
                                    </div>
                              </div>
                            </div>
                          </div>
</div>
