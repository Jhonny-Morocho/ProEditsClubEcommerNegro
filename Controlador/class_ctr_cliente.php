<?php

    ini_set('display_errors', 'On');

    //require'Modelo/class_mdl_proveedor.php' lo llamo en al archivo q estan los casie ahi se cargan;

	class CtrCliente{




        //* listar todos los clientes
        public static function ctr_listar_cliente(){//listar cliente
            $tabla="cliente";
            $respuesta=Modelo_Cliente::sql_lisartar_cliente($tabla);// el controlador le pide al modelo una respuesta
            return $respuesta;
        }

          //* listar  facturas del cliente individual
          public static function ctr_listar_compra($id){//listar cliente
            $tabla="detalle_factura";
            $respuesta=Modelo_Cliente::sql_listar_compras($tabla,$id);// el controlador le pide al modelo una respuesta
            return $respuesta;
		}

		      //* listar  facturas del cliente individual
		public static function ctr_listar_facturas(){//listar cliente
				$tabla_1="cliente";
				$tabla_2="detalle_factura";
				$respuesta=Modelo_Cliente::sql_listar_factura_clientes_all($tabla_1,$tabla_2);// el controlador le pide al modelo una respuesta
				return $respuesta;
		}



		public static function ctr_agregar_cliente($nombre,$apellido,$correo,$password){
			$tabla="cliente";

			 $Obj_validar= new CtrValidarCampos();

			 //variables o banderas
			 $boolean_validacion=true;
		
			 $aValidarCampos=array(
			 	'vacio_nombre'=>$Obj_validar->validar_campos_vacios($nombre),
			 	'vacio_apellido'=>$Obj_validar->validar_campos_vacios($apellido),
			 	'vacio_correo'=>$Obj_validar->validar_campos_vacios($correo),
				'vacio_password'=>$Obj_validar->validar_campos_vacios($password),
				'validacion_correo'=>$Obj_validar->validaEmail($correo),
				'validacion_nombre_texto'=>$Obj_validar->solo_letras($nombre),
				'validacion_apellido_texto'=>$Obj_validar->solo_letras($apellido),
				'validacion_password_longitud'=>$Obj_validar->validar_password($password)
			 );
		
			 //================Recorrer validacion que no este vacio el campo para verificar que todos esten en TRUE
			  //================Recorrer validacion que no este vacio el campo para verificar que todos esten en TRUE
			foreach ($aValidarCampos as $key => $value) {// recorrer todas las respueta de los campos vacios
			
				if($value==false){//si llega vacio hacer imprimir
					
					//echo'<br>'.$key .' '.$value;
					$boolean_validacion=false;
				}
			}

			
			if($boolean_validacion==true){//validacion de campos campos ññenps
				$respuesta=Modelo_Cliente::sql__agregar_cliente($tabla,$nombre,$apellido,$correo,$password);// el controlador le pide al modelo una respuesta
				
			}else{
				$respuesta=array('respuesta_validacion'=>$boolean_validacion);//los campos campos estan vacios
			}
	
			die(json_encode($respuesta));
			
		}



		//===============================EDITAR Cliente O ACTUALIZAR Cliente=================
		 public static function ctr_editar_cliente($id_cliente,$nombre,$apellido,$correo,$password){
			 $tabla="cliente";

			$Obj_validar= new CtrValidarCampos();
			//variables o banderas
			$boolean_validacion=true;

			$aValidarCampos=array(
				'vacio_nombre'=>$Obj_validar->validar_campos_vacios($nombre),
				'vacio_apellido'=>$Obj_validar->validar_campos_vacios($apellido),
				'vacio_correo'=>$Obj_validar->validar_campos_vacios($correo),
			   'validacion_correo'=>$Obj_validar->validaEmail($correo),
			   'validacion_nombre_texto'=>$Obj_validar->solo_letras($nombre),
			   'validacion_apellido_texto'=>$Obj_validar->solo_letras($apellido)
			   
			);
			
			//================Recorrer validacion que no este vacio el campo para verificar que todos esten en TRUE
			//================Recorrer validacion que no este vacio el campo para verificar que todos esten en TRUE
			  foreach ($aValidarCampos as $key => $value) {// recorrer todas las respueta de los campos vacios
			
				if($value==false){//si llega vacio hacer imprimir
					
					//echo'<br>'.$key .' '.$value;
					$boolean_validacion=false;
				}
			}


			if($boolean_validacion==true){//validacion de campos campos ññenps
				$respuesta=Modelo_Cliente::sql_individual_update($tabla,$id_cliente,$nombre,$apellido,$correo,$password);
			}else{
				$respuesta=array('respuesta_validacion'=>$boolean_validacion);//los campos campos estan vacios
			}

		 	//envio la respuesta en forma de objeto al ajax_proveedor.js
		 	die(json_encode($respuesta));

		 }


		public static function ctr_editar_cliente_saldo($id_cliente,$total_saldo_actulizar){//editar saldo del cliente cuando pongo la recarga
			$tabla="cliente";

			$respuesta=Modelo_Cliente::sql_actualizar_saldo($tabla,$id_cliente,$total_saldo_actulizar);
			//envio la respuesta en forma de objeto al ajax_proveedor.js
			return $respuesta;
		}



		public static function ctr_cliente_login(){
			//die(json_encode($_POST));
			$tabla="cliente";
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

			if($boolean_validacion==true){
				$respuesta=Modelo_Cliente::sql_login_cliente($tabla,$correo);
					if ($respuesta) {//verificar si existe el correo del usuario

						if( password_verify(@$password,@$respuesta['password']) ){

								@session_start();

								@$_SESSION['id_cliente']=$respuesta['id'];
								@$_SESSION['usuario']=$respuesta['nombre'];
								@$_SESSION['tipo_usuario']=$respuesta['tipo_usuario'];
								@$_SESSION['apellido']=$respuesta['apellido'];


								$respuesta=array(
									'respuesta'=>'exito',
									'password'=>'true_password',
									'usuario'=>$respuesta['nombre'],
									'apellido'=>$respuesta['apellido']
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



	}



 ?>
