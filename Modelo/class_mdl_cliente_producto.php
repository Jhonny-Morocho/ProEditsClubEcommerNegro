<?php
//require'class_mdl_bd_conexion.php';
ini_set('display_errors', 'On');

/**
 *
 */
class Modelo_Cliente_Producto {


    //satic cuando recibo algo siempre van como static
     public static  function sql_lisartar_cliente_producto($tabla){// los productos recien adquieridos el top 15
        $db=new Conexion();
        $stmt= $db->conectar()->prepare($tabla);

        $stmt->execute();
        return $stmt->fetchAll();

        $stmt->close();

    }

    //este metodo es para saeber los productos q a comprado el cliente las facturas
    public static  function sql_lisartar_productos_adquiridos($id_cliente,$id_factura){//los productos del cliente adquirido
        $db=new Conexion();
        try {
            $stmt= $db->conectar()->prepare("SELECT
                                                        cliente_producto.id_cliente,
                                                        cliente_producto.id_producto,
                                                        cliente_producto.metodo_compra,
                                                        cliente_producto.precio_compra,
                                                        productos.url_directorio,
                                                        productos.url_descarga
                                                    from
                                                        cliente_producto,
                                                        detalle_factura,
                                                        productos
                                                    WHERE
                                                            detalle_factura.id_cliente='$id_cliente'
                                                    and     cliente_producto.id_factura=detalle_factura.id
                                                    and     detalle_factura.id='$id_factura'
                                                    and     productos.id=cliente_producto.id_producto ORDER by cliente_producto.id_cliente ");

            $stmt->execute();
        } catch (Exception $e) {
                $error=$e->getMessage();
                echo $error;

            }
        return $stmt->fetchAll();

        $stmt->close();

    }


    //saber los productos vendidos por el proveedor
    public static function sql_listar_producto_vendido_proveedor($id_proveedor){
        $db=new Conexion();
        try {
            $stmt= $db->conectar()->prepare("SELECT
                                                        cliente_producto.id_producto,
                                                        cliente_producto.id_factura,
                                                        productos.url_directorio,
                                                        cliente_producto.precio_compra,
                                                        productos.id_proveedor,
                                                        productos.url_descarga,

                                                        cliente_producto.fecha_compra,
                                                        cliente_producto.metodo_compra,	
                                                        cliente_producto.id_cliente
                                                from
                                                        cliente_producto,
                                                        productos

                                                WHERE
                                                        productos.id_proveedor='$id_proveedor'

                                                and     cliente_producto.id_producto=productos.id


                                                ORDER by  cliente_producto.fecha_compra desc
                ");


                $stmt->execute();

            } catch (Exception $e) {
                $error=$e->getMessage();
                echo $error;

              }

        return $stmt->fetchAll();

        $stmt->close();


    }


     //agregar la facutura del cliente
     public static function sql_crear_factura($tabla,$id_cliente,$total){
        $db=new Conexion();
        date_default_timezone_set('America/Guayaquil');
        $fecha_actual=date("Y-m-d H:i:s");
        try {
            $stmt= $db->conectar()->prepare("INSERT INTO $tabla
                                                        (total,
                                                        id_cliente,
                                                        fecha_factura
                                                        )
                                                VALUES('$total',
                                                        '$id_cliente',
                                                        '$fecha_actual'

                                                    )          ");


                $stmt->execute();
                $id=$db->lastInsertId();

                if ( $stmt->rowCount() > 0) {
                    //Se grabo bien en la base de datos
                    $respuesta=array(
                        'respuesta'=>'exito',
                        'id_factura'=>$id
                        );

                 }else{
                    $respuesta=array(
                        'respuesta'=>'fallido'
                        );

                 }


            } catch (Exception $e) {
                $error=$e->getMessage();
                // echo $error;
                $respuesta=array(
                    'respuesta'=>'erro_try_cacth',
                    'error'=>$error
                    );

              }

        return $respuesta;


    }


    public static function sql_agregar_productos_cliente_adquiridos($tabla,$id_factura,$id_cliente,
                                                                $id_producto,$metodo_compra,
                                                                $cliente_pay,
                                                                $precio_compra){
        $db=new Conexion();
        date_default_timezone_set('America/Guayaquil');
        $fecha_actual=date("Y-m-d H:i:s");
        try {
            $stmt= $db->conectar()->prepare("INSERT INTO $tabla
                                                        (id_cliente,
                                                        id_producto,
                                                        metodo_compra,
                                                        cliente_pay,
                                                        id_factura,
                                                        precio_compra,
                                                        fecha_compra
                                                        )
                                                VALUES('$id_cliente',
                                                        '$id_producto',
                                                        '$metodo_compra',
                                                        '$cliente_pay',
                                                        '$id_factura',
                                                        '$precio_compra',
                                                        '$fecha_actual'

                                                    )          ");


                $stmt->execute();
                $id=$db->lastInsertId();

                if ( $stmt->rowCount() > 0) {
                    //Se grabo bien en la base de datos
                    $respuesta=array(
                        'respuesta'=>'exito',
                        'id_tabla_cliente_producto'=>$id
                        );

                 }else{
                    $respuesta=array(
                        'respuesta'=>'fallido'
                        );

                 }


            } catch (Exception $e) {
                $error=$e->getMessage();
                // echo $error;
                $respuesta=array(
                    'respuesta'=>'erro_try_cacth',
                    'error'=>$error
                    );

              }

        return $respuesta;


    }




}
