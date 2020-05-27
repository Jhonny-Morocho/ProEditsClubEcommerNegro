
	///////////////////////////////////RECARGA CLIENTE///////////////////////////////
	///////////////////////////////////RECARGA CLIENTE///////////////////////////////

	$('#id_agregar_recarga').on('submit',function(e){
		e.preventDefault();

		console.log("soy la recarga");
		// obtnemos los datos del formulario
		var datos=$(this).serializeArray();
		console.log(datos);//imprimr los valores
		$.ajax({
			type:$(this).attr('method'),
			data:datos,
			url:$(this).attr('action'),
			dataType:'json',//json

			success:function(data){
				console.log(data);//el usuario si existe
				var id_cliente=data.id_cliente;
				if(data.respuesta=='exito'){
					swal(
						  'Recarga Efectuada de: '+data.monto,
						  ' Transaccion Efectuada con Exito! ',
						  'success'
						)
					setTimeout(function(){
						window.location.href='../Vista/admin/form_recarga_agregar_edit.php?id='+id_cliente;
					},2000);//tiempo de espera
				}else{
					swal({
					  type: 'error',
					  title: 'Oops...',
					  text: 'No se Puede Realizar la Recarga!',
					  footer: '<a href> Revisar ajax_cliente o modelo_proveedor?</a>'
					})
				}
			}
		});
	});
