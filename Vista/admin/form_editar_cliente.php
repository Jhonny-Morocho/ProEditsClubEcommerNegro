    <?php  
    ini_set('display_errors', 'On');
    
    require'../../Modelo/class_mdl_bd_conexion.php';
   
    require'../../Modelo/class_mdl_cliente.php';
    
    
    

    require'../../Controlador/class_ctr_cliente.php';
    require'../../Controlador/class_ctr_template_admin.php';
    
    
    $plantilla= new ControladorPlantilla_Admin();
    
    //revisamos la session si existe
    $plantilla->usuario_autentificado();
    $plantilla->seguridad_admin();
    $plantilla->ctr_header();
    $plantilla->ctr_slider_left();
    $plantilla->ctr_navegador_derecho();

    $clientes=CtrCliente::ctr_listar_cliente();

    $correo="";$apellido="";$nombre="";

     foreach($clientes as $key=>$value){

        if(@$_GET['id'] == $value['id']){
             $correo=$value['correo'];
             $nombre=$value['nombre'];
             $apellido=$value['apellido'];
            
        }
     }




    ?>

<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Editar Cliente</h2>

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
                            <form    method="post" action="../registro_login_ajax.php" id="id_editar_cliente" >
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="Nombre_proveedor ">Nombre</label>
                                                <input type="text" class="form-control" placeholder="Nombre" name="nombre" required="" value="<?php echo $nombre ?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="Apellido_proveedor ">Apellido</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Apellido" name="apellido" required="" value="<?php echo $apellido ?>">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="Correo_proveedor ">Correo</label>
                                                <input type="email" class="form-control" placeholder="Correo" name="correo" required="" value="<?php echo $correo ?>" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="Apellido_proveedor ">Password</label>
                                                <input type="text" class="form-control" name="password_1"  placeholder="Password" >
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-sm-12 offset-sm-2">
                                                <input type="hidden" name="proveedor" value="agregar">
                                                <input type="hidden" name="cliente" value="editar">
                                                <input type="hidden" name="id_cliente" value="<?php echo $_GET['id'] ?>">
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




 -->
<?php 
    $plantilla->ctr_slider_raigt();
    $plantilla->ctr_footer();
?>