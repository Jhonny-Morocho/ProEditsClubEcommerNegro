
 <?php 
    ini_set('display_errors', 'On');


    
    require'../../Modelo/class_mdl_bd_conexion.php';
    require'../../Modelo/class_mdl_Oferta.php';
    
    
    require'../../Controlador/class_ctr_Oferta.php';
    
    
    require'../../Controlador/class_ctr_template_admin.php';
    
    $plantilla= new ControladorPlantilla_Admin();
    $plantilla->seguridad_admin();
    $plantilla->usuario_autentificado();
    $plantilla->ctr_header();
    $plantilla->ctr_slider_left();
    $plantilla->ctr_navegador_derecho();

    
    


    $respuestaOferta=Ctr_Oferta::ctr_listar_Oferta();

  ?>






<!-- =================================================EDITAR OFERTA=========================================
  =================================================EDITAR OFERTA=========================================
  =================================================EDITAR OFERTA=========================================
  =================================================EDITAR OFERTA========================================= -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>EDITAR  OFERTA</h2>

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
                            <form   method="post" action="../Controlador/class_ctr_Oferta.php" id="id_editar_Oferta" name="editarOferta"  >
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="Descuento ">Descuento % </label>
                                                <input type="number" class="form-control" min="1" placeholder="descuento" name="descuento" required="" value="<?php print_r($respuestaOferta[0]['descuento']) ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="Genero ">Limite Productos</label>
                                                <input type="number" class="form-control"  min="1" placeholder="limite" name="limiteProductos" required="" value="<?php print_r($respuestaOferta[0]['limite_productos']) ?>">
                                            </div>
                                        </div>
                    
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="Descuento ">Fecha Inicio: </label>
                                                <input type="date"class="form-control"  placeholder="descuento" name="inicioOferta" required="" value="<?php print_r($respuestaOferta[0]['fecha_inicio']) ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="Genero ">Fecha Culminacion: </label>
                                                <input type="date" class="form-control"  placeholder="limite" name="finOferta" required="" value="<?php print_r($respuestaOferta[0]['fecha_fin']) ?>">
                                            </div>
                                        </div>
                    
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <label for="Genero ">Mensaje de Promocion</label>
                                                <input type="text" class="form-control" placeholder="Sms Promocion" name="smsPromocion" required="" value="<?php print_r($respuestaOferta[0]['sms_promocion']) ?>">
                                            </div>
                                        </div>
                    
                                    </div>
                                    

                                    <div class="col-sm-12 offset-sm-2">
                                                <input type="hidden" name="idOferta" value="<?php print_r($respuestaOferta[0]['id']) ?>">
                                                <input type="hidden" name="Oferta" value="editar">
                                                <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect" >Enviar</button>
                                    </div>
                                
                            </form>
                   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


  <!-- =================================================AGREGAR PROVEEDOR=========================================
  =================================================AGREGAR PROVEEDOR=========================================
  =================================================AGREGAR PROVEEDOR=========================================
  =================================================AGREGAR PROVEEDOR========================================= -->



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