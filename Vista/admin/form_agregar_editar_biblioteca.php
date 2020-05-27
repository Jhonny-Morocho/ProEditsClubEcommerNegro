
 <?php 
    ini_set('display_errors', 'On');



    
    
    require'../../Modelo/class_mdl_bd_conexion.php';
    require'../../Modelo/class_mdl_biblioteca.php';
    
    
    
    require'../../Controlador/class_ctr_biblioteca.php';
    
    
    
    
    require'../../Controlador/class_ctr_template_admin.php';
    
    $plantilla= new ControladorPlantilla_Admin();
    $plantilla->seguridad_admin();
    $plantilla->usuario_autentificado();
    $plantilla->ctr_header();
    $plantilla->ctr_slider_left();
    $plantilla->ctr_navegador_derecho();


    




  ?>



<!-- <?php 
            $genero=CtrBiblioteca::ctr_listar_biblioteca();
            //$nombre_genero="";
            foreach($genero as $key=>$value){
                
               //busco el id del genero a editar
               if($_GET['id_genero']==$value['id']){

                    $nombre_genero=$value['genero'];
               }
                
            }


            if($_GET['editar']=="true"){ ?>  Editar proveedor -->

    <!-- =================================================EDITAR PROVEEDOR=========================================
  =================================================EDITAR PROVEEDOR=========================================
  =================================================EDITAR PROVEEDOR=========================================
  =================================================EDITAR PROVEEDOR========================================= -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>EDITAR  GENERO</h2>

                    

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Forms</a></li>
                        <li class="breadcrumb-item active">EDITAR  GENERO</li>
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
                            <form   method="post" action="../Vista/admin/agregar_editar_ajax.php" id="id_editar_biblioteca" name="editar_biblioteca"  >
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="Genero ">Genero</label>
                                                <input type="text" class="form-control" placeholder="Genero" name="genero" required="" value="<?php echo utf8_decode($nombre_genero) ?>">
                                            </div>
                                        </div>
                    
                                    </div>



                                    <div class="col-sm-12 offset-sm-2">
                                                <input type="hidden" name="id" value="<?php echo $_GET['id_genero'] ?>">
                                                <input type="hidden" name="biblioteca" value="editar">
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

<!-- <?php }else{ ?> Agregar Proveedor -->


    <section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Agregar Genero </h2>

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
                            <form   method="post" action="../Vista/admin/agregar_editar_ajax.php" id="id_agregar_biblioteca" name="agregar_biblioteca"  >
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="Genero ">Genero</label>
                                                <input type="text" class="form-control" placeholder="Genero" name="genero" required="" >
                                            </div>
                                        </div>
                    
                                    </div>


                                    <div class="col-sm-12 offset-sm-2">
                                                <input type="hidden" name="biblioteca" value="agregar">
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