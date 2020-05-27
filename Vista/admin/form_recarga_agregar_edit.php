
 <?php 
    ini_set('display_errors', 'On');
    //revisamos la session si existe
    require'../../Controlador/class_ctr_template_admin.php';
    $plantilla= new ControladorPlantilla_Admin();
    $plantilla->usuario_autentificado();

    require'../../Modelo/class_mdl_bd_conexion.php';
    require'../../Modelo/class_mdl_proveedor.php';
    require'../../Modelo/class_mdl_recarga.php';
    


    require'../../Controlador/class_ctr_proveedor.php';
    require'../../Controlador/class_ctr_recarga.php';


 
    $plantilla= new ControladorPlantilla_Admin();
    $plantilla->seguridad_admin();
    $plantilla->ctr_header();
    $plantilla->ctr_slider_left();
    $plantilla->ctr_navegador_derecho();

  ?>



  <!-- ================================================INSERTAR O RECARGAR SALDO=========================================
  ================================================INSERTAR O RECARGAR SALDO=========================================
  ================================================INSERTAR O RECARGAR SALDO=========================================
  ================================================INSERTAR O RECARGAR SALDO========================================= -->


    <section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Recargar saldo a </h2>

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Forms</a></li>
                        <li class="breadcrumb-item active">Form Examples</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>

        <div class="container-fluid">
 

       
            <!-- Multi Column -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Multi</strong> Column</h2>
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
                            <form    method="post" action="../Vista/admin/recarga_ajax.php" id="id_agregar_recarga" name="agregar_recarga" >
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="Nombre_proveedor ">Dolares</label>
                                                <input type="number" class="form-control" min="0" size="3" name="dolares" required="" placeholder="0">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="Apellido_proveedor ">Centavos</label>
                                            <div class="form-group">
                                                <input type="number" class="form-control" min="0" size="3"  name="centavo" required=""placeholder="0" >
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-12 offset-sm-2">
                                                <input type="hidden" name="recarga" value="agregar-recarga">
                                                <input type="hidden" name="id" value="<?php echo$_GET['id'] ?> ">
                                                <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect" >Enviar</button>
                                    </div>
                                
                            </form>
                   
                        </div>



                            <!-- Hover Rows -->
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="header">
                                        <h2><strong>Detalle  de Recarga</strong></h2>
                                        
                                    </div>
                                        <div class="body">

                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Fecha Adquisicion</th>
                                                            <th>Monto</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                            <?php $recarga=CtrRecarga::ctr_listar_recargas(@$_GET['id']); $cont=1; 
                                                    foreach($recarga as $key=>$value){
                                                        echo'<tr>
                                                                <th scope="row">'.$cont.'</th>
                                                                <td>'.$value['fecha_recarga'].'</td>
                                                                <td>'.$value['valor'].'</td>

                                                            </tr>';
                                                        $cont++;
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
            </div>
        </div>
    </div>
</section>






<?php 
    $plantilla->ctr_slider_raigt();
    $plantilla->ctr_footer();
    ?>
    <!-- <script type="text/javascript">
        function submitform()
        {
            document.forms["crear-registro"].submit();
        }
    </script> -->