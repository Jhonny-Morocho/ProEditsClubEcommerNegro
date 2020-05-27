<?php 

    ini_set('display_errors', 'On');

    //require'Modelo/class_mdl_proveedor.php' lo llamo en al archivo q estan los casie ahi se cargan;
	
	class CtrProveedor{




		public static function ctr_agregar_proveedor($nombre,$apellido,$correo,$apodo,$password,$img){
			$tabla="proveedor";
			
			$respuesta=Modelo_Proveedor::sql__agrgar_proveedor($tabla,$nombre,$apellido,$correo,$apodo,$password,$img);// el controlador le pide al modelo una respuesta
			die(json_encode($respuesta));
		}


		public static function ctr_listar_proveedor(){
			$tabla="proveedor";
			$respuesta=Modelo_Proveedor::sql_lisartar_proveedor($tabla);// el controlador le pide al modelo una respuesta
			return $respuesta;
		}


		public static function ctr_individual_proveedor($id_proveedor){//listar llenar datos en formulario de editar 
			$tabla="proveedor";
			$respuesta=Modelo_Proveedor::sql_individual_proveedor($tabla,$id_proveedor);
			return $respuesta;

		}

		//===============================EDITAR PROVEEDOR O ACTUALIZAR PROVEEDOR=================
		public static function ctr_individual_update($id_proveedor,$nombre,$apellido,$correo,$apodo,$password,$img){
			$tabla="proveedor";
	
			$respuesta=Modelo_Proveedor::sql_individual_update($tabla,$id_proveedor,$nombre,$apellido,$correo,$apodo,$password,$img);

			//envio la respuesta en forma de objeto al ajax_proveedor.js
			die(json_encode($respuesta));

		}

		//===============================ELIMINAR PROVEEDOR LOGICAMENTE=================
		public static function ctr_individual_eliminar($id_proveedor){
			$tabla="proveedor";
			$respuesta=Modelo_Proveedor::sql_individual_eliminar($tabla,$id_proveedor);
			//envio la respuesta en forma de objeto al ajax_proveedor.js
			die(json_encode($respuesta));

		}

		public static function ctr_proveedor_login(){

			$tabla="proveedor";
			@$correo=$_POST['correo'];
			@$password=$_POST['password'];
			
			
			$Obj_validar= new CtrValidarCampos();
			$boolean_validacion=true;

			$aValidarCampos=array(
			   'validacion_correo'=>$Obj_validar->validaEmail($correo),
			   'validacion_password_longitud'=>$Obj_validar->validar_password($password)
			);


			//================Recorrer validacion que no este vacio el campo para verificar que todos esten en TRUE
			foreach ($aValidarCampos as $key => $value) {// recorrer todas las respueta de los campos vacios
			
				if($value==false){//si llega vacio hacer imprimir
					
					//echo'<br>'.$key .' '.$value;
					$boolean_validacion=false;
				}
			}

			if($boolean_validacion==true){//validacion de campos campos ññenps
				$respuesta=Modelo_Proveedor::sql_login_proveedor($tabla,$correo);
				if ($respuesta) {//verificar si existe el correo del usuario
					if( password_verify(@$password,@$respuesta['password']) ){
				
							@session_start();

							@$_SESSION['id_proveedor']=$respuesta['id'];
							@$_SESSION['usuario']=$respuesta['nombre'];
							@$_SESSION['tipo_usuario']=$respuesta['tipo_usuario'];
							@$_SESSION['apellido']=$respuesta['apellido'];

							 $respuesta=array(
								 'respuesta'=>'true_password',
								 'usuario'=>$respuesta['nombre'],
								 'apellido'=>$respuesta['apellido'],
								 'apodo'=>$respuesta['apodo']
							 );
					

						}

						else{
							$respuesta=array(
								'respuesta'=>'false_contraseña'
							);
						
						}
				}else{
						$respuesta=array(
							'respuesta'=>'false_correo'
						);
					
					}
			}else{
				$respuesta=array('respuesta_validacion'=>$boolean_validacion);
			}
	
			



		die(json_encode($respuesta));	

			
	
			
		}


		public static function ctr_proveedor_editar(){

			
			if( @$_POST["login-admin"]=="login-admin" ){//si aplasta post ahi se ejecuata
				$tabla="proveedor";
				@$correo=$_POST['correo'];
				@$password=$_POST['password'];
				
				$respuesta=Modelo_Proveedor::sql_login_proveedor($tabla,$correo);
		
				
				if ($respuesta) {//verificar si existe el correo del usuario
					

					if( password_verify(@$password,@$respuesta['password']) ){
				
							@session_start();

							@$_SESSION['id_proveedor']=$respuesta['id'];
							@$_SESSION['usuario']=$respuesta['nombre'];
							@$_SESSION['tipo_usuario']=$respuesta['tipo_usuario'];
							@$_SESSION['apellido']=$respuesta['apellido'];

							 $respuesta=array(
							 	'respuesta'=>'true_password',
							 	'usuario'=>$respuesta['nombre'],
							 	'apellido'=>$respuesta['apellido'],
							 	'apodo'=>$respuesta['apodo']
							 );
					

						}

						else{
							$respuesta=array(
								'respuesta'=>'false_contraseña'
							);
						
						}
				}else{
						$respuesta=array(
							'respuesta'=>'false_correo'
						);
					
					}
			die(json_encode($respuesta));	
					

			}
		}






	}



 ?>
 