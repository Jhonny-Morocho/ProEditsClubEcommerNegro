<?php

    ini_set('display_errors', 'On');

    require'Modelo/class_mdl_bd_conexion.php';
    require'Modelo/class_mdl_proveedor.php';
    require'Modelo/class_mdl_cliente.php';


    include'Controlador/class_ctr_proveedor.php';
    include'Controlador/class_ctr_cliente.php';
    include'Controlador/class_ctr_validacion_campos.php';//ocupo la clase de validacion


    require_once 'Controlador/class_template_index.php';


    $admin=new CtrProveedor();
    $cliente=new CtrCliente();





///==================inicio de session para cliente y administrados=======================
///==================inicio de session para cliente y administrados=======================
///==================inicio de session para cliente y administrados=======================
switch (@$_POST['login']) {
    
    case 'login-admin':
    

            $admin->ctr_proveedor_login();
            
            break;

        case 'login-cliente': 
            $cliente->ctr_cliente_login();

            break;
    }



    
///==================AGREGAR O REGISTRO DE CLIENTES=======================
///==================AGREGAR O REGISTRO DE CLIENTES=======================
///==================AGREGAR O REGISTRO DE CLIENTES=======================
switch (@$_POST['cliente']) {
    
    case 'agregar':

             $cliente->ctr_agregar_cliente((@$_POST['nombre']),(@$_POST['apellido']),(@$_POST['correo']),(@$_POST['password_1']));
          
            break;

        case 'editar': 

     
         $cliente->ctr_editar_cliente( @$_POST['id_cliente'],(@$_POST['nombre']),(@$_POST['apellido']),(@$_POST['correo']),(@$_POST['password_1']));
           

            break;
    }



 ?>