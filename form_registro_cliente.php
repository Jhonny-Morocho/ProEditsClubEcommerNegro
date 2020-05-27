    <?php 
        ini_set('display_errors', 'On');

        require'Modelo/class_mdl_bd_conexion.php';
        require'Modelo/class_mdl_proveedor.php';
        require'Modelo/class_mdl_cliente_producto.php';
        require'Modelo/class_mdl_producto.php';
        
        
        include'Controlador/class_ctr_update.php';
        include'Controlador/class_ctr_proveedor.php';
        include'Controlador/class_ctr_producto.php';
        include'Controlador/class_ctr_cliente_producto.php';
        include'Controlador/class_ctr_biblioteca.php';
//=============================PLANTILLA==========================
    require_once 'Controlador/class_template_index.php';
    $plantilla= new ControladorPlantilla();
    $plantilla->ctr_header();
 
        
    ?>

    <!-- Register Content Start -->
    <div class="col-lg-12">
        <div class="login-reg-form-wrap mt-md-34 mt-sm-34">
            <h2>Formulario de Registro</h2>
            <form  method="post" action="../registro_login_ajax.php"  id="id_agregar_cliente">
                <div class="row">
                        <div class="col-lg-6">
                                <div class="single-input-item ">
                                    <div class="row">
                                        <div class="col-lg-9">
                                                <label for="">Nombre</label>
                                                <input type="text" placeholder="Pirmer Nombre" required="" name="nombre" id="id_nombre"/>
                                        
                                        </div>

                                        <div class="col-lg-3">
                                            <p class="p_nombre"></p>
                                        
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="single-input-item">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <label for="">Apellido</label>
                                        <input type="text" placeholder="Primer Apellido" required=""  name="apellido" id="id_apellido"/>
                                    </div>

                                    <div class="col-lg-3">
                                        <p class="p_epellido"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                 </div> <!--end row nombre y apellido -->


                <div class="row">
                        <div class="col-lg-9">
                                    
                            <div class="single-input-item">
                                <label >Correo</label>
                                <input type="email" placeholder="Correo" required="" name="correo" id="id_correo"/>
                            </div>
                        </div>

                         <div class="col-lg-3">
                            <div class="single-input-item">
                                <p class="p_correo"></p>
                            </div>
                        </div>
                            
                </div> <!--end correo -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="single-input-item">
                        <label class="p_password_1">Ingresa tu contraseña</label>
                            <input type="password" placeholder="Ingresa tu contraeña" required="" name="password_1" id="id_password_1"/>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="single-input-item">
                            <label class="p_password_2">Repita su contraseña</label>
                                <input type="password" placeholder="Repite tu contraseña" required="" name="password_2" id="id_password_2" />
                        </div>
                    </div>
                </div>

                <div class="single-input-item">
                    <input type="hidden" name="cliente" value="agregar">
                    <button class="sqr-btn">Register</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Register Content End -->

    <?php 

    
    $plantilla->ctr_lista_update();
    $plantilla->ctr_footer();
    $plantilla->wassap();


        
        
    ?>