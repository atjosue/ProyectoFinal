$(document).ready(function(){

	$("#usuario").on("change",function(){

		var usuario = $("#usuario").val();

			$.ajax({

				type:'POST',
				dataType: 'json',
				data: {usuario,usuario,key:'finduser'},
				url:"../../controller/UsuarioController.php",
				success : function(data){

					//info informacionn
					//error informacion
					//warning peligro

					if (data['dec']==true) {
						swal({
							title:"UPS...!",
							text: "parese que el nombre de usuario ya ha sido utilizado",
							timer: 1800,
							type: 'error',
							closeOnConfirm: true,
							closeOnCancel: true,

						});

						$("#usuario").val("");
						$("#usuario").focus();
					}
				}
			});
		
	});

	//fin de verificar si el usuario ya existe

	//verificar Contraseñas
	$("#recontra").on("change",function(){

		var contra = $("#contra").val();
		var recontra = $("#recontra").val();

		if (recontra != contra) {

						swal({
							title:"UPS...!",
							text: "Las contraseñas deben ser iguales",
							timer: 1500,
							type: 'error',
							closeOnConfirm: true,
							closeOnCancel: true,

						});

						$("#contra").val("");
						$("#recontra").val("");
						$("#contra").focus();
		}
	});

	//fin de verificar que las contraseñas sean iguales

	//Registrar el usuario

		$("#Registrarse").on("click", function(){

			var dataUsuario = JSON.stringify($('#infoUsuario :input').serializeArray());

			$.ajax({

				type:'POST',
				dataType: 'json',
				data: {dataUsuario,dataUsuario,key:"agregar"},
				url:"../../controller/ClienteController.php",
				success : function(data){

					if (data==true) {
						swal({
							title:"BIENVENIDO A METROFOOD",
							text: "Ahora puedes hacerte de nuestros servicios, Esperamos cumplir sus necesidades. ",
							timer: 1800,
							type: 'success',
							closeOnConfirm: true,
							closeOnCancel: true,

						})

						setTimeout(function(){
							$(location).attr('href',"../../view/login/login.php");
						},1000);
					}
					else if (data==false){

						swal({
							title:"UPS...!",
							text: "parece que algo fallo:(",
							timer: 1800,
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
		})


});