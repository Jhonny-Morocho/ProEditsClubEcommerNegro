<?php

ini_set('display_errors', 'On');
//require'class_mdl_bd_conexion.php';

	/**
	 *
	 */
	class Modelo_Recarga {
		//satic cuando recibo algo siempre van como static



		public static  function sql_insertar_recarga($tabla,$id_cliente,$dolares,$centavos){
			$db=new Conexion();

			$total=(double)$dolares.".".$centavos;
			date_default_timezone_set('America/Guayaquil');
			$fecha_actual=date("Y-m-d H:i:s");

			$stmt= $db->conectar()->prepare("INSERT INTO $tabla
																(id_cliente,
																valor,
																fecha_recarga
																)

														VALUES('$id_cliente',
																'$total',
																'$fecha_actual'
																) ");
			$stmt->execute();
			$id=$db->lastInsertId();

			if ( $stmt->rowCount() > 0) {
				//Se grabo bien
				$respuesta=array(
					'respuesta'=>'exito',
					'id_cliente'=>$id_cliente,
					'id_recarga'=>$id,
					'monto'=>$total
					);
				return $respuesta;
			 }

			$stmt->close();

		}

		public static  function sql_listar_recarga($tabla,$id_cliente){
			$db=new Conexion();
			$stmt= $db->conectar()->prepare(" SELECT
															cliente_recarga.fecha_recarga,
															cliente_recarga.valor

													FROM 	 $tabla

													WHERE
															cliente_recarga.id_cliente='$id_cliente' ORDER by id ");

			$stmt->execute();
			return $stmt->fetchAll();

			$stmt->close();

		}

    }


 ?>