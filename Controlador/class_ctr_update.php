<?php 

    ini_set('display_errors', 'On');

    require'Modelo/class_mdl_update.php';


	class CtrUpdate{

		public static function ctr_listar_update(){
			$tabla="update_tabla";
			$respuesta=Modelo_Update::sql_lisartar_update($tabla);// el controlador le pide al modelo una respuesta
			return $respuesta;
		}


	}



 ?>
 