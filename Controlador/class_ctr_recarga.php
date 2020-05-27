<?php

    ini_set('display_errors', 'On');

    //require'Modelo/class_mdl_cliente_producto.php';


	class CtrRecarga{



		//* listar  facturas del cliente producto individual detallado todo los datos
        public static function ctr_listar_recargas($id_cliente){//listar cliente

            $tabla="cliente_recarga";

			$respuesta=Modelo_Recarga::sql_listar_recarga($tabla,$id_cliente);// el controlador le pide al modelo una respuesta
			return $respuesta;

        }

        public static function ctr_agregar_recargas($id_cliente,$dolares,$centavos){//listar cliente

            $tabla="cliente_recarga";

			//1. inserto la recarga
			$respuesta=Modelo_Recarga::sql_insertar_recarga($tabla,$id_cliente,$dolares,$centavos);// el controlador le pide al modelo una respuesta
			return $respuesta;
		}




	}



 ?>
