/*$(document).ready(function(){*/




//=========================================EDITAR OFERTA========================================
//=========================================EDITAR OFERTA========================================
//=========================================EDITAR OFERTA========================================

$('#id_editar_Oferta').on('submit',function(e){

	// obtnemos los datos del formulario
	var datos=new FormData(this);
	console.log($(this).attr('action'));
	var url=$(this).attr('action');
	//window.location.href = url;
	console.log(datos);
	// imprimir los valores de formdata
	 for (var pair of datos.entries()) {
	 	console.log(pair[0]+ ', ' + pair[1]); 
	 }


	
	 $.ajax({

	 	type:$(this).attr('method'),
	 	data:datos,
	 	url:$(this).attr('action'),
	 	dataType:'json',//json
	 	contentType:false,
	 	processData:false,
	 	async:true,
	 	cache:false,
	 	success:function(data){
	 		console.log(data);
	 		if(data.respuesta=='exito'){
				swal(
	 				  'Se guardo Exitosamente ! ',
	 				  'Se actualizo la nueva oferta ! ',
	 				  'success'
	 				)

	 		}else{
	 			swal({
	 			  type: 'error',
	 			  title: 'Oops...',
	 			  text: 'No se han hecho nuevos cambios ,  los campos son los mismos !',
	 			  footer: 'Intenta nuevamente'
	 			})
	 		}

			
	 	}
	 });
});



