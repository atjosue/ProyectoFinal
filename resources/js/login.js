$(document).ready(function(){
	$("#usuario").val("");
	$("#password").val("");

	$("#logina").on("click", function(){

		var dataLogin = JSON.stringify($('#infoUsuario :input').serializeArray());
console.log('hola');
		$.ajax({

			type: 'POST',
			dataType: 'json',
			data: {dataLogin,dataLogin, key:'sesion'},
			url: '../../controller/UsuarioController.php',
			success : function(data){

							if (data=='1') {

									$(location).attr('href',"../../view/administrador/gestion.php");
									
								}else if (data=='2') {
									
									$(location).attr('href',"../../view/restaurante/dashboardRestaurante.php");

									
								}else if (data=='3') {

									$(location).attr('href',"../../view/cliente/dashBoardCliente.php");

									
									
								}else if (data=='4') {

									$(location).attr('href',"../../view/repartidor/dashBoardRepartidor.php");
									

								}else if (data=='5') {

									swal({
											title:"UPS...!",
											text: "parece que ingresaste mal tus datos:(",
											timer: 1800,
											type: 'error',
											closeOnConfirm: true,
											closeOnCancel: true,			
										});
									$("#usuario").val("");
									$("#password").val("");
								}	
					
				}

		});

	});

})