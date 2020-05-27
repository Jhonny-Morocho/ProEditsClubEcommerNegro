/*$(document).ready(function(){*/

	console.log("soy musica");

//=========================================CREAR PRODUCTO========================================
//=========================================CREAR PRODUCTO========================================
//=========================================CREAR PRODUCTO========================================
$('#id_agregar_producto').on('submit',function(e){
		e.preventDefault();
		$(".progress-bar").attr("aria-valuenow", "0");
		$(".progress-bar").css("width", "0%");
		$(".sr-only").html("0% Complete (success)");
		console.log("Click");
		// obtnemos los datos del formulario
		var datos=new FormData(this);

		for (var pair of datos.entries()) {
		    console.log(pair[0]+ ', ' + pair[1]); 
		}

	//==============ANIMACION FLECHAS GIRANDO==================//
		$("#guardar_musica").append("<div class='overlay'>"
			+"<i class='fa fa-refresh fa-spin'>"+"</i>"+"</div>");
		console.log(datos);
		$.ajax({
			xhr: function() {
				var xhr = new window.XMLHttpRequest();
				// Upload progress.
				xhr.upload.addEventListener("progress", function(evt){
					if (evt.lengthComputable) {
						var porcentaje = Math.floor(evt.loaded / evt.total * 100);

						$(".progress-bar").attr("aria-valuenow", porcentaje);
						$(".progress-bar").css("width", porcentaje + "%");
						$(".sr-only").html(porcentaje + "% Completado");
						$(".porcentaje_h4").html(porcentaje + "% Completado");
						console.log(porcentaje);
						console.log(porcentaje);
					}
				}, false);
				
				return xhr;
			},
			type:"post",
			data:datos,
			url:$(this).attr('action'),
			dataType:'json',
			// datos asicionales
			contentType:false,
			processData:false,
			async:true,
			cache:false,
			success:function(data){
				/*console.log(data);*/
				var resultado=data;
				console.log("Este es la data "+data);
				console.log("Resultado "+resultado.respuesta);
				/*console.log("Resultado "+resultado.post);*/
				/*console.log("Resultado "+resultado.file);*/

				/////////////////AGREGO ANIMACION DE CARGA///////////////////////

				///////////////////remover nodo////////////////
				if(resultado.respuesta=='exito'){
					swal(
						  'Se guardo Exitosamente !<br> '+resultado.titulo+"<br><h3> Precio</h3> $ "+resultado.precio,
						  '   ',
						  'success'
						)

				$('.overlay').remove();
				}else{
					swal({
					  type: 'error',
					  title: 'Oops...',
					  text: 'No Se pudo Subir el Archivo!',
					  footer: '<a href>Ingresastes correctamente lo datos?</a>'
					})
				}

				
			}
		});
});


//=========================================EDITAR PRODUCTO========================================
//=========================================EDITAR PRODUCTO========================================
//=========================================EDITAR PRODUCTO========================================

$('#id_editar_producto').on('submit',function(e){

	// obtnemos los datos del formulario
	var datos=new FormData(this);
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

			if(data.respuesta=='exito'){
				swal(
					  'Se guardo Exitosamente ! ',
					  'Revisa tu tabla de productos para verificar los cambios realizados ! ',
					  'success'
					)
	/*			setTimeout(function(){
					window.location.href='listado_mis_rmx.php';
				},2000);*/
	
			}else{
				swal({
				  type: 'error',
				  title: 'Oops...',
				  text: 'No se pudo actualizar!',
				  footer: 'Intenta nuevamente'
				})
			}

			
		}
	});
});


//=========================================BORRAR PRODUCTO LOGICAMENTE========================================
//=========================================BORRAR PRODUCTO LOGICAMENTE========================================
//=========================================BORRAR PRODUCTO LOGICAMENTE========================================

$('.borrar_producto').on('click',function(e){
	e.preventDefault();// es para q cuando haga click no brinque 
	//Obtener todos los atributos de la etiqueta del DOM
	console.log("soy borrar producto");
	var id=$(this).attr('data-id');// id del producto
	var titulo_arhivo=$(this).attr('data-titulo-archivo');//nombre de la cancion
	var tipo=$(this).attr('data-tipo');//tipo eliminar
	console.log("ID :"+ id);
	console.log("Tipo: "+ tipo);
	console.log("data-titulo-archivo "+ titulo_arhivo);
			
	//BOTON DE ALERTA
	swal({
	  title: 'Estás seguro que desea eliminar ? <br>'+titulo_arhivo,
	  text: "No podrass revertir esto!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Si, Eliminar!'
	}).then((result) => {
	  if (result.value) {

			$.ajax({
				type:'post',//
				data:{
					//aqui envio los datos al servidor
					'id_producto':id,
					'titulo_arhivo':titulo_arhivo,
					'producto':'eliminar'

				},
					url:'../Vista/admin/agregar_editar_ajax.php',// mando al servidor con la opcion que sea(modelo_proveedor.php)
					success:function(data){// si el llamado es correcto nos regresa uno datos
					console.log(data);// me regresa un string y solo con convierto
					var resultado=JSON.parse(data);// lo convierto en objeto

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
		  'Tu archivo ha sido eliminado',
		  'success'
		)
	  }
	})

		
});


