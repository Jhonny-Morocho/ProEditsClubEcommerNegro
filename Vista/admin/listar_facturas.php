
<?php

ini_set('display_errors', 'On');



require'../../Modelo/class_mdl_bd_conexion.php';

require'../../Modelo/class_mdl_cliente.php';



// include'Controlador/class_ctr_update.php';
include'../../Controlador/class_ctr_cliente.php';
// include'Controlador/class_ctr_cliente_producto.php';
// include'Controlador/class_ctr_biblioteca.php';

require'../../Controlador/class_ctr_template_admin.php';




//=============================creacion de objetos==========================

$plantilla= new ControladorPlantilla_Admin();
$plantilla->usuario_autentificado();
$plantilla->seguridad_admin();
$plantilla->ctr_header();
$plantilla->ctr_slider_left();
$plantilla->ctr_slider_raigt();
$plantilla->ctr_navegador_derecho();
$plantilla->ctr_tabla_facturas();
$plantilla->ctr_navegador_derecho();
$plantilla->ctr_footer();