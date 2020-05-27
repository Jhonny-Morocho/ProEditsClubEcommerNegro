<?php 

ini_set('display_errors', 'On');
//require'class_mdl_bd_conexion.php';

	/**
	 * 
	 */
	class Modelo_Proveedor {
		//satic cuando recibo algo siempre van como static


		public static  function sql__agrgar_proveedor($tabla,$nombre,$apellido,$correo,$apodo,$password,$img){
			$db=new Conexion();
			$opciones=array(
				'cost'=>12
			);

			$password_hashed=password_hash($password,PASSWORD_BCRYPT,$opciones);
		
			$stmt= $db->conectar()->prepare("INSERT INTO $tabla 
																(nombre,
																apellido,
																apodo,
																correo,
																tipo_usuario,
																password,
																img,
																estado) 

														VALUES('$nombre',
																'$apellido',
																'$apodo',
																'$correo',
																'Proveedor',
																'$password_hashed',
																'$img',
																'1') ");

			$stmt->execute();
			$id=$db->lastInsertId();
			if ( $stmt->rowCount() > 0) {
				//Se grabo bien
					$respuesta=array(
						'respuesta'=>'exito',
						'id_provedor'=>$id,
						'nombre'=>$nombre,
						'apellido'=>$apellido,
						'apodo'=>$apodo,
						'email'=>$correo
						);
				return $respuesta;
			 }

			$stmt->close();

		}


		 public static  function sql_lisartar_proveedor($tabla){
			$db=new Conexion();
			$stmt= $db->conectar()->prepare("SELECT  *FROM $tabla where estado ='1' ORDER by apodo ");

			$stmt->execute();
			return $stmt->fetchAll();

			$stmt->close();

		}


		public static function sql_login_proveedor($tabla,$correo){

			$db=new Conexion();
			$stmt= $db->conectar()->prepare("SELECT *FROM $tabla where correo ='$correo' ");
		
			$stmt->execute();


			return $stmt->fetch();

			$stmt->close();
		}


		
		public static function sql_individual_proveedor($tabla,$id){

			$db=new Conexion();

			$stmt= $db->conectar()->prepare("SELECT *FROM $tabla where id ='$id' ");
		
			$stmt->execute();


			return $stmt->fetch();

			$stmt->close();
		}

		//============================ACTUALIZAR O EDITAR PROVEEDOR========================================//
		public static function sql_individual_update($tabla,$id_proveedor,$nombre,$apellido,$correo,$apodo,$password,$img){
			$db=new Conexion();
			try {
				//	
				$bandera_password=false;
					if(empty($password)){//si viene vacio no actulizo el password
						$stmt= $db->conectar()->prepare("UPDATE $tabla SET 
																nombre='$nombre', 
																apellido='$apellido',
																apodo='$apodo',
																correo='$correo' , 
																img='$img',
																editado=NOW()
															WHERE id='$id_proveedor' ");
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
																apodo='$apodo',
																correo='$correo' ,
																img='$img', 
																password='$hash_password',
																editado=NOW()
														WHERE id='$id_proveedor' ");
					}
			} catch (Exception $e) {
				echo "Error".$e->getMessage();
			}
		
			

			
			$stmt->execute();

			if($stmt){
				//si se realizo la inserccion
				$respuesta=array(
					'respuesta'=>'exito',
					'nombre'=>$nombre,
					'apellido'=>$apellido,
					'correo'=>$correo,
					'apodo'=>$apodo,
					'img'=>$img,
					'password'=>$bandera_password
					);
					return $respuesta;
			}else{
				$respuesta=array(
					'respuesta'=>'false'
					);
					return $respuesta;
			}
		

			//si alguna fila se modifico entonces si se edito

			$stmt->close();
		}

		//============================ELIMINAR LOGICAMENTE  AL PROVEEDOR PROVEEDOR========================================//
		public static function sql_individual_eliminar($tabla,$id_proveedor){
			$db=new Conexion();
			try {
			$stmt= $db->conectar()->prepare("UPDATE $tabla SET 
													estado='0', 
													editado=NOW()
												WHERE id='$id_proveedor' ");

			} catch (Exception $e) {
				echo "Error".$e->getMessage();
			}
		
			
			$stmt->execute();

			if($stmt){
				//si se realizo la inserccion
				$respuesta=array(
					'respuesta'=>'exito'
					);
					return $respuesta;
			}else{
				$respuesta=array(
					'respuesta'=>'false'
					);
					return $respuesta;
			}
		
			//si alguna fila se modifico entonces si se edito
			$stmt->close();
		}

	}



 ?>