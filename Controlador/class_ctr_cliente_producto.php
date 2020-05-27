<?php 

    ini_set('display_errors', 'On');

    //require'Modelo/class_mdl_cliente_producto.php';


	class CtrCliente_Producto{


		//lo ma destacadop 
		public static function ctr_listar_cliente_producto(){
						$tabla="SELECT  DISTINCT 
						cliente_producto.id_producto,
						cliente_producto.fecha_compra,
						productos.url_directorio,
						proveedor.apodo,
						proveedor.img,
						biblioteca.id,
						biblioteca.genero,
						proveedor.apodo,
						productos.id_proveedor,
						productos.id,
						productos.fecha_producto,
						productos.precio
						
						FROM 			cliente_producto,proveedor,productos,biblioteca

						WHERE 			cliente_producto.id_producto=productos.id 
									AND productos.id_biblioteca=biblioteca.id
									AND productos.id_proveedor=proveedor.id
									AND proveedor.id=productos.id_proveedor
									AND proveedor.estado=1 ORDER by  cliente_producto.fecha_compra desc";

			$respuesta=Modelo_Cliente_Producto::sql_lisartar_cliente_producto($tabla);// el controlador le pide al modelo una respuesta
			return $respuesta;
		}




		//* listar  facturas del cliente producto individual detallado todo los datos
		public static function ctr_lisartar_productos_adquiridos($id_cliente,$id_factura){//listar cliente
			$respuesta=Modelo_Cliente_Producto::sql_lisartar_productos_adquiridos($id_cliente,$id_factura);// el controlador le pide al modelo una respuesta
			return $respuesta;

		}   
		
		//los productos vendidos  
		public static function productos_vendidos_proveedor($id_proveedor){//listar cliente

			$respuesta=Modelo_Cliente_Producto::sql_listar_producto_vendido_proveedor($id_proveedor);// el controlador le pide al modelo una respuesta
			return $respuesta;

		}
		
		
		public static function ctr_crear_factura($id_cliente,$total){
			$tabla="detalle_factura";
			$respuesta=Modelo_Cliente_Producto::sql_crear_factura($tabla,$id_cliente,$total);
			return $respuesta;

		}

		public static function ctr_agregar_productos_adquiridos_cliente($id_factura,$id_cliente,$id_producto,$metodo_compra,$cliente_pay,$precio_compra){//despues de q paypal confirma la trasferenica se entrea los productos
			$tabla="cliente_producto";
			$respuesta=Modelo_Cliente_Producto::sql_agregar_productos_cliente_adquiridos($tabla,$id_factura,$id_cliente,$id_producto,$metodo_compra,$cliente_pay,$precio_compra);
			return $respuesta;
		}



	}//end class



 ?>
 