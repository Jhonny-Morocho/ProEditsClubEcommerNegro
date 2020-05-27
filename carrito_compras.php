
<?php

ini_set('display_errors', 'On');
session_start();
require'Modelo/class_mdl_bd_conexion.php';
require'Modelo/class_mdl_proveedor.php';
require'Modelo/class_mdl_cliente_producto.php';
require'Modelo/class_mdl_producto.php';


include'Controlador/class_ctr_update.php';
include'Controlador/class_ctr_proveedor.php';
include'Controlador/class_ctr_producto.php';
include'Controlador/class_ctr_cliente_producto.php';
include'Controlador/class_ctr_biblioteca.php';

//comprobar si existe session y cerrar session
// include'Controlador/class_ctr_template_admin.php';
// $plantilla= new ControladorPlantilla_Admin();
// $plantilla->usuario_autentificado();
// $plantilla->cerrar_session(@$_GET['cerrar_session']);






//=============================creacion de objetos==========================
//=============================creacion de objetos==========================

require_once 'Controlador/class_template_index.php';
$plantilla= new ControladorPlantilla();

//$plantilla->usuario_autentificado();
//$plantilla->cerrar_session(@$_GET['cerrar_session']);//aqui cierro la session
$plantilla->ctr_header();
$plantilla->ctr_slider();
$plantilla->ctr_tabla_carrito_compras();
$plantilla->ctr_modal_info();
$plantilla->ctr_lista_update();

$plantilla->ctr_footer();
$plantilla->wassap();








?>

      