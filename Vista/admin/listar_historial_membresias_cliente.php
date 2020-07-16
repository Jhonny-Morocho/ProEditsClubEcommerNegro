
<?php

ini_set('display_errors', 'On');

require'../../Modelo/class_mdl_bd_conexion.php';//base de datos


require'../../Modelo/class_mdl_cliente_membresia.php';
include'../../Controlador/class_ctr_membresia.php';

// require'../../Modelo/class_mdl_cliente_producto.php';
// include'../../Controlador/class_ctr_cliente_producto.php';





//inicio la session
require'../../Controlador/class_ctr_template_admin.php';//plantilla de interfaz
// $proveedor= new CtrProveedor();
// $proveedor->ctrl_session();
//=============================creacion de objetos==========================



    $plantilla= new ControladorPlantilla_Admin();
    $plantilla->seguridad_admin();
    $plantilla->usuario_autentificado();
    $plantilla->ctr_header();
    $plantilla->ctr_slider_left();
    $plantilla->ctr_slider_raigt();
    $plantilla->ctr_navegador_derecho();
    //die(json_encode($listar_membresia));
    $plantilla->ctr_tabla_compras_membresias();//tabla de clientes
    $plantilla->ctr_footer();

