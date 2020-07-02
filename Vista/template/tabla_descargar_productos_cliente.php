      <!-- Single Tab Content Start -->
    <?php  $facturas=CtrCliente::ctr_listar_compra(@$_SESSION['id_cliente']); //declaro el objeto para poder listar lo datos
            $cont=1; 

         
    
    ?> 
      <div class="tab-pane fade" id="download" role="tabpanel">
            <!-- <div class="myaccount-content">

                <div class="myaccount-table table-responsive text-center">
                     -->
                    <?php foreach($facturas as $key=>$value){?>
                        <h3> <br> Fecha de compra: <?php echo $value['fecha_factura'] ?> </h3>
                        <h4>Total : <?php echo $value['total'] ?></h4>
                        

                    <table id="example" class="table table-hover table-dark"  width="100%">
                        <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Download</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Metodo de Compra</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $cont_2=1; $clientes_producto=CtrCliente_Producto::ctr_lisartar_productos_adquiridos(@$_SESSION['id_cliente'],$value['id']); 
                                foreach($clientes_producto as $key=>$value){
                                    echo'<tr>
                            <div class="container">
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <th scope="row">'.$cont_2.'</th>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <td> 
                                                <a href=" '.$value['url_descarga'].' " target="_blank" class="check-btn sqr-btn">
                                                    <i class="fa fa-cloud-download"></i>
                                                </a>
                                            </td>
                                            
                                        </div>
                                    </div>


                                        <div class="row">
                                            <div class="col-lg-2 col-sm-3">
                                               
                                            <td>'.$value['url_directorio'].'</td>
                                                
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-2 col-sm-3">
                                            <td>'.$value['precio_compra'].'</td>
                                            
                                            </div>
                                        </div>
                                    
                                            <td>'.$value['metodo_compra'].'</td>

                                        </tr>
                        </div>'
                                         ;
                                    $cont_2++;
                                } 
                        ?>
                        
                        </tbody>
                    </table>

                <?php $cont++; } ?>
                <!-- </div>
            </div> -->
        </div>
        <!-- Single Tab Content End -->