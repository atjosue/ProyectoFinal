<?php 
  /*  session_start();
  if($_SESSION['ROl']=='1'){

  }else{
    session_destroy();
    header('location: ../../index.php');
  }
*/

   require_once'../../model/Carrito.php'; 
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
                <p class="robo" style="font-weight: 300; margin-bottom: 0px; font-size: 30px;">Ordenar</p>
            </div>
        <div class="col-md-3" style="margin-top: 10px;">
          <div class="btn-group pull-right">
                     <div>
                       <button class="btn btn-success  btn-sm " style="margin-left: 5px;" id="ordenar">Ordenar </button>
                     </div>
                     <div>
                       <button class="btn btn-danger  btn-sm " style="margin-left: 5px;" id="cancelar">Cancelar</button>
                     </div>   
                        
                        <br><br>
                       
                    
          </div>
        </div>
        <div class="clearfix"></div>
         <div class="col-md-12" style="margin-top: 0px;">
          <table id="listadoClientes" class="mdl-data-table" cellspacing="1" width="100%">
            <thead>
              
              <th>Nombre del Combo </th>
              <th>Precio</th>
              <th>Cantidad</th>              
              <th>Subtotal</th>
              <th>Acciones</th>
            </thead>
            <tbody>
              
            <?php 
              $objCarrito = new Carrito();
              $data = $objCarrito->extraerCombos();
              if ($data!=false) {
                $idCont=0.5;
                $idCont2='a';
                foreach ($data as  $value) {
                  
                  echo "<tr>
                      <td>".$value['nombreCombo']."</td>
                      <td>".$value['precio']."</td>
                      <td>".'<input type="number" id="'.$idCont2.'" name="'.$value['idCombo'].'" min="1" max="15" class="cantidad" value="1" >'."</td>
                      <td>".'<p id="'.$idCont.'" class="subtotal" name="">algo</p>'."</td>
                      <td>
                        <input type='button' class='form-control btn-outline-warning btn-xs eliminarCombo' id='".$value['idCombo']."' value='Quitar'>
                      </td>
                        </tr>";
                        $idCont++;
                        $idCont2++;
                }

              }


             ?>
          <thead>
              
              <th></th>
              <th></th>
              <th>Total</th> 

              <th></th>
              <th><input class="form-control col-xs-3 col-md-3 col-sm-3" type="text" id="total" name="total" readonly="true" ></th>
            </thead>
            </tbody>

          </table>
         

          <br><br>
          <div class="clearfix"></div>
          <div class="col-md-8 col-sm-8 col-xs-8">

                      <label class="label-control">Direccion</label> 
                      <input type="text" id="direccion" name="direccion" class="form-control" value="Direccion de referencia">
                    </div>

          <div class="col-md-4 col-sm-4 col-xs-4">              
                        <div class="btn btn-success" id="btnMAPA"> Ubicacion Exacta.(OBLIGATORIO)</div>
                        <input type="hidden" name="lat" id="lati">
                        <input type="hidden" name="long" id="long">
                    </div>
          <br><br>
        </div>
        <div class="row">
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