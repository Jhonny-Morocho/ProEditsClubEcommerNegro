
<?php



ini_set('display_errors', 'On');
require'Modelo/class_mdl_bd_conexion.php';
require'Modelo/class_mdl_proveedor.php';
require'Modelo/class_mdl_cliente.php';// para ver las facturas
require'Modelo/class_mdl_cliente_producto.php';
require'Modelo/class_mdl_membresia.php';


include'Controlador/class_ctr_update.php';
include'Controlador/class_ctr_proveedor.php';
include'Controlador/class_ctr_cliente_producto.php';
include'Controlador/class_ctr_biblioteca.php';
include'Controlador/class_ctr_cliente.php';// para ver las facturas
include'Controlador/class_ctr_membresia.php';


require_once 'Controlador/class_template_index.php';


//=============================creacion de objetos==========================

$plantilla= new ControladorPlantilla();
$plantilla->usuario_autentificado();//compruebo si existe una sesion para q pueda acceedere al panel
$plantilla->cerrar_session(@$_GET['cerrar_session']);//aqui cieero la session por metio de get si envia por la url
$plantilla->ctr_header();
$plantilla->ctr_modal_info();
$plantilla->ctr_panel_admin();//el panel de administracion
$plantilla->reproductor();
$plantilla->ctr_lista_update();
$plantilla->ctr_footer();
$plantilla->wassap();



//qui cierro la session del cliente mato la asession






?>