<?php 
	//require'class_mdl_bd_conexion.php';
    ini_set('display_errors', 'On');

	/**
	 * 
	 */
	class Modelo_Biblioteca {
		//satic cuando recibo algo siempre van como static
		 public static  function sql_lisartar_blioteca($tabla){
			$db=new Conexion();
			$stmt= $db->conectar()->prepare("SELECT  *FROM $tabla where estado ='1' ORDER by genero");

			$stmt->execute();
			return $stmt->fetchAll();

			$stmt->close();

		}

		public static  function sql_editar_blioteca($tabla,$id,$genero){
			$db=new Conexion();
			$stmt= $db->conectar()->prepare("UPDATE $tabla SET
													genero='$genero'
													WHERE id='$id' ");

			$stmt->execute();

			if ( $stmt->rowCount() > 0) {
				//Se grabo bien
					$respuesta=array(
						'respuesta'=>'exito',
						'genero'=>$genero
						);
				return $respuesta;
			 }
			$stmt->close();

		}

		public static  function sql_agregar_blioteca($tabla,$genero){
			$db=new Conexion();
			$stmt= $db->conectar()->prepare("INSERT INTO $tabla (genero,estado) VALUES('$genero','1') ");

			$stmt->execute();

			if ( $stmt->rowCount() > 0) {
				//Se grabo bien
					$respuesta=array(
						'respuesta'=>'exito',
						'genero'=>$genero
						);
				return $respuesta;
			 }
			$stmt->close();

		

		}


		public static function sql_eliminar_blioteca($tabla,$id_genero){
			$db=new Conexion();
			try {
			$stmt= $db->conectar()->prepare("UPDATE $tabla SET 
													estado='0' 
												WHERE id=$id_genero ");

			} catch (Exception $e) {
				echo "Error".$e->getMessage();
			}
		
			
			$stmt->execute();

			if ( $stmt->rowCount() > 0) {
				//Se grabo bien en la base de datos
                $respuesta=array(
                    'respuesta'=>'exito',
                    );
				return $respuesta;
			 }else{
                $respuesta=array(
                    'respuesta'=>'fallido'
                    );
				return $respuesta;
             }
		
			//si alguna fila se modifico entonces si se edito
			$stmt->close();
		}

	}



 ?>