<?php

ini_set('display_errors', 'On');
//require'class_mdl_bd_conexion.php';

	/**
	 *
	 */
	class Modelo_Cliente {
		//satic cuando recibo algo siempre van como static


		//1Login de cliente
		public static function sql_login_cliente($tabla,$correo){

			$db=new Conexion();
			$stmt= $db->conectar()->prepare("SELECT *FROM $tabla where correo ='$correo' ");

			$stmt->execute();


			return $stmt->fetch();

			$stmt->close();
		}



		public static  function sql__agregar_cliente($tabla,$nombre,$apellido,$correo,$password){
			$db=new Conexion();
			$opciones=array(
				'cost'=>12
			);


			//1.comprobar si existe el correo
			$stmt_2= $db->conectar()->prepare("SELECT *FROM $tabla where correo ='$correo' ");
			$stmt_2->execute();


			if($stmt_2->rowCount()>0 ){// sii existe el correo
				$respuesta=array(
					'respuesta'=>'correo_repetido'
					);

			}else{
				$password_hashed=password_hash($password,PASSWORD_BCRYPT,$opciones);
				try {
				$stmt= $db->conectar()->prepare("INSERT INTO $tabla
																	(nombre,
																	apellido,
																	correo,
																	password,
																	tipo_usuario,
																	saldo_actual
																	)

															VALUES('$nombre',
																	'$apellido',
																	'$correo',
																	'$password_hashed',
																	'Cliente',
																	'0'
																	)
														");
					$stmt->execute();
					$id=$db->lastInsertId();

					if ( $stmt->rowCount()>0)
						//Se grabo bien
						@session_start();//inicio la sesion
						$_SESSION['id_cliente']=$id;
						$_SESSION['usuario']=$nombre;
						$_SESSION['tipo_usuario']='Cliente';
						$_SESSION['apellido']=$apellido;

							$respuesta=array(
								'respuesta'=>'exito',
								'id_cliente'=>$id,
								'nombre'=>$nombre,
								'apellido'=>$apellido,
								'email'=>$correo
								);


				} catch (Exception $e) {
					//echo "Error".$e->getMessage();
					$respuesta=array(
							'respuesta'=>'fallo_try_cacht'
							);

				}
			}//enn else

			return $respuesta;
			$stmt->close();



		}//end metodo

		//* listar clientes
		 public static  function sql_lisartar_cliente($tabla){
			$db=new Conexion();
			$stmt= $db->conectar()->prepare("SELECT  *FROM $tabla ORDER by id Desc ");

			$stmt->execute();
			return $stmt->fetchAll();

			$stmt->close();

		}

		//* listar compras de cliente
		public static  function sql_listar_compras($tabla,$id){
			$db=new Conexion();
			$stmt= $db->conectar()->prepare("SELECT *FROM $tabla
			WHERE detalle_factura.id_cliente= '$id'   ORDER by id DESC ");

			$stmt->execute();
			return $stmt->fetchAll();

			$stmt->close();

		}





		public static function sql_individual_proveedor($tabla,$id){
			$db=new Conexion();

			$stmt= $db->conectar()->prepare("SELECT *FROM $tabla where id ='$id' ");

			$stmt->execute();


			return $stmt->fetch();

			$stmt->close();
		}

		//============================ACTUALIZAR O EDITAR CLIENTE========================================//
		public static function sql_individual_update($tabla,$id_cliente,$nombre,$apellido,$correo,$password){
			$db=new Conexion();
			try {
				//
				$bandera_password=false;
					if(empty($password)){//si viene vacio no actulizo el password
						$stmt= $db->conectar()->prepare("UPDATE $tabla SET
																nombre='$nombre',
																apellido='$apellido',
																correo='$correo'

															WHERE id='$id_cliente' ");
					}else{
						$bandera_password=true;
						$opciones=array(
							'cost'=>12
						);

						$hash_password=password_hash($password,
										PASSWORD_BCRYPT,$opciones);

						$stmt=$db->conectar()->prepare(" UPDATE $tabla SET
																nombre='$nombre',
																apellido='$apellido',
																correo='$correo' ,
																password='$hash_password'

														WHERE id='$id_cliente' ");
					}
			} catch (Exception $e) {
				//echo "Error".$e->getMessage();
				$respuesta=array(
					'respuesta'=>$e->getMessage()
					);
			}




			$stmt->execute();
			$id=$db->lastInsertId();

			if($stmt){
				//si se realizo la inserccion
				$respuesta=array(
					'respuesta'=>'exito',
					'id_cliente'=>$id,
					'nombre'=>$nombre,
					'apellido'=>$apellido,
					'correo'=>$correo,
					'password'=>$bandera_password
					);

			}else{
				$respuesta=array(
					'respuesta'=>'no se inserto'
					);

			}

			return $respuesta;

			//si alguna fila se modifico entonces si se edito

			$stmt->close();
		}



		//listar todas las compras de todos los clientes facturas
		public static function sql_listar_factura_clientes_all($tabla_1,$tabla_2){
			$db=new Conexion();
			$stmt= $db->conectar()->prepare("SELECT
														cliente.nombre,
														cliente.apellido,
														cliente.correo,
														detalle_factura.id,
														detalle_factura.total,
														cliente.saldo_actual,
														detalle_factura.fecha_factura
												FROM $tabla_1,$tabla_2
												where cliente.id=detalle_factura.id_cliente
												ORDER by  detalle_factura.id desc");

			$stmt->execute();
			return $stmt->fetchAll();

			$stmt->close();

		}

		public static function sql_actualizar_saldo($tabla,$id_cliente,$total_actualizar_saldo){//edito el saldo del cliente

			$db=new Conexion();
			try {
				//
				$stmt= $db->conectar()->prepare("UPDATE $tabla SET
														saldo_actual='$total_actualizar_saldo'
												WHERE id='$id_cliente' ");

			} catch (Exception $e) {
				//echo "Error".$e->getMessage();
				$respuesta=array(
					'respuesta'=>$e->getMessage()
					);
			}
			$stmt->execute();
			$id=$db->lastInsertId();
			if($stmt){
				//si se realizo la inserccion
				$respuesta=array(
					'respuesta'=>'exito',
					'id_cliente'=>$id,
					'total_actualizar_saldo'=>$total_actualizar_saldo
					);

			}else{
				$respuesta=array(
					'respuesta'=>'no se inserto'
					);

			}
			return $respuesta;
			//si alguna fila se modifico entonces si se edito

			$stmt->close();

		}


	}



 ?>