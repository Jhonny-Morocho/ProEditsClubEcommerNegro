<?php

ini_set('display_errors', 'On');

//require'class_mdl_bd_conexion.php';
	/**
	 *
	 */
	class ModeloMembresia {


	

        public static  function sqlListarMembresias(){
            $db=new Conexion();


            try {
                    $stmt= $db->conectar()->prepare("SELECT * FROM  membresia ");
            } catch (Exception $e) {
                //echo "Error".$e->getMessage();
                $respuesta=array(
                    'respuesta'=>$e->getMessage()
                    );
            }

            $stmt->execute();

            return $stmt->fetchAll();
			$stmt->close();

        }
        
	}



 ?>