$(document).ready(function(){
			
			
			
			$("#botonFinal").hide();



	 			$.ajax({
					type:'POST',
					data:{key:'first'},
					url:"../../controller/UsuarioController.php",
					success:function(data){

						if (data==true) {

							swal({
										title:"IMPORTANTE!",
										text: "Porfavor completar todos y cada uno de los campos.",
										timer: 4000,
										type: 'warning',
										closeOnConfirm: false,
										closeOnCancel: false,

									});

							
						}
					}
				});

				

				$("#btnMAPA").on("click",function(){
					

					$("#botonFinal").show();
					console.log("nombre de la imagen:");
						console.log($("#prueba").val());

				});


				$("#guardarInfo").on("click",function(){

					var dataRestaurante = JSON.stringify($('#infoRestaurante :input').serializeArray());
					
			
				$.ajax({
					type:'POST',
					dataType: 'json',
					data: {dataRestaurante,dataRestaurante,key:'editarPerfil'},
					url:"../../controller/noTable/ControllerRestaurantes.php",
					success : function(data){


					//info informacionn
					//error informacion
					//warning peligro

					if (data==true) {
						swal({
							title:"Exito!",
							text:" Proceso realizado con exito!..",
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

//----------------------------ESTO ES PARA QUE NO GUARDE OTRA IMAGEN SI YA HAY--------------------
			  $('.crop_image').click(function(event){

			  	if (($("#prueba").val()=="")) {
			  			$.ajax({

							type:'POST',
							data:{key:'hora'},
							url:"../../controller/ProductoController.php",
							success:function(data){
								console.log(data);
								$("#prueba").val(data);
								console.log("no Habia");
								console.log($("#prueba").val());
								
							}
						});
			  		}else{
			  			
			  			console.log($("#prueba").val());
			  			console.log("YA HABIA");

			  		}
//----------------------------------------------------------------------------------------------------

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
			         var dat = $("#prueba").val();

			         
			          $('#imga').attr('src', "../../imagenes/img/imagenNo.png");
			          $('#imga').attr('src', "../../imagenes/img/"+data);

			         
			        }

			      });
			    });
			  });

			 
//-----------------------------------------------------------------------------------------FIN CROPIE



});