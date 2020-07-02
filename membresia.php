
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


    //=============================creacion de objetos==========================
//=============================creacion de objetos==========================

    require_once 'Controlador/class_template_index.php';
    $plantilla= new ControladorPlantilla();
	$plantilla->ctr_header();

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
			<h3 class="pricing-title">Basico</h3>
			<div class="price">$12.99<sup>/ mes</sup></div>
		
			<ul class="table-list">
				<li>15  <span> Descargas</span></li>
				<li>30 <span> Dias</span></li>
			</ul>
	
			<div class="table-buy">
				<p>$12.99<sup>/ mes</sup></p>
				<a href="#" class="pricing-action" data-precio="12.99" data-tipo="Basico">Comprar</a>
			</div>
		</div>

		<div class="pricing-table recommended">
			<h3 class="pricing-title">Premium</h3>
			<div class="price">$25<sup>/ mes</sup></div>
			
			<ul class="table-list">
				<li>30 <span> Descargas</span></li>
				<li>30 <span> Dias</span></li>
			</ul>
		
			<div class="table-buy">
				<p>$25<sup>/ mes</sup></p>
				<a href="#" class="pricing-action" data-precio="25" data-tipo="Premium">Comprar</a>
			</div>
		</div>

		<div class="pricing-table">
			<h3 class="pricing-title">Ultimate</h3>
			<div class="price">$18<sup>/ mes</sup></div>
	
			<ul class="table-list">
				<li>20<span> Descargas</span></li>
				<li>30 <span> Dias</span></li>
			</ul>
		
			<div class="table-buy">
				<p>$18<sup>/ mes</sup></p>
				<a href="#" class="pricing-action" data-precio="18" data-tipo="Ultimate">Comprar</a>
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