
<!-- ===================================LISTAR PRODUCTOS VENDIDOS  ==================================
===================================LISTAR PRODUCTOS VENDIDOS  ==================================
===================================LISTAR PRODUCTOS VENDIDOS  ================================== -->

<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Historial de ventas del Proveedor: </h2>
                  

            </div>
        </div>

        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
        
                        <div class="body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap table-hover"  width="100%"  >
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Id Factura</th>
                                    <th>Precio de Venta</th>
                                    <th>Tipo Pago</th>
                                    <th>Fecha de venta</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                                $cont=1;
                                $suma_total=0;
                                $productos_vendidos=CtrCliente_Producto::productos_vendidos_proveedor(@$_GET['id_proveedor']);
                                //print_r($productos_vendidos);
                                    foreach($productos_vendidos as $key=>$value){

                                        if(@$_GET['id_proveedor']==$value['id_proveedor']){

                                            echo'<tr>
                                                        <td>'.( $value['url_directorio'] ).'</td>
                                                        <td>'.( $value['id_factura'] ).'</td>
                                                        <td>'.( $value['precio_compra'] ).'</td>
                                                        <td>'.( $value['metodo_compra'] ).'</td>
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
