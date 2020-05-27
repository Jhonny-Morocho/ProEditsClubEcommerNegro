<?php 

    ini_set('display_errors', 'On');

    //require'Modelo/class_mdl_blioteca.php';


	class CtrBiblioteca{

		public static function ctr_listar_biblioteca(){
			$tabla="biblioteca";
			$respuesta=Modelo_Biblioteca::sql_lisartar_blioteca($tabla);// el controlador le pide al modelo una respuesta
			return $respuesta;
		}

		public static function ctr_editar_biblioteca($id,$genero){
			$tabla="biblioteca";
			$respuesta=Modelo_Biblioteca::sql_editar_blioteca($tabla,$id,$genero);// el controlador le pide al modelo una respuesta
			die(json_encode($respuesta));// por q voy a usar ajax
		}

		public static function ctr_agregar_biblioteca($genero){
			$tabla="biblioteca";
			$respuesta=Modelo_Biblioteca::sql_agregar_blioteca($tabla,$genero);// el controlador le pide al modelo una respuesta
			die(json_encode($respuesta));// por q voy a usar ajax
		}


		public static function ctr_eliminar_biblioteca($id_genero){
			$tabla="biblioteca";
			$respuesta=Modelo_Biblioteca::sql_eliminar_blioteca($tabla,$id_genero);
			//envio la respuesta en forma de objeto al ajax_proveedor.js
			die(json_encode($respuesta));

		}

		


	}



 ?>
 