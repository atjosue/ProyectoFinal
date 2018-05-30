$(document).ready(function(){
	$("entrega").hide();
	$("inicio").attr("readonly",true);
	$("contInfo").hide();
	$("mapa").hide();

		$.ajax({
			type:'POST',
			data:{key:'verificarRepartidor'},
			url:"../../controller/RepartidorController.php",
				success : function(data){
					if(data==1) {
						$("entrega").hide();
								
				}
			   }
			
		});
});