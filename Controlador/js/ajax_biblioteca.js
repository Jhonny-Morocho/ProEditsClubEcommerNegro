/*$(document).ready(function(){*/

	console.log("Soy la Bliblioteca");



	/*------------------------------AGREGAR BIBLIOTECA----------------------*/
	/*------------------------------AGREGAR BIBLIOTECA----------------------*/

	$('#id_agregar_biblioteca').on('submit',function(e){
		e.preventDefault();
		console.log("Click en crar BIBLIOTECA");
		var datos=$(this).serializeArray();
		console.log(datos);
		$.ajax({
			type:$(this).attr('method'),
			data:datos,
			url:$(this).attr('action'),
			dataType:'json',
			success:function(data){
				console.log(data);
				if(data.respuesta==('exito')){
					swal(
						  'Registro Exitoso!'+data.genero,
						  'Nuevo Genero ingresado A la Bliblioteca! ',
						  'success'
						)
				}else{
					console.log("Ubo un error");
					swal({
					  type: 'error',
					  title: 'Oops...',
					  text: 'Revise bien los datos ingresado!',
					  footer: '<a href>Ingresastes correctamente lo datos?</a>'
					})
				}
			}
		});
	});



///////////////////////////////////EDITAR BIBLIOTECA/////////////////////////////////////////
///////////////////////////////////EDITAR BIBLIOTECA/////////////////////////////////////////



	$('#id_editar_biblioteca').on('submit',function(e){
		e.preventDefault();
		console.log("Click en editar BIBLIOTECA");
		// obtnemos los datos del formulario
		var datos=$(this).serializeArray();
		console.log(datos);
		$.ajax({
			type:$(this).attr('method'),
			data:datos,
			url:$(this).attr('action'),
			dataType:'json',//json
			success:function(data){
				console.log(data);
				if(data.respuesta==('exito')){
					swal(
						  'Registro Exitoso!'+data.genero,
						  'Genero Actualizado A la Bliblioteca! ',
						  'success'
						)
				}else{
					console.log("Ubo un error");
					swal({
					  type: 'error',
					  title: 'Oops...',
					  text: 'Revise bien los datos ingresado o es el mismo datos no lo as cambiado!',
					  footer: '<a href>Ingresastes correctamente lo datos?</a>'
					})
				}
			}
		});
	});


	///////////////////////////////////BORRAR BIBLIOTECA/////////////////////////////////////////
///////////////////////////////////BORRAR BIBLIOTECA/////////////////////////////////////////

	$('.borrar_bliblioteca').on('click',function(e){
		e.preventDefault();
		var id=$(this).attr('data-id');
		var genero=$(this).attr('data-genero');
		var tipo=$(this).attr('data-tipo');// pueden venir n tipo de dara tipo
		console.log("ID :"+ id);
		console.log("genero: "+ genero);
		//BOTON DE ALERTA
			swal({
				title: 'Estás seguro que desea Eliminar a :<br>  '+genero,
				text: "No podrass revertir esto!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Si, Eliminar!'
			  }).then((result) => {
				if (result.value) {
	  
					  $.ajax({
						  type:'post',// si no hay formulario entonces seria por pos
						  data:{
							  //aqui envio los datos al servidor
							  'id':id,
							  'biblioteca':'eliminar'
	
						  },
							  url:'../Vista/admin/agregar_editar_ajax.php',// mando al servidor con la opcion que sea(modelo_proveedor.php)
							  success:function(data){// si el llamado es correcto nos regresa uno datos
							  //console.log(data);// me regresa un string y solo con convierto
							  console.log(data);
							  var resultado=JSON.parse(data);// lo convierto en objeto
							  /*			console.log("EL bojeto ahora el id :"+resultado.id_eliminado);*/
							  if(resultado.respuesta=='exito'){
							  $('[data-id="'+id+'"]').parents('tr').remove();	
	  
							  }else{// si no se puede elimnar presenta este mensaje
								  // presenta eset mensaje si no se elimina de la base de datos
								  swal({
									type: 'error',
									title: 'Oops...',
									text: 'Algo salió mal!',
									footer: '<a href>Why do I have this issue?</a>'
								  })
							  }				
						  }
					  });/// fin ajaxa
				  swal(// si se elimno presenta el mensaje de confirmacion
	  
					'Eliminado!',
					'Tu archivo ha sido eliminado.',
					'success'
				  )
				}
			  })    
				


	});


//});// fin document


