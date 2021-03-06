<?php 
  /*  session_start();
  if($_SESSION['ROl']=='1'){

  }else{
    session_destroy();
    header('location: ../../index.php');
  }
*/
   require_once'../../model/Orden.php'; 
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Ordenar</title>
  <!-- CSS -->
<link rel="stylesheet" type="text/css" href="../../pluggins/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../pluggins/dataTable/material.min.css">
<link rel="stylesheet" type="text/css" href="../../pluggins/dataTable/dataTables.material.min.css">
<link rel="stylesheet" type="text/css" href="../../pluggins/sweetalert-master/dist/sweetalert.css">

<!-- JS -->
<script type="text/javascript" src="../../pluggins/pluginess/jquery/jquery-3.3.1.js"></script>
<script type="text/javascript" src="../../pluggins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../pluggins/dataTable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../pluggins/dataTable/dataTables.material.min.js"></script>
<script type="text/javascript" src="../../pluggins/jQuery-Mask/src/jquery.mask.js"></script>
<script type="text/javascript" src="../../pluggins/sweetalert-master/dist/sweetalert.min.js"></script>  
<script type="text/javascript" src="../../resources/js/ordenarCliente.js" ></script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNh2ZPVxLNmV1o8KV6isxchmm9sSZUCwI&callback=initMap">
    </script>
    <script type="text/javascript" src="../../resources/js/ubicar.js" ></script>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="navbar-brand" href="#">MetroFood</div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto"> 
    <li class="nav-item active">
        <a class="nav-link" href="dashBoardCliente.php"><p style="font-size: 20px; margin-top: 9px"> &nbsp; &nbsp;   Inicio </p> </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="verPedidoCliente.php"><p style="font-size: 20px; margin-top: 9px"> &nbsp; &nbsp;   Mis Pedidos</p> </a>
      </li>
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
  <div  class="col-md-12"></div>
  <div class="clearfix"></div>
 

    <div class="container">
      
        <div class="col-md-9" style="margin-top: 10px;">
                <p class="robo" style="font-weight: 300; margin-bottom: 0px; font-size: 30px;">Pedidos</p>
            </div>
        <div class="col-md-3" style="margin-top: 10px;">
         
        </div>
        <div class="clearfix"></div>
         <div class="col-md-12" style="margin-top: 0px;">
          
              
            <?php 
              $objOrden = new Orden();
              $data = $objOrden->getAllOrdenCliente();

              if ($data!=false) {
                $idCont=0.5;
                $idCont2='a';
                $conCantidades=1;

                foreach ($data as  $value) {
                 echo '<div class="row">
                      <div style="width: 400px; height:300px;" class="form-control" id="map'.$value['idOrden'].'">
                          acaira el mapa
                    </div >
                         <script>
                            function initMap() {
        var cliente'.$value['idOrden'].' = {lat: '.$value['latRestaurante'].', ln:'.$value['lonRestaurante'].' };
        var restaurante'.$value['idOrden'].' = {lat: '.$value['latCliente'].', lng: '.$value['lonCliente'].'};
                              var map = new google.maps.Map(document.getElementById("map'.$value['idOrden'].'"), {
                                zoom: 4,
                                center: uluru
                              });
                              var marker1 = new google.maps.Marker({
                                position: cliente'.$value['idOrden'].',
                                map: map
                              });
                               var marker2 = new google.maps.Marker({
                                position: restaurante'.$value['idOrden'].' ,
                                map: map
                              });
                            }
                          </script>
                      </script>
                    <div class="form-control col-sm-6 col-md-6 col-xs-8">
                      <table id="listadoClientes" class="mdl-data-table" cellspacing="1" >
                            <thead>
                              
                              <th>Nombre del Combo </th>
                              <th>Precio</th>
                              <th>Cantidad</th>              
                              <th>Subtotal</th>
                              
                            </thead>
                            <tbody>';
                        

                            $ObjDetalle = new DetalleOrden();
                            $data=$ObjDetalle->getAllDetalleCliente($value['idOrden']);

                            foreach ($data as  $value) {
                              echo "
                                  <tr>
                                      <td>".$value['nombreCombo']."</td>
                                      <td>".$value['precioCombo']."</td>
                                      <td>".$value['cantidad']."</td>
                                      <td>".$value['subtotal']."</td>
                                    </tr>";
                            }
                         
                       echo '  </tbody>
                       </table>
                    </div>  
                </div>';

                }//termina el foreach

              }else{

                echo '<script type="text/javascript">
                                       swal({
                                                  title: " OH OOH!!!",
                                                  text: " Aun no tienes pedidos",
                                                  timer: 1900,
                                                  type: "warning",
                                                  closeOnConfirm: true,
                                                          closeOnCancel: true
                                                });
                                          setTimeout( function(){ 
                                              $(location).attr("href","../../view/cliente/dashBoardCliente.php");
                                          }, 1000 );
            </script>';

              }


             ?>
         

          <br><br>
          <div class="clearfix"></div>
                   <div class="btn btn-success" id="recibido" > Pedido Recibido.</div>
  

            </div>
          </div>
          <br><br>
        </div>
        <div class="row">
             <div class="clearfix"></div>
              <br><br><br><br>
                  <div class="col-xs-2 col-md-2 col-sm-2"></div>

          
      
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