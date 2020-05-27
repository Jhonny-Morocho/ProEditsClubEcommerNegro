
<?php

ini_set('display_errors', 'On');



require'../../Modelo/class_mdl_bd_conexion.php';


include'../../Modelo/class_mdl_cliente_producto.php';
// include'../Controlador/class_ctr_proveedor.php';
include'../../Controlador/class_ctr_cliente_producto.php';

include'../../Controlador/class_ctr_template_admin.php';


//=============================creacion de objetos==========================

$plantilla= new ControladorPlantilla_Admin();
$plantilla->usuario_autentificado();
$plantilla->cerrar_session(@$_GET['cerrar_session']);//aqui cieero la session
$plantilla->ctr_header();
$plantilla->ctr_slider_raigt();
$plantilla->ctr_slider_left();
$plantilla->ctr_navegador_derecho();



?>
<!-- ==================================LISTAR MIS EDITS VENDIDOS======================
==================================LISTAR MIS EDITS VENDIDOS======================
==================================LISTAR MIS EDITS VENDIDOS====================== -->
<section class="content">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Mi Historial de ventas</h2>
                          <p>Recursos Logos de La Pagina 
                            <a href="https://drive.google.com/open?id=1TnfkC2iHMiUBbYSKeu2roegOLC6WxyxK">Descargar Logos
                            </a>
                        </p>

                </div>
            </div>

            <div class="alert alert-warning">
                                <strong>LOS EDITS DEBEN TENER CALIDAD DE 128 KBPMS con la finalidad de que se carguen rapido al reproducir!</strong> 
            </div>

            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
           
                            <div class="body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap table-hover"  width="100%"  >
                                <thead>
                                    <tr>
                                        <th># Producto </th>
                                        <th>Producto</th>
                                        <th>Id Factura</th>
                                        <th>Tipo Pago</th>
                                        <th>Precio de Venta</th>
                                        <th>Fecha de venta</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $cont=1;
                                        $suma_total=0;
                                        $productos_vendidos=CtrCliente_Producto::productos_vendidos_proveedor(@$_SESSION['id_proveedor']);

                                        //print_r($productos_vendidos);
                                        //print_r($productos_vendidos);
                                         foreach($productos_vendidos as $key=>$value){

                                             if($_SESSION['id_proveedor']==$value['id_proveedor']){

                                                  echo'<tr>
                                                             <td>'.( $value['id_producto'] ).'</td>
                                            
                                                              <td>'.( $value['url_directorio'] ).'</td>
                                                          
                                                              <td>'.( $value['id_factura'] ).'</td>
                                                              <td>'.( $value['metodo_compra'] ).'</td>
                                                              <td>'.( $value['precio_compra'] ).'</td>
                                                              <td>'.( $value['fecha_compra'] ).'</td>
                                                           
                                                      </tr>' ;
                                                      
                                                      $suma_total=$value['precio_compra']+$suma_total;

                                              }
                                         }

                                    ?>

                                </tbody>
                            </table>
                            <?php echo "Suma total: ".$suma_total;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
</section>


<?php

$plantilla->ctr_footer();

?>