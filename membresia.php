
<?php
    ini_set('display_errors', 'On');


    session_start();
    require'Modelo/class_mdl_bd_conexion.php';
    require'Modelo/class_mdl_proveedor.php';
    require'Modelo/class_mdl_cliente_producto.php';
	require'Modelo/class_mdl_producto.php';
	require'Modelo/class_mdl_membresia.php';


	include'Controlador/class_ctr_update.php';
	include'Controlador/class_ctr_proveedor.php';
	include'Controlador/class_ctr_producto.php';
	include'Controlador/class_ctr_cliente_producto.php';
	include'Controlador/class_ctr_biblioteca.php';


    //=============================creacion de objetos==========================
//=============================creacion de objetos==========================

    require_once 'Controlador/class_template_index.php';
    $plantilla= new ControladorPlantilla();
	$plantilla->ctr_header();

	// ====================Listar Membresias disponibles=================
	// ====================Listar Membresias disponibles=================
	$membresias=ModeloMembresia::sqlListarMembresias();


?>





<!-- partial:index.partial.html -->
<!-- Contenedor -->
<!-- <div class="pricing-wrapper clearfix" style="padding-bottom: 50px;">
	<div class="row">
		<div class="col-lg-12">
			<img src="img_dj/construccion.jpg">
		</div>
	</div>
</div> -->


	<div class="pricing-wrapper clearfix" style="padding-bottom: 50px;">
		<div class="pricing-table">
			<h3 class="pricing-title"><?php echo $membresias[0]['nombreMembresia']?></h3>
			<div class="price">$<?php echo $membresias[0]['precio']?><sup>/ mes</sup></div>
		
			<ul class="table-list">
				<li><?php echo $membresias[0]['numDescargas']?> <span> Descargas</span></li>
				<li>30 <span> Dias</span></li>
			</ul>
	
			<div class="table-buy">
				<p>$<?php echo $membresias[0]['precio']?><sup>/ mes</sup></p>
				<a href="#" class="pricing-action" data-precio="<?php echo $membresias[0]['precio']?>" 
													data-numDescargas="<?php echo $membresias[0]['numDescargas']?>"
												 data-tipo="<?php echo $membresias[0]['nombreMembresia']?>">Comprar</a>
			</div>
		</div>

		<div class="pricing-table recommended">
			<h3 class="pricing-title"><?php echo $membresias[1]['nombreMembresia']?></h3>
			<div class="price">$<?php echo $membresias[1]['precio']?><sup>/ mes</sup></div>
			
			<ul class="table-list">
				<li><?php echo $membresias[1]['numDescargas']?> <span> Descargas</span></li>
				<li>30 <span> Dias</span></li>
			</ul>
		
			<div class="table-buy">
				<p>$<?php echo $membresias[1]['precio']?><sup>/ mes</sup></p>
				<a href="#" class="pricing-action" data-precio="<?php echo $membresias[1]['precio']?>" 
													data-numDescargas="<?php echo $membresias[1]['numDescargas']?>"
													data-tipo="<?php echo $membresias[1]['nombreMembresia']?>">Comprar</a>
			</div>
		</div>

		<div class="pricing-table">
			<h3 class="pricing-title"><?php echo $membresias[2]['nombreMembresia']?></h3>
			<div class="price">$<?php echo $membresias[2]['precio']?><sup>/ mes</sup></div>
	
			<ul class="table-list">
				<li><?php echo $membresias[2]['numDescargas']?> <span> Descargas</span></li>
				<li>30 <span> Dias</span></li>
			</ul>
		
			<div class="table-buy">
				<p>$<?php echo $membresias[2]['precio']?><sup>/ mes</sup></p>
				<a href="#" class="pricing-action" data-precio="<?php echo $membresias[2]['precio']?>" 
													data-numDescargas="<?php echo $membresias[2]['numDescargas']?>"
													data-tipo="<?php echo $membresias[2]['nombreMembresia']?>">Comprar</a>
			</div>
		</div>
		
	
	</div> 
<!-- partial -->


<?php
//$plantilla->ctr_slider();
$plantilla->ctr_lista_update();
$plantilla->reproductor();
$plantilla->ctr_footer();
$plantilla->ctr_modal_info();
$plantilla->wassap();

?>