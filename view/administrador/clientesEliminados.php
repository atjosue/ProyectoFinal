<?php 
  /*  session_start();
  if($_SESSION['ROl']=='1'){

  }else{
    session_destroy();
    header('location: ../../index.php');
  }
*/

 require_once'../../model/Usuario.php'; 
 
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Gestion de Clientes</title>
		
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




		<script type="text/javascript" src="../../resources/js/Clientes.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">MetroFood(ADMIN)</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item " >
        <a class="nav-link" href="gestion.php">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="gestionClientes.php">Gestionar Clientes</a>
      </li>
     <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
  -->
      
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
			
				<div class="col-md-9" style="margin-top: 10px;">
		            <p class="robo" style="font-weight: 300; margin-bottom: 0px; font-size: 30px;">Clientes</p>
		            <p class="robo" style="font-weight: 300; font-size: 14px; height: 40px;">Gesti&oacute;n  de clientes</p>
        		</div>
				<div class="col-md-3" style="margin-top: 10px;">
					<div class="btn-group pull-right">
	                   <a href="#" class="admin-menu-navi">
	                     
	                   </a>
                    </div>
				</div>
				<div class="clearfix"></div>
				 <div class="col-md-12" style="margin-top: 0px;">
					<table id="listadoClientes" class="mdl-data-table" cellspacing="1" width="100%">
				 		<thead>
				 			<th>ID</th>
				 			<th>Nombre de usuario </th>
				 			<th>Contraseña</th>
				 			<th>Fecha de ingreso</th>
              <th>Fecha de ultima modificacion</th>              
				 			<th>Acciones</th>
				 		</thead>
				 		<tbody>
				 		<?php 
			 				$objCliente = new Usuario();
			 				$data = $objCliente->getAllClientesEliminados();
			 				if ($data!=false) {
			 					foreach ($data as  $value) {
			 						
			 						echo "<tr>
                      <td>".$value['idUsuario']."</td>
			 								<td>".$value['usuario']."</td>
			 								<td>".$value['pass']."</td>
			 								<td>".$value['fechaCreacionUsuario']."</td>
			 								<td>".$value['fechaModificacionUsuario']."</td>
			 			
			 								<td>
			 									<input type='button' class='btn-primary btn-sm recuperarCliente' id='".$value['idUsuario']."' value='Recuperar'>
			 								</td>
			 						      </tr>";
			 					}
			 				}

			 			 ?>
				 			
				 		</tbody>
			 		</table>
			 	</div>
			
		</div>	
	</body>
	<footer class="py-5 bg-dark">
      <div class="container">
         <p class="m-0 text-center text-white">Copyright &copy; MetroFood 2018</p>
      </div>
      <!-- /.container -->
    </footer>
</html>


<!-- Modal de ingreso de Cliente -->
<div class="modal " id="modalRegistrar" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header " Style="height:45px;">
                    <span class="robo" style="font-size: 20px;">Agregar Cliente</span>
                </div>
                <div class="modal-body" >
                  
                      <div class="row" id="infoNuevoCliente">
                          <div class="form-column col-md-6 col-sm-4 col-xs-6">
                                 <div class="form-group required">
                                  <label for="nombre" class="control-label">Usuario</label>
                                 <input type="text" class="form-control"  
                                    placeholder="" name="usuario" id="usuario"  required="true">
                                 </div>
                          </div>
                           
                          <div class="form-column col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group required">
                              <label for="precio" class="control-label">Contraseña</label>            
                              <input type="password"  name="pass" class="form-control" id="pass" required>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                          <div class="form-column col-md-7 col-sm-7 col-xs-7">
                            <div class="form-group required">
                              <label for="descripcion" class="control-label">Confirmar Contraseña</label>            
                              <input type="password"  name="repass" class="form-control" id="repass" required >
                            </div>
                          </div>
                            
                          <div class="clearfix"></div>  
                          <div class="clearfix"></div>

                    </div>
                    <div>
                    <button class="btn btn-primary  btn-sm " id="agregarCliente" >Guardar</button>
                    <button class="btn btn-primary  btn-sm " id="cerrarModalNuevo" >Cancelar</button>
                    

                  </div>

              </div>         
               <div class="modal-footer" id="modalFooter" >
                  
               </div>
            </div>
        </div> 
</div> 

<!-- modal modificacion Cliente -->
<div class="modal " id="modalModificar" role="dialog"  >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header " Style="height:45px;">
                    <span class="robo" style="font-size: 20px;">Modificar Cliente</span>
                </div>
                <div class="modal-body" >
                  
                      <div class="row" id="infoModificarCliente">
                          <div class="form-column col-md-6 col-sm-4 col-xs-6">
                                 <div class="form-group required">
                                  <label for="nombre" class="control-label">Nombre</label>
                                 <input type="text" class="form-control"  
                                    placeholder="" name="usuario" id="modificarUsuario"  required="true">
                                 </div>
                          </div>
                           
                          <div class="form-column col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group required">
                              <label for="precio" class="control-label">Contraseña</label>            
                              <input type="password"  name="pass" class="form-control" id="modificarPass" required>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                          <div class="form-column col-md-7 col-sm-7 col-xs-7">
                            <div class="form-group required">
                              <label for="descripcion" class="control-label">Confirmar Contraseña</label>            
                              <input type="password"  name="repass" class="form-control" id="modificarRepass" required >
                            </div>
                          <input type="hidden" name="idUsuarioModi" id="idUsuarioModi">

                          </div>
                            
                          <div class="clearfix"></div>  
                          <div class="clearfix"></div>

                    </div>
                    <div>
                    <button class="btn btn-primary  btn-sm " id="modificarCliente" >Guardar</button>
                    <button class="btn btn-primary  btn-sm " id="cerrarModalModi" >Cancelar</button>
                    

                  </div>

              </div>         
               <div class="modal-footer" id="modalFooter" >
                  
               </div>
            </div>
        </div> 
</div> 

