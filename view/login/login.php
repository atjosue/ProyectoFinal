<!DOCTYPE html>
<html>
<head>
  <title></title>

<link rel="stylesheet" type="text/css" href="../../pluggins/plugins/bootstrap/css/bootstrap.css">
<script src="../../pluggins/plugins/JQuery/jquery-3.3.1.min.js"></script>
<script src="../../pluggins/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../resources/js/login.js"></script>
<link rel="stylesheet" type="text/css" href="../../pluggins/sweetalert-master/dist/sweetalert.css">
<script type="text/javascript" src="../../pluggins/sweetalert-master/dist/sweetalert.min.js"></script>

</head>
<body background="">
 <center><div class="container">
<br><br><br><br><br><br>
  <div class="form-column col-md-4 col-sm-4 col-xs-4" ></div>
        <div class="card card-container form-column col-md-3 col-sm-3 col-xs-3" >
           

            <img id="profile-img" class="profile-img-card" src="../../imagenes/iconos/moto.png" />

            <div class="content-form">
                <h1>Inicia Sesión</h1>
            <h4>¿METROFOOD? <a href="../cliente/registrarse.php">Regístrate</a></h4>
           
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="POST" id="infoUsuario">
                <span id="reauth-user" class="reauth-user"></span>
                <input type="text" name="user" class="form-control" placeholder="Usuario" value="" required autofocus id="user">
                <input type="password" name="pass" class="form-control" placeholder="Password" value="" required id="pass">
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me" name="recordar"> Recordarme
                    </label>
                </div>
                <div class="btn btn-lg btn-primary btn-block btn-signin"  id="logina">Iniciar Sesion</div>
            </form><!-- /form -->
            <a href="#" class="forgot-password">
                Olvidaste la contraseña?
            </a>
        </div><!-- /card-container -->
      </div>
    </div><!-- /container -->
</center>

</body>
</html>