$(document).ready(function(){
	 //---------------------recuperacion de Combo----------------------------------
     $(document).on("click",".recuperarCombo",  function(){   

    var idCombo = $(this).attr('id');
    console.log(idCombo);

                                      swal({
                                                    title: "Advertencia",
                                                    text: "¿Desea volver activar este Combo en el sistema",
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
                                          data: {idCombo:idCombo, key:'recuperar'},
                                          url: "../../controller/ProductoController.php",
                                          success: function (data)
                                          {
                                          	console.log(data);
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
