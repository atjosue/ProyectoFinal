$(document).ready(function(){
	
	
	$.ajax({
		type:'POST',
		data:{key:'contarCarro'},
		url:"../../controller/ProductoController.php",
		success: function(data){
					

			$("#contadorCarrito").html();
		}
	});

		$(document).on("click",".verPerfil", function(){
		 	var idUsuario = $(this).attr("id");
		 	console.log(idUsuario);

		 		$.ajax({

				type:'POST',
				data: {idUsuario,idUsuario},
				url:"../../view/cliente/perfilRestaurante.php",
				success : function(data){

					$(location).attr('href',"../../view/cliente/perfilRestaurante.php");

				}
			});

		 	

		 });

});