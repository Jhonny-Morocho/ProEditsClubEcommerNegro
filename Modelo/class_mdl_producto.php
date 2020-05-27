<?php 

    ini_set('display_errors', 'On');

    class Modelo_Producto
    {   
        public static function sql_listar_productos(){//funcion para listar productos
            $db=new Conexion();
            $stmt= $db->conectar()->prepare("SELECT    
                                                            proveedor.apodo,
                                                            productos.fecha_producto,
                                                            productos.url_directorio,
                                                            productos.url_descarga,
                                                            productos.precio, 
                                                            productos.id_proveedor, 
                                                            productos.id ,
                                                            biblioteca.genero,
                                                            productos.id_biblioteca,
                                                            proveedor.img 

                                                    from    proveedor,
                                                            productos,
                                                            biblioteca
                                                    WHERE 
                                                            productos.id_proveedor=proveedor.id 
                                                    and     productos.id_biblioteca=biblioteca.id 
                                                    and     productos.activo=1 

                                                    and productos.tipo='audio' 
                                                    and proveedor.estado='1'

                                                    ORDER by  productos.id  desc ");
            $stmt->execute();
            return $stmt->fetchAll();
            
            $stmt->close();
 
        }

        public static  function sql__agragar_producto($tabla,$id_proveedor,$id_genero,$url_descarga,$precio,$musica_url){
        $db=new Conexion();
        date_default_timezone_set('America/Guayaquil');
        $fecha_actual=date("Y-m-d");

			$stmt= $db->conectar()->prepare("INSERT INTO $tabla 
																(precio,
																url_descarga,
																url_directorio,
																id_biblioteca,
                                                                id_proveedor,
																activo,
                                                                fecha_producto,
																tipo,
                                                                frame) 

														VALUES('$precio',
																'$url_descarga',
																'$musica_url',
																'$id_genero',
																'$id_proveedor',
																'1',
																'$fecha_actual',
                                                                'audio',
                                                                '') 
                                                    ");

            $stmt->execute();
            $id=$db->lastInsertId();

			if ( $stmt->rowCount() > 0) {
				//Se grabo bien en la base de datos
                $respuesta=array(
                    'respuesta'=>'exito',
                    'id_producto'=>$id,
                    'titulo'=>$musica_url,
                    'precio'=>$precio
                    );
				return $respuesta;
			 }else{
                $respuesta=array(
                    'respuesta'=>'fallido'
                    );
				return $respuesta;
             }

			$stmt->close();

        }
        
        public static  function sql__editar_producto($tabla,$id_producto,$id_genero,$url_descarga,$precio,$titulo_nuevo,$titulo_antiguo){
            
            $db=new Conexion();
             $bandera=false;

            
        

            if($titulo_nuevo==$titulo_antiguo){

                $stmt= $db->conectar()->prepare("UPDATE  $tabla SET
                                                            precio='$precio',
                                                            url_descarga='$url_descarga',
                                                            id_biblioteca='$id_genero'
                                                        WHERE id='$id_producto'
                                                        
                                                        ");

            }else{

                $archivoAbierto = fopen('../../biblioteca/'.$titulo_antiguo, 'r');//encontrar el archivo

                fclose($archivoAbierto); 	
                rename( '../../biblioteca/'.$titulo_antiguo, '../../biblioteca/'.$titulo_nuevo );
                
                $stmt= $db->conectar()->prepare("UPDATE  $tabla SET
                                                        precio='$precio',
                                                        url_descarga='$url_descarga',
                                                        url_directorio='$titulo_nuevo',
                                                        id_biblioteca='$id_genero'
                                                    WHERE id='$id_producto'
                                                    
                                                    ");
                $bandera=true;
            }
            
            $stmt->execute();

            //si se afecto alguna columna entonces si se realizo actulizo los datos
            if($stmt){
				//si se realizo la inserccion
				$respuesta=array(
					'respuesta'=>'exito',
                    'actulizar_titulo'=>$bandera,
                    'precio'=>$precio
					);
					return $respuesta;
			}else{
				$respuesta=array(
					'respuesta'=>'false'
					);
					return $respuesta;
			}

            $stmt->close();
            
        }
        
        
        public static function sql__eliminar_producto($tabla,$id_producto,$titulo_arhivo){
            $db=new Conexion();

            try{
                $dir='../../biblioteca/'.$titulo_arhivo; //puedes usar dobles comillas si quieres 
                
                $bandera_borrar=false;

                    if(file_exists($dir)) 
                    { 
                        if(unlink($dir)) 
                        $bandera_borrar=true; 
                    }
           
                
                //die(json_encode($_POST));// die imprime un mensaje del scrip
    
                $stmt= $db->conectar()->prepare("UPDATE productos
                                                        SET activo='0' 

                                                        WHERE id='$id_producto'
                                        ");

                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {

                        $respuesta=array(
                            'respuesta'=>'exito',
                            'archivo'=>$titulo_arhivo,
                            'bandera_borrar'=>$bandera_borrar,
                            'id_producto'=>$id_producto

                        );
                        
                    }else{
                        $respuesta=array(
                            'respuesta'=>'error'
                        );
                    }
                } catch (Exception $e) {
                    $respuesta=array('respuesta'=> $e->getMessage());
                }
                
                
            return $respuesta;
            
            $stmt->close();

        }
        
    }
    

?>