$(document).ready(function(){

	$("#MAPA").hide();

	//DASHBORAD Clientes
	 		$("#listadoClientes").DataTable({
			    "language": {
			        "sProcessing":    "Procesando...",
			        "sLengthMenu":    "Mostrar _MENU_ registros",
			        "sZeroRecords":   "No se encontraron resultados",
			        "sEmptyTable":    "Ningún dato disponible en esta tabla",
			        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
			        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
			        "sInfoPostFix":   "",
			        "sSearch":        "Buscar:",
			        "sUrl":           "",
			        "sInfoThousands":  ",",
			        "sLoadingRecords": "Cargando...",
			        "oPaginate": {
			            "sFirst":    "Primero",
			            "sLast":    "Último",
			            "sNext":    "Siguiente",
			            "sPrevious": "Anterior"
			        },
			        "oAria": {
			            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
			        }
			    }
			});

	//FIN DASHBOARD

	//INICIO DEL VIEW REGISTRAR CLIENTE

	//verificar si el usuario ya existe.

	

	//FIN DEL VIEW REGISTRAR CLIENTE

//EDICION DEL CLIENTE
$(document).on("click",".editarCliente",  function(){   
        

		var idUsuario = $(this).attr('id');
		console.log(idUsuario);

			$.ajax({
                                    type: 'POST',
                                   
                                    dataType: 'json',
                                    data: {idUsuario:idUsuario, key:'solicitarInfo'},
                                    url: "../../controller/UsuarioController.php",
                                    success: function (data)
                                    {
                                    	console.log("cualquier:");
                                    	console.log(data);
                                      $("#idUsuarioModi").val(data.idUsuario)
                                      $("#modificarUsuario").val(data.usuario);
                                  
                                     //  $("#pass").val(data.idRol);

                                     $("#modalModificar").show();
                                         
                                        
                                    },
                                    error: function (xhr, status)
                                    {
                      
                                    }
                                        
                       });

			$("#cerrarModalModi").on("click", function(){
			$("#modalModificar").hide();
		});
          
    });


//tomando los datos del formulario para hacer el update
   $("#modificarCliente").on("click", function(){

     var dataUsuario=  JSON.stringify($('#infoModificarCliente :input').serializeArray());

        $.ajax({
                                    type: 'POST',
                                    async: false,
                                    dataType: 'json',
                                    data: {info:dataUsuario, key:'modificar'},
                                    url: "../../controller/UsuarioController.php",
                                    success: function (data)
                                    {
                                        if (data.estado==true) {
                                          swal({
                                                  title: "Exito!",
                                                  text: data.descripcion,
                                                  timer: 1500,
                                                  type: 'success',
                                                  closeOnConfirm: true,
                                                          closeOnCancel: true
                                                });
                                          setTimeout( function(){ 
                                              location.reload();
                                          }, 1000 );
                                          
                                        }else{
                                            swal({
                                                  title: "Error!",
                                                  text: data.descripcion,
                                                  timer: 1500,
                                                  type: 'error',
                                                  closeOnConfirm: true,
                                                          closeOnCancel: true
                                                });
                                        }
                                         
                                        
                                    },
                                    error: function (xhr, status)
                                    {
                      
                                    }
                                        
                       });

  });
   //---------------------fin de la modificacion de CLIENTE----------------------

      //---------------------ELIMINACION de resaurantes----------------------------------
     $(document).on("click",".eliminarCliente",  function(){   

    var idUsuario = $(this).attr('id');

                                      swal({
                                                    title: "Advertencia",
                                                    text: "¿Estas seguro de eliminar este registro? Si aceptas removerlo, no habra forma de recuperar los datos posteriormente",
                                                    type: "warning",
                                                    showCancelButton: true,
                                                    cancelButtonText: "No",
                                                    confirmButtonText: "Si",
                                                    confirmButtonColor: "#00A59D",
                                                    closeOnConfirm: true,
                                                    closeOnCancel: true
                                                },
                                function (isConfirm) {
                                  if (isConfirm) {
                                    $.ajax({
                                          type: 'POST',
                                          async: false,
                                          dataType: 'json',
                                          data: {idUsuario:idUsuario, key:'eliminar'},
                                          url: "../../controller/UsuarioController.php",
                                          success: function (data)
                                          {
                                            if (data.estado==true) {
                                          swal({
                                                  title: "Exito!",
                                                  text: data.descripcion,
                                                  timer: 1500,
                                                  type: 'success',
                                                  closeOnConfirm: true,
                                                          closeOnCancel: true
                                                });
                                          setTimeout( function(){ 
                                              location.reload();
                                          }, 1000 );
                                          
                                        }else{
                                            swal({
                                                  title: "Error!",
                                                  text: data.descripcion,
                                                  timer: 1500,
                                                  type: 'error',
                                                  closeOnConfirm: true,
                                                          closeOnCancel: true
                                                });
                                        }
                                               
                                              
                                          },
                                          error: function (xhr, status)
                                          {
                            
                                          }
                                        
                                          });                           
                                                          

                                    } else {
                                                                
                                                                
                                                                
                                            }
                                                            
                                                            
                          });        
    });
     //----------------------------fin de la recuperacion--------------------------

  //---------------------recuperacion de clientes----------------------------------
     $(document).on("click",".recuperarCliente",  function(){   

    var idUsuario = $(this).attr('id');

                                      swal({
                                                    title: "Advertencia",
                                                    text: "¿Desea volver activar este Usuario en el sistema",
                                                    showCancelButton: true,
                                                    cancelButtonText: "No",
                                                    confirmButtonText: "Si",
                                                    confirmButtonColor: "#00A59D",
                                                    closeOnConfirm: true,
                                                    closeOnCancel: true
                                                },
                                function (isConfirm) {
                                  if (isConfirm) {
                                    $.ajax({
                                          type: 'POST',
                                          async: false,
                                          dataType: 'json',
                                          data: {idUsuario:idUsuario, key:'recuperar'},
                                          url: "../../controller/UsuarioController.php",
                                          success: function (data)
                                          {
                                            if (data.estado==true) {
                                          swal({
                                                  title: "Exito!",
                                                  text: data.descripcion,
                                                  timer: 1500,
                                                  type: 'success',
                                                  closeOnConfirm: true,
                                                          closeOnCancel: true
                                                });
                                          setTimeout( function(){ 
                                              location.reload();
                                          }, 1000 );
                                          
                                        }else{
                                            swal({
                                                  title: "Error!",
                                                  text: data.descripcion,
                                                  timer: 1500,
                                                  type: 'error',
                                                  closeOnConfirm: true,
                                                          closeOnCancel: true
                                                });
                                        }
                                               
                                              
                                          },
                                          error: function (xhr, status)
                                          {
                            
                                          }
                                        
                                          });                           
                                                          

                                    } else {
                                                                
                                                                
                                                                
                                            }
                                                            
                                                            
                          });        
    });
     //----------------------------fin de la recuperacion--------------------------

});