$(document).ready(function(){
	/*******************MAPA**************/
	$("#botonFinal").hide();


				$("#btnMAPA").on("click",function(){
					

					$("#botonFinal").show();
					console.log("nombre de la imagen:");
						console.log($("#prueba").val());

				});

				$("#cancelarInfo").on("click", function(){
					console.log("cerrar mapa");

					$("#botonFinal").hide();

				});


	/*****************************subtotales********************/
	var cantIni;
	cantIni=1;
	$("#cont2").val("");

	console.log(cantIni);
	$(document).on("change",".cantidad", function(){

			var idCant=$(this).attr("id");
			var idCombo=$(this).attr("name");
			var x = document.getElementById(idCant).value;
			var sub = document.getElementById(idCant).value;
			var tot = document.getElementById(idCant).value;
			console.log(x);

			$.ajax({

				type:'POST',
				dataType: 'json',
				data: {x,x,idCombo,idCombo, key:'cantidad'},
				url:"../../controller/carritoController.php",
				success : function(data){
					if (data) {
						console.log("paso el uno");
							$.ajax({
								type:'POST',
								dataType: 'json',
								data: {idCombo,idCombo, key:'subtotal'},
								url:"../../controller/carritoController.php",
								success : function(dato){
									if (dato) {
										console.log("paso el dos");
										$.ajax({
											type:'POST',
											dataType: 'json',
											data: {key:'total'},
											url:"../../controller/carritoController.php",
											success : function(dati){
												if (dati) {
													console.log("paso el tres");
													console.log(dato.total);
													$('#total').val(dati.total);
												}
											}
										});	
									}
								}
							});						
					}
				}
			});



	});
	/*******************************FIN *************************/

	/***********************************BOTONES DE ELIMINAR *******************************/

	$(document).on("click",".eliminarCombo", function(){
		var idCombo=$(this).attr('id');
		
		var ini='#';
		var fin = ini.concat(idCombo);
		console.log(fin);

		$(fin).on("click",function(){

				 swal({
                       title: "Advertencia",
                       text: "¿Estas seguro de eliminar este Combo del Carrito?\n Si aceptas removerlo, no habra forma de recuperar los datos posteriormente",
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
									type:'POST',
									data:{idCombo,idCombo,key:'quitar'},
									url:"../../controller/carritoController.php",
										success:function(data){
											if (data==true) {
                                          swal({
                                                  title: "Exito!",
                                                  text: "Combo ELiminado del Carrito",
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
                                                  title: "Ha ocurrido un Error!",
                                                  text: "Ponte en contacto con MetroFood!!",
                                                  timer: 1500,
                                                  type: 'error',
                                                  closeOnConfirm: true,
                                                          closeOnCancel: true
                                                });
                                        }
									}
								});                    

                               } else {
                            }
                          });  
		});
	});

});