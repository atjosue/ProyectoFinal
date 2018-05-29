<?php 
    
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Redistrarse</title>
<link rel="stylesheet" type="text/css" href="../../pluggins/plugins/bootstrap/css/bootstrap.css">
<script src="../../pluggins/plugins/JQuery/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../../pluggins/plugins/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="../../resources/js/RegistroClientes.js" ></script>
<link rel="stylesheet" type="text/css" href="../../pluggins/sweetalert-master/dist/sweetalert.css">
<script type="text/javascript" src=".././../pluggins/sweetalert-master/dist/sweetalert.min.js" ></script>

</head>
<body background="">
 <center>
    <div class="container">
    <br>
  <div class="form-column col-md-3 col-sm-3 col-xs-3" ></div>
        <div class="card card-container form-column col-md-6 col-sm-6 col-xs-6" >
           

            <img id="profile-img" class="profile-img-card" src="../../imagenes/iconos/moto.png" />

            <div class="content-form">
                <h1>¿Que Esperas? <br> <h3>Registrate y Ordena<h3></h1>
            <h5> ¿Ya tienes una Cuenta? <a href="../login/login.php">Inicia Sesion</a></h5>
           
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="POST" action="validacion.php" id="infoUsuario">
                
               <div class="form-group">
                   <div class=" form- column col-md-6 col-xs-6 col-sm-6">
                        <input type="text" name="inputUser" class="form-control" placeholder="Nombres:" id="nombre" required autofocus>
                   </div>
                   
                   <div class=" form- column col-md-6 col-xs-6 col-sm-6">
                        <input type="text" name="inputUser" class="form-control" placeholder="Apellidos:" id="apellidos" required >
                   </div>
               </div>
               <br><br>


        <div class="clearfix"></div>
                       
                <div class=" form- column col-md-12 col-xs-12 col-sm-12">
                 <input type="text" name="inputUser" class="form-control" placeholder="Direccion:" id="direccion" required >
               </div>
               <br><br>

        <div class="clearfix"></div>

                <div class="form-group">
                    <div class=" form- column col-md-4 col-xs-4 col-sm-4">
                        <input type="text" name="inputUser" class="form-control" placeholder="Usuario:" id="usuario" required >
                   </div>

                   
                   <div class=" form- column col-md-4 col-xs-4 col-sm-4">
                        <input type="text" name="inputUser" class="form-control" placeholder="Telefono:" id="telefono" required >
                   </div>

                   <div class=" form- column col-md-4 col-xs-4 col-sm-4">
                       <input type="email" name="inputUser" class="form-control" placeholder="Correo Electronico: " id="correo" required>
                   </div>
                </div>
                <br><br>

         <div class="clearfix"></div>
               <div class=" form- column col-md-4 col-xs-4 col-sm-4">
                <input type="password" name="inputPass" class="form-control" placeholder="Contraseña:" id="contra" required>
               </div>

               <div class=" form- column col-md-4 col-xs-4 col-sm-4">
                   <input type="password" name="inputPass" class="form-control" placeholder="Repetir Contraseña:" id="recontra" required>
               </div>
                <div class=" form- column col-md-4 col-xs-4 col-sm-4">
                   <input type="password" name="inputPass" class="form-control" placeholder="ACA IRA EL RECAPTCHA:" id="" required>
               </div>
        <div class="clearfix"></div>
               
                <div id="remember" class="checkbox">
                    <label>
                    </label>
                </div>

                <div class="btn btn-lg btn-primary btn-block btn-signin " type="submit" name="login" value="Registrate" id="Registrarse">Registrarse</div>
            </form><!-- /form -->
            </br>     
            
        </div><!-- /card-container -->
      </div>
    </div><!-- /container -->
</center>

</body>
</html>


<div id="MAPA" class="modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <div height="200px" width="200px">
           <!-- <script>

                  function initMap() {
                    var map = new google.maps.Map(document.getElementById('map'), {
                      center: {lat: -34.397, lng: 150.644},
                      zoom: 6
                    });
                    var infoWindow = new google.maps.InfoWindow({map: map});

                    // Try HTML5 geolocation.
                    if (navigator.geolocation) {
                      navigator.geolocation.getCurrentPosition(function(position) {
                        var pos = {
                          lat: position.coords.latitude,
                          lng: position.coords.longitude
                        };

                        infoWindow.setPosition(pos);
                        infoWindow.setContent('Location found.');
                        map.setCenter(pos);
                      }, function() {
                        handleLocationError(true, infoWindow, map.getCenter());
                      });
                    } else {
                      // Browser doesn't support Geolocation
                      handleLocationError(false, infoWindow, map.getCenter());
                    }
                  }

                  function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                    infoWindow.setPosition(pos);
                    infoWindow.setContent(browserHasGeolocation ?
                                          'Error: The Geolocation service failed.' :
                                          'Error: Your browser doesn\'t support geolocation.');
                  }
                </script>
                <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNh2ZPVxLNmV1o8KV6isxchmm9sSZUCwI&callback=initMap">
            </script>-->


        </div>
         
      </div>
    </div>
</div>


