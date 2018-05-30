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
<link rel="stylesheet" type="text/css" href="../../pluggins/dataTable/material.min.css">
<link rel="stylesheet" type="text/css" href="../../pluggins/dataTable/dataTables.material.min.css">
<link rel="stylesheet" type="text/css" href="../../pluggins/sweetalert-master/dist/sweetalert.css">

<!-- JS <script type="text/javascript" src="../../resources/js/Restaurante.js"></script>-->
<script type="text/javascript" src="../../pluggins/pluginess/jquery/jquery-3.3.1.js"></script>
<script type="text/javascript" src="../../pluggins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../pluggins/dataTable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../pluggins/dataTable/dataTables.material.min.js"></script>
<script type="text/javascript" src="../../pluggins/jQuery-Mask/src/jquery.mask.js"></script>
<script type="text/javascript" src="../../pluggins/sweetalert-master/dist/sweetalert.min.js"></script>  
  <script type="text/javascript" src="../../resources/js/dashboardRestaurante.js"></script>
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
    </ul>
   
    <li></li>
    <a href="../../app/cerrarSesion.php"><button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Cerrar sesión</button></a>
  </div>
</nav>

<!-- restarurantes -->
<div class="container">
  <br><br>
     <div class="row">

        <div class="col-md-9" style="margin-top: 10px;">
                <p class="robo" style="font-weight: 300; margin-bottom: 0px; font-size: 30px;">BIENVENIDO</p>
                
       </div>

       <div class="form-control col-md-3 col-xs-3 col-sm-3">

          <p id="hayPedido"></p>
       </div>
     </div>
<br><br><br><br>
     <div class="row col-md-12 col-sm-12 col-xs-12">
        <div class="btn btn-success rounded-circle" style="width: 180px; height: 180px; margin-left: -50px;" id="inicio">
            <br><br>
            <h3 >INICIAR</h3>
        </div>
        <div class="btn btn-primary rounded-circle" style="width: 180px; height: 180px; margin-left: -180px;" id="entrega">
            <br><br>
            <h3 >ENTREGADO</h3>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="form-control col-sm-4 col-md-4 col-xs-4" id="contInfo">
            <div class="form-group">
              <h5>Nombre del Cliente</h5>
              <h6 id="nombreC"> nose</h6>
            </div>
            <div class="form-group">
               <h5>Apellidos</h5>
               <h6 id="apellidoC"> tampoco</h6>
            </div>
            <div class="form-group">
              <h5>Numero de Telefono</h5>
              <h6 id="telefonoC">menos</h6>
            </div>
            <div class="form-group">
              <h5>Cantidad a Cobrar</h5>
              <h6 id="cantidadC">asaber</h6>
            </div>

        
        </div>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;
        <div class="form-control col-sm-5 col-md-5 col-xs-5" id="mapa">
            
           
        </div>




     </div>



</div>
</body>
<br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br>

 <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
         <p class="m-0 text-center text-white">Copyright &copy; MetroFood 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
   
</html>