
$(document).ready(function(){

	$("#comboView").hide();




//***************************************************Capturar id para abrir informacion en el modal COMBO**********************************

	

			$(document).on("click",".agregarACarrito", function(){
		 	var idUsuario = $(this).attr("id");
			console.log(idUsuario);		 
		 		$.ajax({

				type:'POST',
				dataType: 'json',
				data: {idUsuario,idUsuario,key:'traerCombo'},
				url:"../../controller/ProductoController.php",
				success : function(data){

					$("#nombrePre").val(data.nombreCombo);
					$("#idComboPre").val(data.idCombo);
					$("#precioPre").val(data.precioCombo);
				
					$("#nombreLeer").text(data.nombreCombo);
					$("#descripcionLeer").html(data.descripcionCombo);
					$("#precioLeer").html("<br>$".concat(data.precioCombo));
					$("#comboView").show();
					
				}
			});

		 	





//----------------------------------------------------- cerrar modales.

		$(".close").on("click",function(){

				$("#comboView").hide();

		});
		

	});
//******************************************************Fin de captura de id para el modal COMBO**************************************

//****************************************************BOTON AGREGAR AL CARRITO******************************************************
	

			


			$("#EnviarACarrito").on("click", function(){
			
			var formDatos = JSON.stringify($('#formDatos :input').serializeArray());


				$.ajax({

						type:'POST',
						dataType: 'json',
						data: {formDatos,formDatos,key:'Acarrito'},
						url:"../../controller/ProductoController.php",
						success : function(data){

							//info informacionn
							//error informacion
							//warning peligro

							if (data) {
								swal({
									title:"Exito!",
									text: "El combo se ha agregado al carrito",
									timer: 1800,
									type: 'success',
									closeOnConfirm: true,
									closeOnCancel: true,

								});

								
							}else{
								swal({
									title:"UPS...!",
									text: "parese que el nombre de usuario ya ha sido utilizado",
									timer: 1800,
									type: 'error',
									closeOnConfirm: true,
									closeOnCancel: true,

								});
							}
							$("#comboView").hide();
								$("#nombrePre").val("");
								$("#idComboPre").val("");
								$("#precioPre").val("");
						}
					});


		});

		


//****************************************************FIN BOTON AGREGAR AL CARRITO******************************************************


	//*********************************************FIN DEL DOCUMENT READY***************************************************************

});