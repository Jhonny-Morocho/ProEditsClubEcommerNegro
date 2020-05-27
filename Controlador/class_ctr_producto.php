<?php
    ini_set('display_errors', 'On');

    class CtrProducto{
            //* listar  facturas del cliente individual
            
            public static function ctr_listar_productos(){//listar cliente
                $respuesta=Modelo_Producto::sql_listar_productos();// el controlador le pide al modelo una respuesta
                return $respuesta;
            } 
        
        
        
            public static function ctr_agregar_producto($id_proveedor,$id_genero,$url_descarga,$precio,$musica_url){
			
            $tabla="productos";
			$respuesta=Modelo_Producto::sql__agragar_producto($tabla,$id_proveedor,$id_genero,$url_descarga,$precio,$musica_url);// el controlador le pide al modelo una respuesta
            //print_r($respuesta);
            die(json_encode($respuesta));
        }


            public static function ctr_editar_producto($id_producto,$id_genero,$url_descarga,$precio,$titulo_nuevo,$titulo_antiguo){
			
            $tabla="productos";
			$respuesta=Modelo_Producto::sql__editar_producto($tabla,$id_producto,$id_genero,$url_descarga,$precio,$titulo_nuevo,$titulo_antiguo);// el controlador le pide al modelo una respuesta
            //print_r($respuesta);
            die(json_encode($respuesta));
        }

            public static function ctr_eliminar_producto($id_producto,$titulo_arhivo){
			
            $tabla="productos";

			$respuesta=Modelo_Producto::sql__eliminar_producto($tabla,$id_producto,$titulo_arhivo);// el controlador le pide al modelo una respuesta
            die(json_encode($respuesta));
        }
		
    }


?>