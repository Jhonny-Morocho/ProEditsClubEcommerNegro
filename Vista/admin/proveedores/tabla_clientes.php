
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Lista de Clientes</h2>
                    <!-- <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Normal Tables</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button> -->
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                           
                            <!-- <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right slideUp">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul> -->
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap table-hover"  width="100%"  >
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Correo</th>
                                            <th>Fecha Registro</th>
                                            <th>Compras</th>
                                            <th>Membresias</th>
                                            <th>Recargar Monedero</th>
                                            <th>Acciones</th>
                     
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Correo</th>
                                            <th>Fecha Registro</th>
                                            <th>Compras</th>
                                            <th>Membresias</th>
                                            <th>Recargar Monedero</th>
                                            <th>Acciones</th>
                            

                                        </tr>
                                    </tfoot>
                                    <tbody>

                                <?php 

                                    $clientes=CtrCliente::ctr_listar_cliente();
                                    foreach($clientes as $key=>$value){
                                        echo'<tr>  
                                                    <td>'.( $value['nombre'] ).'</td>
                                                    <td>'.( $value['apellido'] ).'</td>
                                                    <td>'.( $value['correo'] ).'</td>
                                                    <td>'.( $value['fecha_registro'] ).'</td>
                                                    <td>  <a href="../Vista/admin/listar_historial_compras_cliente.php?id='.$value['id'].' "  class="btn btn-info "><i class="zmdi zmdi-hc-fw"></i> </a></td>
                                                    <td>  <a href="../Vista/admin/listar_historial_membresias_cliente.php?id='.$value['id'].' "  class="btn btn-info "><i class="zmdi zmdi-hc-fw"></i> </a></td>
                                                    <td>  <a href="../Vista/admin/form_recarga_agregar_edit.php?id='.$value['id'].' "  class="btn btn-success "><i class="zmdi zmdi-hc-fw"></i> </a></td>
                                                     <td>  <a href="../Vista/admin/form_editar_cliente.php?id='.$value['id'].' " data-id=" '.$value['id'].' " class="btn btn-primary "><i class="zmdi zmdi-hc-fw"></i> </a></td>
       


                                            </tr>' ;

                                    }

                                ?>
                            
       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>