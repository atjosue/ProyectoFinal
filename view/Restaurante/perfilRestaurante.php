<?php 
 /* session_start();
  if($_SESSION['TIPO']=='2'){

  }else{
    session_destroy();
    header('location: ../../index.php');
  }
*/
 require_once '../../controller/RepartidorController.php'; 
 require_once '../../model/Restaurante.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Gestion de repartidores</title>
		
    <link rel="stylesheet" type="text/css" href="../../pluggins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../pluggins/dataTable/material.min.css">
    <link rel="stylesheet" type="text/css" href="../../pluggins/dataTable/dataTables.material.min.css">
    <link rel="stylesheet" type="text/css" href="../../pluggins/sweetalert-master/dist/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="../../pluggins/Croppie/croppie.css">

    <!-- JS -->
    
    <script type="text/javascript" src="../../pluggins/pluginess/jquery/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../../pluggins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../pluggins/dataTable/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../pluggins/dataTable/dataTables.material.min.js"></script>
    <script type="text/javascript" src="../../pluggins/jQuery-Mask/src/jquery.mask.js"></script>
    <script type="text/javascript" src="../../pluggins/sweetalert-master/dist/sweetalert.min.js"></script> 
     <script type="text/javascript" src="../../pluggins/Croppie/croppie.js"></script>
    

    <script type="text/javascript" src="../../resources/js/Restaurante.js"></script> 
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNh2ZPVxLNmV1o8KV6isxchmm9sSZUCwI&callback=initMap">
    </script>
    <script type="text/javascript" src="../../resources/js/ubicar.js" ></script> 

	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">METROFOOD</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Gestion</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="perfilRestaurante.php">Perfil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="perfilRestaurante.php">Pedidos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="perfilRestaurante.php">Estadisticas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gestionRepartidores.php">Repartidores</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <li></li>
    <a href="../../app/cerrarSesion.php">
      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Cerrar sesión</button>
    </a>
  </div>
  
</nav>
		<div class="container">

        <?php 

              $objRestaurante = new Restaurante();
              $res=$objRestaurante->getAllInformacion();
              $data=$res->fetch_assoc();

              

              $telef2="";

              if ($data['tel2']=="") {
                  $telef2="OPCIONAL";
              }else{
                $telef2=$data['tel2'];
              }

               $inicio = "../../imagenes/img/";
                $ima = "";
               if ($data['img']=="") {
                 $ima="imagenNo";
               }else{
                $ima = $data['img'];
               }
                
                $fin = ".png";
                $link = $inicio.$ima.$fin;
              
              


              echo '
                    <br><br>
            

        <div id="infoRestaurante" class="row">

           <div class="col-md-9" style="margin-top: 10px;">
                <p class="robo" style="font-weight: 300; margin-bottom: 0px; font-size: 30px;">'.$data['nombreRestaurante'].' </p>
                <p class="robo" style="font-weight: 300; font-size: 14px; height: 40px;">Gesti&oacute;n de la informacion del restaurante que se utiliza en MetroFOOD</p>
            </div>
  <div class="clearfix"></div>

             <div class="form-column col-lg-4 col-md-4 mb-4">
                  
                    <div class="card text-white  border-dark  bg-dark ">
                      <img class="card-img-top" src="'.$link.'" id="imga">
                      <div class="card-footer border-dark  bg-dark  ">

                        <div class="btn btn-default col-md-6 col-sm-6 col-xs-6">
                          <div class="form-column ">
                            <input class="form-control-file" type="file" name="upload_image" id="upload_image" />
                          </div>
                        </div>
                      </div>
                    </div>
                     

             </div>

             <div class="form-column col-lg-4 col-md-4 mb-4">     
                 
                <div class="form-group">
                    <label class="label-control" >Nombre:</label>
                    <input type="text" class="form-control" name="nombre"  id="nombre" value="'.$data['nombreRestaurante'].'" >
                </div>
                <div class="form-group">
                   <label class="label-control" >Descripcion de la Pagina Home:</label>
                   <input type="text" class="form-control" name="descripcion1" placeholder="descripcion1" id="descripcion1" value="'.$data['descripcionRestaurante'].'" >
                </div>
                <div class="form-group">
                    <label class="label-control" >Descripcion de la pagina Perfil:</label>
                   <input type="text" class="form-control" name="descripcion2" id="descripcion2" placeholder="descripcion2" value="'.$data['informacionRestaurante'].'">
                </div>
            </div>  
            <div class="form-column col-lg-4 col-md-4 mb-4">
              
                
                <div class="form-group">
                    <label class="label-control" >Numero de Telefono 1:</label>
                    <input type="text" name="tel1" id="tel2" class="form-control" value="'.$data['tel1'].'" >
                </div>
                <div class="form-group">
                    <label class="label-control" >Numero de Telefono 2(OPCIONAL):</label>
                   <input type="text" name="tel2" id="tel2" class="form-control" value="'.$telef2.'">
                </div>

            </div>

    <div class="clearfix"></div>
                
                    <div class="col-md-8 col-sm-8 col-xs-8">
                      <label class="label-control">Direccion</label>
                      <input type="text" id="direccion" name="direccion" class="form-control" value="'.$data['direccion'].'">
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <br>
                        <div class="btn btn-success" id="btnMAPA"> Ubicacion Exacta.(OBLIGATORIO)</div>
                        <input type="hidden" name="lat" id="lati">
                        <input type="hidden" name="long" id="long">
                        <input type="hidden" name="prueba" id="prueba" value="'.$data['img'].'">
                    </div>

                

    <div class="clearfix"></div>
              <br><br><br><br>
                  <div class="col-xs-2 col-md-2 col-sm-2"></div>
                  <div id="botonFinal" class="col-sm-8 col-md-8 col-xs-8">

                      <div id="map" class="z-depth-1" style="height: 400px; width: 700px;"">
                        
                      </div>
                      <br><br>
                      <div class="clearfix"></div>

                      
                      <center>
                        <div class="btn btn-success" id="guardarInfo" > GUARDAR</div>
                      
                      <div class="btn btn-danger" id="cancelarInfo" > CANCELAR</div>

                      </center>

                      <br><br>

                </div>

              

    <div class="clearfix"></div>


      </div>';

         ?>



      

	</div>

	</body>
	<footer class="py-5 bg-dark">
      <div class="container">
         <p class="m-0 text-center text-white">Copyright &copy; MetroFood 2018</p>
      </div>
      <!-- /.container -->
    </footer>
</html>
<!----------------------MODA CropieL-------------------------------- -->
<div id="uploadimageModal" class="modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">ajustar tamaño de la imagen</h4>
          </div>
          <div class="modal-body">
            <div class="row">
            <div class="col-md-8 text-center">
              <div id="image_demo" style="width:350px; margin-top:30px"></div>
            </div>
            <div class="col-md-4" style="padding-top:30px;">
              <br />
              <br />
              <br/>
              <button class="btn btn-success crop_image">Guardar</button>
          </div>
        </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
      </div>
    </div>
</div>