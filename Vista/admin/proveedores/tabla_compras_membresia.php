<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Historial de Membresias</h2>
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

                        <div class="body">
                    
                            <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap table-hover"  width="100%"  >
                                    <thead>
                                        <tr>
                                        
                                            <th>Tipo Membresia</th>
                                            <th>Fecha Compra</th>
                                            <th>Fecha expiracion</th>
                                            <th>Rango</th>
                                            <th>Precio</th>
                                            <th>Tipo Pago</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        $listar_membresia=CtrMembresia::ctr_listar_membresia();
                                        $tipo_membresia="";

                                        foreach($listar_membresia as $key=>$value){
                                        
                                            if(@$_GET['id']==$value['id_cliente']){

                                                switch (@$value['tipo']) {

                                                    case 'Nombre Cancion: Basico':

                                                        $tipo_membresia="Basico";
                                                    
                                                        break;
                                    
                                                    case 'Nombre Cancion: Premium':
                                                        $tipo_membresia="Premium";
                                                        
                                                        break;
                                    
                                    
                                                    case 'Nombre Cancion: Ultimate':
                                                            $tipo_membresia="Ultimate";
                                                        
                                                        break;
                                                }   
                                                echo"<tr>";
                                                    echo"<td>".$tipo_membresia."</td>";
                                                    echo"<td>".$value['fecha_inicio']."</td>";
                                                    echo"<td>".$value['fecha_culminacion']."</td>";
                                                    echo"<td>".$value['rango']."</td>";
                                                    echo"<td> $ ".$value['precio']."</td>";
                                                    echo"<td>  ".$value['tipo_pago']."</td>";
                                                echo"</tr>";

                                            }
                                        }

                                    ?>
                            
                            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Hover Rows --> 
        </div>
    </div>
</section>