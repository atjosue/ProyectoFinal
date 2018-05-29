$(document).ready(function(){
$("#modalIngresoProducto").hide();
$("#modalModificacionProducto").hide();
console.log("nombre de pruaba al inicio:");
console.log($("#prueba").val());
	
		$.ajax({
					type:'POST',
					data:{key:'first'},
					url:"../../controller/UsuarioController.php",
					success:function(data){

						console.log(data);
						if (data==true) {

							swal({
										title:"Bienvenido a METROFOOD!",
										text: "IMPORTANTE:\n\nLo primero que tienes que Hacer\n es editar tu perfil.",
										timer: 8000,
										type: 'warning',
										closeOnConfirm: false,
										closeOnCancel: false,

									});

							setTimeout(function(){
									 window.location.href = "../../view/Restaurante/perfilRestaurante.php";
								},6000);

						}
					}
				});
		$("#agregarProducto").on("click", function(){
			$("#modalIngresoProducto").show({backdrop: "static", keyboard: false});
				$("#nombre").val("");
				$("#descripcion").val("");
				$("#precio").val("");
				$("#cerrarAgregar").show();
				$("#upload_image").show();
				

				
		});

			
	//-------------------------Agregar combo

			$("#agregarCombo").on("click", function(){

				
				
				var dataProducto = JSON.stringify($('#infoProducto :input').serializeArray());
				console.log(dataProducto);
			
				$.ajax({
					type:'POST',
					dataType: 'json',
					data: {dataProducto,dataProducto,key:'agregar'},
					url:"../../controller/ProductoController.php",
					success : function(data){

					//info informacionn
					//error informacion
					//warning peligro

					if (data==true) {
						swal({
							title:"Combo Ingresado con Exito",
							timer: 1500,
							type: 'success',
							closeOnConfirm: true,
								closeOnCancel: true,

						});
						setTimeout(function(){
							location.reload();
						},1000);
					}else if (data==false) {
						swal({
							title:"Ocurrio un error al Guardar el Combo",
							timer: 1500,
							type: 'error',
							closeOnConfirm: true,
								closeOnCancel: true,

						});
						setTimeout(function(){
							location.reload();
						},1000);

					}
				}
				});
				$("#modalIngresoProducto").hide();
				
			});

			//cerrar modal agregar combo boton cancelar
			$("#cerrarAgregar").on("click", function(){

					$("#modalIngresoProducto").hide();				

			});

			//Croppie
			$image_crop = $('#image_demo').croppie({
			    enableExif: true,
			    viewport: {
			      width:200,
			      height:200,
			      type:'square' //circle
			    },
			    boundary:{
			      width:300,
			      height:300
			    }
			  });
	//----------------------ESTE ES EL ENCARRGADO DE SELECCIONAR LAS IMAGENES E INGRESARLAS-------------
			  $('#upload_image').on('change', function(){
			    var reader = new FileReader();
			    reader.onload = function (event) {
			      $image_crop.croppie('bind', {
			        url: event.target.result
			      }).then(function(){
			        console.log('jQuery bind complete');

			      });
			    }
			    reader.readAsDataURL(this.files[0]);
			    $('#uploadimageModal').modal('show');


			  });

    //----------------------------ESTO ES PARA QUE NO GUARDE OTRA IMAGEN SI YA HAY Y esto SE HACE EN boton GUARDAR --------------------
			  $('.crop_image').click(function(event){

				console.log("verificando lo que tiene PRUEBA:");
				console.log($("#prueba").val());
				

			  	if (($("#prueba").val()=="")) {

			  		
			  		var test;

			  			

						$image_crop.croppie('result', {

							      type: 'canvas',
							      size: 'viewport'
							    }).then(function(response){

							    	//ajax de asignado de nombre
							    	$.ajax({
			  				
											type:'POST',
											data:{key:'hora'},
											url:"../../controller/ProductoController.php",
											success:function(data){
												
												$("#prueba").val(data);
												console.log("no Habia en prueba pero se le coloca nombre:");
												console.log($("#prueba").val());
													
													nose=$("#prueba").val();

											     
											     //ajax de guardado de imagen

											    			 $.ajax({
															        url:"../../imagenes/img/upload.php",
															        type: "POST",
															        data:{nose,"image": response},
															        success:function(data)
															        {
															        	console.log("se ingreso con el nombre:")
															        	console.log(test);

															          $('#uploadimageModal').modal('hide');
															         //('#uploaded_image').html(data);

															         //$("#modalIngresoProducto").hide();
															         
															         //$('#upload_image').hide();
															         //$("#cerrarAgregar").hide();
															        }
															      });
											}
										});

							    	
							    			
									    	

							    	

							    	
							    })
			  		}else{

			  			$image_crop.croppie('result', {
						      type: 'canvas',
						      size: 'viewport'
						    }).then(function(response){
						    	var nose = $("#prueba").val();
						    	console.log(nose);
						      $.ajax({
						        url:"../../imagenes/img/upload.php",
						        type: "POST",
						        data:{nose,"image": response},
						        success:function(data)
						        {
						          $('#uploadimageModal').modal('hide');
						         //('#uploaded_image').html(data);

						         //$("#modalIngresoProducto").hide();
						         
						         //$('#upload_image').hide();
						         //$("#cerrarAgregar").hide();
						        }
						      });
						    })
						  			
			  			console.log($("#prueba").val());
			  			console.log("YA HABIA");

			  		}
	//----------------------------------------------------------------------------------------------------fin if
				/*$("#cerrar").on("click", function(){
				$("#modalIngresoProducto").hide();

				});*/
			    
			  });

	//------------------------------------------------------------------------------------------------FIN CROPIE

//EDICION DEL CLIENTE
$(document).on("click",".editarCombo",  function(){   
        

		var idComb = $(this).attr('id');
		console.log(idComb);

			$.ajax({
					type:'POST',
					dataType: 'json',
					data: {idComb,idComb,key:'solicitarInfo'},
					url:"../../controller/ProductoController.php",
					success : function(data){
								

									 $("#modalModificacionProducto").show({backdrop: "static", keyboard: false});
									 $("#prueba2").val(data.img);
									 $("#idComboModi").val(data.idCombo); 		
                                      $("#nombre2").val(data.nombreCombo);
                                      $("#precio2").val(data.precioCombo);
                                      $("#descripcion2").val(data.descripcionCombo);
                                      
					}
				});

			

			 $("#cerrarModalModi").on("click", function(){
				$("#modalModificacionProducto").hide();
			});
          
    });	

//tomando los datos del formulario para hacer el update
   $("#modificarCombo").on("click", function(){

     var dataCombo=  JSON.stringify($('#infoProductoModi :input').serializeArray());
     console.log(dataCombo);
        $.ajax({
                                    type: 'POST',
                                    async: false,
                                    dataType: 'json',
                                    data: {info:dataCombo, key:'modificar'},
                                    url: "../../controller/ProductoController.php",
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
   //---------------------fin de la modificacion de restaurantes----------------------

			//Croppie
			$image_crop2 = $('#image_demo2').croppie({
			    enableExif: true,
			    viewport: {
			      width:200,
			      height:200,
			      type:'square' //circle
			    },
			    boundary:{
			      width:300,
			      height:300
			    }
			  });
	//----------------------ESTE ES EL ENCARRGADO DE SELECCIONAR LAS IMAGENES E INGRESARLAS-------------
			  $('#upload_image2').on('change', function(){
			    var reader = new FileReader();
			    reader.onload = function (event) {
			      $image_crop2.croppie('bind', {
			        url: event.target.result
			      }).then(function(){
			        console.log('jQuery bind complete');

			      });
			    }
			    reader.readAsDataURL(this.files[0]);
			    $('#uploadimageModal2').modal('show');


			  });

    //----------------------------ESTO ES PARA QUE NO GUARDE OTRA IMAGEN SI YA HAY Y esto SE HACE EN boton GUARDAR --------------------
			  $('.crop_image2').click(function(event){

				console.log("verificando lo que tiene PRUEBA:");
				console.log($("#prueba2").val());
				

			  	if (($("#prueba2").val()=="")) {

			  		
			  		var test;

			  			

						$image_crop.croppie('result', {

							      type: 'canvas',
							      size: 'viewport'
							    }).then(function(response){

							    	//ajax de asignado de nombre
							    	$.ajax({
			  				
											type:'POST',
											data:{key:'hora'},
											url:"../../controller/ProductoController.php",
											success:function(data){
												
												$("#prueba2").val(data);
												console.log("no Habia en prueba pero se le coloca nombre:");
												console.log($("#prueba2").val());
													
													nose=$("#prueba2").val();

											     
											     //ajax de guardado de imagen

											    			 $.ajax({
															        url:"../../imagenes/img/upload.php",
															        type: "POST",
															        data:{nose,"image": response},
															        success:function(data)
															        {
															        	console.log("se ingreso con el nombre:")
															        	console.log(test);

															          $('#uploadimageModal2').modal('hide');
															         //('#uploaded_image').html(data);

															         //$("#modalIngresoProducto").hide();
															         
															         //$('#upload_image').hide();
															         //$("#cerrarAgregar").hide();
															        }
															      });
											}
										});

							    	
							    			
									    	

							    	

							    	
							    })
			  		}else{

			  			$image_crop.croppie('result', {
						      type: 'canvas',
						      size: 'viewport'
						    }).then(function(response){
						    	var nose = $("#prueba2").val();
						    	console.log(nose);
						      $.ajax({
						        url:"../../imagenes/img/upload.php",
						        type: "POST",
						        data:{nose,"image": response},
						        success:function(data)
						        {
						          $('#uploadimageModal2').modal('hide');
						         //('#uploaded_image').html(data);

						         //$("#modalIngresoProducto").hide();
						         
						         //$('#upload_image').hide();
						         //$("#cerrarAgregar").hide();
						        }
						      });
						    })
						  			
			  			console.log($("#prueba2").val());
			  			console.log("YA HABIA");

			  		}
	//----------------------------------------------------------------------------------------------------fin if
				/*$("#cerrar").on("click", function(){
				$("#modalIngresoProducto").hide();

				});*/
			    
			  });

	//------------------------------------------------------------------------------------------------FIN CROPIE

   //---------------------eliminacion de combo----------------------------------
     $(document).on("click",".desactivarCombo",  function(){   

    var idCombo = $(this).attr('id');

                                      swal({
                                                    title: "Advertencia",
                                                    text: "¿Estas seguro de eliminar este Combo? Si aceptas removerlo, no habra forma de recuperar los datos posteriormente",
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
                                          data: {idCombo:idCombo, key:'eliminar'},
                                          url: "../../controller/ProductoController.php",
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
     //----------------------------fin de la eliminacion--------------------------
   		  


});