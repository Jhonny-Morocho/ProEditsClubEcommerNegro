
console.log("soy ajax pagar");


$.ajax({
	method: "POST",
	url: "../Controlador/class_ctr_Oferta.php",
	dataType: "json",
	data: { Oferta: "listar"},
	success:function(respuesta){
		console.log(respuesta);
		descuento=(respuesta[0].descuento)/100;
		limite=respuesta[0].limite_productos;
		console.log("descuento",descuento);
		console.log("limite",limite);

			var url_transaccion="../Pay_Pal/paypal_controlador.php";
			var data_type="json";
			var datos=new FormData();
			var datos_promo=new FormData();

				//===================BOTON PAGAR AJAX===================================//
				//===================BOTON PAGAR AJAX===================================//

			$("#id_carrito_pagar").on('submit',function(e){
					e.preventDefault();
					//window.location='../Pay_Pal/paypal_controlador.php';
					////////////////ANIMACION ///////////////////

					var datos_opcion_pago=$(this).serializeArray();//obtengo valores de radios
					console.log(datos_opcion_pago);
					console.log("name_radio",datos_opcion_pago[0].name);
					console.log("value_radio",datos_opcion_pago[0].value);


					//selecionodo todos los datos de la tabla
					var class_nombre_cancion=$(".tablita .class_nombre_cancion");
					var class_precio_cancion=$(".tablita .class_precio_cancion")
					var class_id_producto=$(".tablita button");
					var class_tota_cancelar=$(".total-amount").text();//total q sale en la pagina de carrito color verde

					console.log("class_tota_cancelar",class_tota_cancelar);
					console.log("class_nombre_cancion: ",class_nombre_cancion);
					console.log("class_nombre_cancion_longitud: ",class_nombre_cancion);
					console.log("class_precio_cancion: ",class_precio_cancion);
					console.log("class_id_cancion: ",class_id_producto);

					//=================DATA  SIN PROMOCION================//
				
					///creamoss array
					var nombre_cancion_Array=[];
					var precio_cancion_Array=[];
					var id_cancion_Array=[];



					for(var i=0;i< class_id_producto.length;i++){
						nombre_cancion_Array[i]=$(class_nombre_cancion[i]).text();
						precio_cancion_Array[i]=$(class_precio_cancion[i]).text();
						id_cancion_Array[i]=$(class_id_producto[i]).attr("id_Producto");
					}


					//creamos la variable data que va a enviar la informacion por ajax
					

					datos.append("id_cancion",id_cancion_Array);//adicionamo cada valor por q es un objeto
					datos.append("nombre_cancion",nombre_cancion_Array);
					datos.append("precio_cancion",precio_cancion_Array);
					datos.append("opcion_compra",datos_opcion_pago);
					datos.append("name_radio",datos_opcion_pago[0].name);
					datos.append("value_radio",datos_opcion_pago[0].value);
					datos.append("total_cancelar",class_tota_cancelar);

					var limite_actual=nombre_cancion_Array.length;
					console.log(limite_actual);

					
					console.log(limite_actual);

					//================================	CONDICION SI LA PROCION DE ACTIVA=====================================//
					//================================	CONDICION SI LA PROCION DE ACTIVA=====================================//
					

					//ajax_funcion(datos_promo,limite_actual);// datos con promocion y descuento
					
					
					if(limite_actual>=limite){//adquiere la oferta

						ajax_funcion(datos,limite_actual);// datos sin promocion
					}else{// se pregunta si quiere seguir con la trasaccion//aqui es si me compra menos de 5 edits

						Swal.fire({
						title: 'Total ha pagar sin descuento :<br> $ ['+class_tota_cancelar+"] <br>Aprovecha la oferta de hoy <br>"+"Por la adquisición de ["+limite+"] o mas edits <br>recibe un descuento del "+(descuento*100)+" % en tu compra",
						text: "Para ignorar la publicidad aplasta , continuar con la transaccion ",

						type: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Continuar con la transaccion!'
						}).then((result) => {
						if (result.value) {// si desea adquirir promocion
										//animacion
									ajax_funcion(datos,limite_actual);// datos sin promocion
						}// en if alert
						})
					}

			});




			function ajax_funcion(datos,limite_actual){
				
				animacion();
				$.ajax({
					url:url_transaccion,
					method:'post',
					data:datos,
					cache:false,
					contentType:false,
					processData:false,
					dataType:data_type,//json//data_type
					success:function(respuesta){

						console.log("respuesta",respuesta);

						
						switch (respuesta.tipo_respuesta) {
							case 'session':
								//===========PREGUNTO SI EXITE UNA SESSION PARA Q PUEDA COMPRAR===========///
								animacion();
								mensajes(respuesta.respuesta_session);//imprime el alert (no existe session)
								break;


								case 'paypal':

								animacion();
									if(respuesta.respuesta=='exito'){
										swal('Tu solicitud ha sido  procesada')
											swal({
											position: 'center',
											type: 'success',
											title: 'Tu solicitud ha sido  procesada ',
											showConfirmButton: false,
											timer: 3000
												})
												console.log(respuesta);
												window.location=respuesta.url_paypal;
									}
									
							break;


							case 'saldo':
								animacion();
								swal({
									title: 'Confirma la adquisición de los Rmx ?',
									text: "Recuerda sera debitado de tu saldo ! cuentas con "+respuesta.total_saldo+ '$ en saldo',
									type: 'warning',
									showCancelButton: true,
									confirmButtonColor: '#3085d6',
									cancelButtonColor: '#d33',
									confirmButtonText: 'Si, deseo los productos!'
								}).then((result) => {
									if (result.value) {
										swal(
										'Has confirmado la compra, se esta procesando tu solicitud ....!',
										'Recuerda pudes revisar tus productos en tu session cliente .',
										'success'
										)
									setTimeout(function(){
										window.location.href=respuesta.url_pago_finalizado_saldo;
									},3000);//tiempo de espera
									}
					
								})
								//==============================MENSAJE NO TIENES SALDO=====================///
								mensajes(respuesta.respuesta_saldo);//imprime el alert (saldo no diponible)

							break;



							case 'membresia':
									animacion();
									console.log(limite_actual);

								
									if(respuesta.rango_descarga>=limite_actual && respuesta.estado_membresia=='activa'){
										swal({
											title: 'Confirma la adquisición de los Rmx ?',
											text: "Recuerda sera debitado de tu limite de descargas ! cuentas con "+respuesta.rango_descarga+ ' # Descargar',
											type: 'warning',
											showCancelButton: true,
											confirmButtonColor: '#3085d6',
											cancelButtonColor: '#d33',
											confirmButtonText: 'Si, deseo los productos!'
										}).then((result) => {
											if (result.value) {
												swal(
												'Has confirmado la compra, se esta procesando tu solicitud ....!',
												'Recuerda pudes revisar tus productos en tu session cliente .',
												'success'
												)
											setTimeout(function(){
												window.location.href=respuesta.url_pago_finalizado_membresia;
											},3000);//tiempo de espera
											}
							
										})

									}else{
										swal({
											type: 'error',
											title: 'Oops...',
											text: 'Tu limite de descargas es menor a lo que deseas adquirir, o tus membresias caducaron cuentas por el momento con '+respuesta.rango_descarga +". Usted desea descargas "+limite_actual+" .Estado de la membresia : "+respuesta.estado_membresia,
											footer: 'Puedes recargas tu saldo con nostros mas informacion en nuestras redes sociales'
										})
									}


					
									//==============================MENSAJE NO TIENES SALDO=====================///
									
							break;
						
						}

				
					}
				}); /*end ajax*/
			}




			//=================MENSAJE DE ALERTA NO EXISTE SESION Y SALDO NO DISPONIBLE============================//
			function mensajes(respuesta){

				var foo = respuesta;

					switch (foo) {

						case "no_exite_session":
						//============================caso 1 NO EXISTE SESSION==================//
						swal(
								'Antes de comprar Inicia tu Session en la Pagina?',
								'Recuerda si no tienes cuenta en la pagina puedes registrarte?',
								'question'
							)
						break;


						case "saldo_insuficiente":
						//==============CASO 2 SALDO INSUFICIENTE=======================//

						swal({
							type: 'error',
							title: 'Oops...',
							text: 'Tu saldo es insuficiente para poder realizar la trasaccion, recarga tu monedero e intenta de nuevo',
							footer: 'Puedes recargas tu saldo con nostros mas informacion en nuestras redes sociales'
						})
						break;



					}
			}

	}	
	
})	
