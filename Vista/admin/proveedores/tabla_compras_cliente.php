<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Historial de Compras de Clientes</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Normal Tables</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>

            <!-- Hover Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Hover</strong> Rows</h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>

                        <?php  $clientes=CtrCliente::ctr_listar_compra(@$_GET['id']); $cont=1; ?>

                        <?php 
                                foreach($clientes as $key=>$value){?>

                                    <div class="body">
                                        <p>#<strong>  <?php echo $cont ?></strong>
                                        <br><strong>Fecha Facturacion :</strong> <?php echo $value['fecha_factura'] ?> 
                                        <br><strong>Total : $ </strong> <?php echo $value['total'] ?> </p>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Producto</th>
                                                        <th>Precio</th>
                                                        <th>Metodo de compra</th>
                                                        <th>Descargar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                        <?php $cont_2=1; $clientes_producto=CtrCliente_Producto::ctr_lisartar_productos_adquiridos(@$_GET['id'],$value['id']); 
                                                foreach($clientes_producto as $key=>$value){
                                                    echo'<tr>
                                                            <th scope="row">'.$cont_2.'</th>
                                                            <td>'.$value['url_directorio'].'</td>
                                                            <td>'.$value['precio_compra'].'</td>
                                                            <td>'.$value['metodo_compra'].'</td>
                                                            <td> 
                                                                <a href=" '.$value['url_descarga'].' " target="_blank" class="btn btn-primary">
                                                                    <i class="zmdi zmdi-hc-fw"></i>
                                                                </a>
                                                            </td>

                                                        </tr>';
                                                    $cont_2++;
                                                } 
                                        ?>
                                                    
                                        
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <br>
                            <?php $cont++; } ?>

                    </div>
                </div>
            </div>
            <!-- #END# Hover Rows --> 
        </div>
    </div>
</section>