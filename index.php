

<?php

ini_set('display_errors', 'On');


session_start();
require'Modelo/class_mdl_bd_conexion.php';
require'Modelo/class_mdl_proveedor.php';
require'Modelo/class_mdl_cliente_producto.php';
require'Modelo/class_mdl_producto.php';




//include'Controlador/class_ctr_update.php';
include'Controlador/class_ctr_proveedor.php';
include'Controlador/class_ctr_producto.php';
include'Controlador/class_ctr_cliente_producto.php';
include'Controlador/class_ctr_biblioteca.php';

//paginacion
require'Modelo/class_mdl_Paginacion.php';
include'Controlador/class_ctr_paginacion.php';


//=============================creacion de objetos==========================
//=============================creacion de objetos==========================

require_once 'Controlador/class_template_index.php';
$plantilla= new ControladorPlantilla();
$biblioetca= new CtrBiblioteca();


//$plantilla->usuario_autentificado();
//$plantilla->cerrar_session(@$_GET['cerrar_session']);//aqui cierro la session
$plantilla->ctr_header();
$plantilla->ctr_slider();
$plantilla->ctr_categorias();
$plantilla->ctr_lista_update();
$plantilla->reproductor();
$plantilla->wassap();
$plantilla->ctr_footer();


?>
