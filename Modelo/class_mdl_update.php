<?php 

ini_set('display_errors', 'On');

//require'class_mdl_bd_conexion.php';
	/**
	 * 
	 */
	class Modelo_Update {
		//satic cuando recibo algo siempre van como static
		 public static  function sql_lisartar_update($tabla){
			$db=new Conexion();

			$stmt= $db->conectar()->prepare("SELECT * FROM $tabla ");

			$stmt->execute();
			return $stmt->fetchAll();

			$stmt->close();

		}
	}



 ?>