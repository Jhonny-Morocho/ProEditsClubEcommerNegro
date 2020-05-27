
<?php

ini_set('display_errors', 'On');

require'../../Modelo/class_mdl_bd_conexion.php';//base de datos


require'../../Modelo/class_mdl_cliente.php';
include'../../Controlador/class_ctr_cliente.php';





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
$plantilla->ctr_tabla_cliente();//tabla de clientes
$plantilla->ctr_footer();