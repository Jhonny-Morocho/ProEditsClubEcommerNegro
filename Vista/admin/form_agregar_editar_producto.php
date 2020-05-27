
 <?php 
    ini_set('display_errors', 'On');


    
    
    
    require'../../Modelo/class_mdl_bd_conexion.php';
    
    require'../../Modelo/class_mdl_biblioteca.php';
    require'../../Modelo/class_mdl_producto.php';
    
    
    
    require'../../Controlador/class_ctr_biblioteca.php';
    require'../../Controlador/class_ctr_producto.php';
    
    
    
    require'../../Controlador/class_ctr_template_admin.php';
    
    $plantilla= new ControladorPlantilla_Admin();
    
    $plantilla->usuario_autentificado();

    $plantilla->ctr_header();
    $plantilla->ctr_slider_left();
    $plantilla->ctr_navegador_derecho();

  ?>

<!-- <?php

            if($_GET['editar']=="true"){ ?>  Editar PRODUCTO -->

    <!-- =================================================EDITAR PRODUCTO=========================================
  =================================================EDITAR PRODUCTO=========================================
  =================================================EDITAR PRODUCTO=========================================
  =================================================EDITAR PRODUCTO========================================= -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>EDITAR  PRODUCTO</h2>
                    <!-- <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Forms</a></li>
                        <li class="breadcrumb-item active">EDITAR  PROVEEDOR</li>
                    </ul> -->
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
                          
                                <div class="alert alert-warning">
                                    <strong>Precio Actual del Tema : </strong> $
                                    <?php $productos=CtrProducto::ctr_listar_productos();
                                    foreach($productos as $key=>$value){
                                        //condicion
                                        if($_GET['id_producto']==$value['id']){
                                            echo utf8_decode($value['precio']);
                                            $enlace_descarga=$value['url_descarga'];
                                            $url_directorio=$value['url_directorio'];
                                        }
                                    }?>
                                </div>
                       
                            <!-- <ul class="header-dropdown">
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
                            </ul> -->
                        </div>

                        <div class="body">
                            <form    method="post" action="../Vista/admin/agregar_editar_ajax.php" id="id_editar_producto" name="agregar_producto" >
                            <div class="row clearfix">
                                        <div class="col-lg-8 col-md-8">
                                        <label for="Genero ">Genero</label>
                                            <select  required=""  class="form-control show-tick ms select2" data-placeholder="Select"  name="id_genero">
                                              <option value="">Selecciones genero musical</option>
                                            <?php 
                                                $genero=CtrBiblioteca::ctr_listar_biblioteca();
                                                foreach($genero as $key=>$value){ ?>
                                                    <option value=" <?php echo$value['id'] ?> " > <?php echo$value['genero'] ?> </option>
                                            <?php }?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <label for="Enlace de descarga ">Nombre del archivo</label>
                                                <input type="text" class="form-control" placeholder="Nombre del archivo" name="titulo-nuevo" required="" value="<?php echo ($url_directorio) ?>" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <label for="Enlace de descarga ">Enlace de descarga</label>
                                                <input type="text" class="form-control" placeholder="Enlace de descarga Mega, Mediafire, Otro" name="url_descarga" required=""  value="<?php echo $enlace_descarga ?>" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="Dolares ">Dolares</label>
                                                <input type="number"  min="0" size="2" class="form-control" placeholder="0" name="dolares" required="" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="Centavos ">Centavos</label>
                                            <div class="form-group">
                                                <input type="number"  min="0" size="2" class="form-control" placeholder="0"  name="centavo" required="" >
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="Demo Producto ">Demo Producto</label>
                                                <input type="file" class="form-control" name="archivo_musica"  placeholder="mp3" accept="audio/mp3" >
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="row clearfix">
                                        <div class="col-sm-12 offset-sm-2">
                                                    <input type="hidden" name="producto" value="editar">
                                                    <input type="hidden" name="titulo-antiguo" value="<?php echo $url_directorio ?>">
                                                    <input type="hidden" name="id_producto" value="<?php echo $_GET['id_producto'] ?>">
                                                    <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect" >Enviar</button>
                                        </div>
                                    </div>

                            </form>
                   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


  <!-- =================================================AGREGAR PRODUCTO=========================================
  =================================================AGREGAR PRODUCTO=========================================
  =================================================AGREGAR PRODUCTO=========================================
  =================================================AGREGAR PRODUCTO========================================= -->

<!-- <?php }else{ ?> Agregar PRODUCTO -->


    <section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Agregar Producto</h2>

                    <!-- <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Forms</a></li>
                        <li class="breadcrumb-item active">Form Examples</li>
                    </ul> -->
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
                            <!-- <ul class="header-dropdown">
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
                            </ul> -->
                        </div>

                        <div class="body">
                            <form    method="post" action="../Vista/admin/agregar_editar_ajax.php" id="id_agregar_producto" name="agregar_producto" >
                            <div class="row clearfix">
                                        <div class="col-lg-8 col-md-8">
                                        <label for="Genero ">Genero</label>
                                            <select  required=""  class="form-control show-tick ms select2" data-placeholder="Select"  name="id_genero">
                                              <option value="">Selecciones genero musical</option>
                                            <?php 
                                                $genero=CtrBiblioteca::ctr_listar_biblioteca();
                                                foreach($genero as $key=>$value){ ?>
                                                    <option value=" <?php echo$value['id'] ?> " > <?php echo$value['genero'] ?> </option>
                                            <?php }?>

                                                

                                            </select>
                                        </div>
        
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <label for="Enlace de descarga ">Enlace de descarga</label>
                                                <input type="text" class="form-control" placeholder="Enlace de descarga Mega, Mediafire, Otro" name="url_descarga" required="" >
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="Dolares ">Dolares</label>
                                                <input type="number"  min="0" size="2" class="form-control" placeholder="0" name="dolares" required="" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="Centavos ">Centavos</label>
                                            <div class="form-group">
                                                <input type="number"  min="0" size="2" class="form-control" placeholder="0"  name="centavo" required="" >
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="Demo Producto ">Demo Producto</label>
                                                <input type="file" class="form-control" name="archivo_musica" required=""  placeholder="mp3" accept="audio/mp3" >
                                            </div>
                                        </div>

                                    </div>

                                <div class="col-sm-12 offset-sm-2">
                                            <input type="hidden" name="producto" value="agregar">
                                            <input type="hidden" name="id_proveedor" value="<?php echo $_SESSION['id_proveedor'] ?>">
                                            <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect" >Enviar</button>
                                </div>

                            <!-- //==================================BARRA DE PROGRESO=============================== -->
                                <div class="col-sm-12 offset-sm-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h4 class="porcentaje_h4" ></h4>
                                            </div>
                                        </div>
                                </div>
                                    
                                <div class="row clearfix">
                                    <div class="barra">
                                        <div class="barra_azul" id="barra_estado">
                                            <span></span>
                                        </div>     
                                    </div>


                                    <div class="card-body">
                                        <div class="progress mb-3">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                                aria-valuemax="100" style="width: 0%;">
                                                    <span class="sr-only" >0%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </form>
                   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <?php }?> sierro else -->
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