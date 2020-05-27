<?php

ini_set('display_errors', 'On');
//revisamos la session si existe
require'../../Controlador/class_ctr_template_admin.php';
$plantilla= new ControladorPlantilla_Admin();
$plantilla->usuario_autentificado();

//1.importo las clases  de los modelo aqui esta las consultas
require'../../Modelo/class_mdl_bd_conexion.php';
require'../../Modelo/class_mdl_recarga.php';
require'../../Modelo/class_mdl_cliente.php';


//2. importo las clases  de los controladores donde me regresa la respuesta aqui esta las consultas
include'../../Controlador/class_ctr_recarga.php';
include'../../Controlador/class_ctr_cliente.php';


//3. ENVIO LOS DATOS Q RECIVO DEL FORMULARIO CREANDO UN OBJETO DEL CONTROLADOR
$recarga= new CtrRecarga();//creo el bojeto para ocupar sus metodos


    switch (@$_POST['recarga']) {

        case 'agregar-recarga':

            //===========================1. INSERTAR O AGREGAR UNA RECARGA en la tabla cliente_recarga////////
            $respuesta_recarga_cliente=$recarga->ctr_agregar_recargas(@$_POST['id'],@$_POST['dolares'],$_POST['centavo']);

            //===========================2. Obtener el saldo actual del cliente para actualizarlo////////
            $respuesta_cliente=CtrCliente::ctr_listar_cliente();
            $id_cliente=(int)$_POST['id'];//solo acpeta enteros
            $saldo_actual_cliente=0;
			foreach($respuesta_cliente as $key=>$value){

				if($id_cliente==$value['id']){
                    $saldo_actual_cliente=$value['saldo_actual'];
                }
            }

            //============================3. Actualizar campo saldo en la tabla de cliente================
            $monto=$respuesta_recarga_cliente['monto'];//el monto q se hizo la recarga
            $total_actulizar_saldo=$saldo_actual_cliente+$monto;
            $respuesta_actulizar_saldo=CtrCliente::ctr_editar_cliente_saldo(@$_POST['id'],$total_actulizar_saldo);

            die(json_encode($respuesta_recarga_cliente));//envio el array de la tabla cliente recarga
                break;

        case 'editar-recarga':

        //===========================EDITAR  UNA RECARGA////////
            echo"editar recarga";

            break;


    }








 ?>