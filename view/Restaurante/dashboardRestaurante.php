<?php 
 /* session_start();
  if($_SESSION['TIPO']=='2'){

  }else{
    session_destroy();
    header('location: ../../index.php');
  }
*/
  require_once'../../model/Producto.php';
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Restaurante</title>
    <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="../../pluggins/bootstrap/css/bootstrap.css">
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


  <script type="text/javascript" src="../../resources/js/Producto.js"></script>

  <!-- croppie -->

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
      <li class="nav-item">
        <a class="nav-link" href="combosDesactivados.php">Combos Desactivados</a>
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
  <br>  <br> 

  <div class="row">
        <div class="col-md-9" style="margin-top: 30px;">
                <p class="robo" style="font-weight: 300; margin-bottom: 0px; font-size: 30px;"><?php session_start(); echo $_SESSION['USUARIO']; ?>, Bienvenidos!!.</p>
        </div>
       <div class="col-md-3" style="margin-top: 30px;">
          <div class="btn-group pull-right">
                     <a href="#" class="admin-menu-navi">
                        <button class="btn btn-primary   " style="margin-left: 5px;" id="agregarProducto">Nuevo</button>
                     </a>
                     <a href="#" class="admin-menu-navi">
                        <button class="btn btn-primary   " style="margin-left: 5px;" id="Eliminados">Eliminados</button>
                     </a>
          </div>
       </div>
  </div>


  

  <br>  <br> 
  <br>  <br> 

     <div class="row text-center">

            <?php 

              $objProducto =  new Producto();
              $data = $objProducto->getAll();
              //$datos = $data->fetch_assoc();
              $br = 4;
              $cont=0;

//x
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
                              <h4 class="card-title">"'.$value['nombreCombo'].'"</h4>
                              <p class="card-text"></p>
                            </div>
                            <div class="card-footer">
                              <a  class="btn btn-primary editarCombo" id="'.$value['img'].'" value="Editar">Editar</a>
                              <a  class="btn btn-outline-danger desactivarCombo" id="'.$value['img'].'" value="Eliminar">Desactivar</a>
                            </div>
                          </div>
                        </div>';
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



<!-- Modal de unsercion de Producto -->
<div class="modal " id="modalIngresoProducto" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header " Style="height:45px;">
                    
                    <span class="robo" style="font-size: 20px;">Agregar Combo</span>
                </div>
                <div class="modal-body" >
                  
                      <div class="row" id="infoProducto">
                          <div class="form-column col-md-6 col-sm-4 col-xs-6">
                                 <div class="form-group required">
                                  <label for="nombre" class="control-label">Nombre</label>
                                 <input type="text" class="form-control"  
                                    placeholder="" name="nombre" id="nombre"  required="true">
                                 </div>
                          </div>
                           
                          <div class="form-column col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group required">
                              <label for="precio" class="control-label">Precio</label>            
                              <input type="text"  name="precio" class="form-control" id="precio" required>
                            </div>
                          </div>
                           <div class="form-column ">
                            <div class="form-group required">
                              <label for="prueba" class="control-label"></label>            
                   <input type="hidden"  name="prueba" class="form-control" id="prueba">
                            </div>
                          </div>
                          <div class="clearfix"></div>
                          <div class="form-column col-md-7 col-sm-7 col-xs-7">
                            <div class="form-group required">
                              <label for="descripcion" class="control-label">Descripción</label>            
                              <input type="text"  name="descripcion" class="form-control" id="descripcion" required >
                            </div>
                          </div>
                            
                            <div class="clearfix"></div>
                              <div class="clearfix"></div>
                          <div class="form-column col-md-4 col-sm-4 col-xs-4 btn-file" >
                            <input class="form-control-file" type="file" name="upload_image" id="upload_image"  />
                          </div>

            
                          <div class="clearfix"></div>

                    </div>
                    <div>
                    <button class="btn btn-primary  btn-sm " id="agregarCombo" >Guardar</button>
                    <button class="btn btn-primary  btn-sm " id="cerrarAgregar" >Cancelar</button>
                    

                  </div>

              </div>         
               <div class="modal-footer" id="modalFooter" >
                  
               </div>
            </div>
        </div> 
</div>    
<!-- modal croppie -->
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

<!-- Modal de modificacion de Producto -->
<div class="modal " id="modalModificacionProducto" role="dialog" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header " Style="height:45px;">
                    
                    <span class="robo" style="font-size: 20px;">Modificar Combo</span>
                </div>
                <div class="modal-body" >
                  
                      <div class="row" id="infoProductoModi">
                          <div class="form-column col-md-6 col-sm-4 col-xs-6">
                                 <div class="form-group required">
                                  <label for="nombre" class="control-label">Nombre</label>
                                 <input type="text" class="form-control"  
                                    placeholder="" name="nombre" id="nombre2"  required="true">
                                 </div>
                          </div>
                           
                          <div class="form-column col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group required">
                              <label for="precio" class="control-label">Precio</label>            
                              <input type="text"  name="precio" class="form-control" id="precio2" required>
                            </div>
                          </div>
                           <div class="form-column ">
                            <div class="form-group required">
                              <label for="prueba" class="control-label"></label>            
                   <input type="hidden"  name="prueba2" class="form-control" id="prueba2">
                            </div>
                          </div>
                          <div class="clearfix"></div>
                          <div class="form-column col-md-7 col-sm-7 col-xs-7">
                            <div class="form-group required">
                              <label for="descripcion" class="control-label">Descripción</label>            
                              <input type="text"  name="descripcion" class="form-control" id="descripcion2" required >
                            </div>
                          </div>
                            
                            <div class="clearfix"></div>
                              <div class="clearfix"></div>
                          <div class="form-column col-md-4 col-sm-4 col-xs-4 btn-file" >
                            <input class="form-control-file" type="file" name="upload_image2" id="upload_image2"/>
                          </div>
                          <input type="hidden" name="idComboModi" id="idComboModi">
            
                          <div class="clearfix"></div>

                    </div>
                    <div>
                    <button class="btn btn-primary  btn-sm " id="modificarCombo" >Guardar</button>
                    <button class="btn btn-primary  btn-sm " id="cerrarModalModi" >Cancelar</button>
                    

                  </div>

              </div>         
               <div class="modal-footer" id="modalFooter" >
                  
               </div>
            </div>
        </div> 
</div> 

<!-- modal croppie2 -->
<div id="uploadimageModal2" class="modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">ajustar tamaño de la imagen</h4>
          </div>
          <div class="modal-body">
            <div class="row">
            <div class="col-md-8 text-center">
              <div id="image_demo2" style="width:350px; margin-top:30px"></div>
            </div>
            <div class="col-md-4" style="padding-top:30px;">
              <br />
              <br />
              <br/>
              <button class="btn btn-success crop_image2">Guardar</button>
          </div>
        </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
      </div>
    </div>
</div>
