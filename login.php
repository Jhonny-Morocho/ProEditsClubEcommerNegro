<?php

ini_set('display_errors', 'On');
require'Modelo/class_mdl_proveedor.php';




require'Modelo/class_mdl_bd_conexion.php';
// include'Controlador/class_ctr_update.php';
include'Controlador/class_ctr_proveedor.php';
include'Controlador/class_ctr_cliente_producto.php';
include'Controlador/class_ctr_biblioteca.php';
//include'Controlador/class_ctr_cliente_producto.php';


require_once 'Controlador/class_template_index.php';

//=============================creacion de objetos==========================

$plantilla= new ControladorPlantilla();

//$plantilla->usuario_autentificado();
//$plantilla->cerrar_session(@$_GET['cerrar_session']);//aqui cierro la session

$plantilla->ctr_header();




?>
    <?php if(@$_GET['admin']=='true'){//formulario para administrador ?>

        <!-- //==============================================LOGIN DE ADMISTRADOR=================================//
        //==============================================LOGIN DE ADMISTRADOR=================================//
        //==============================================LOGIN DE ADMISTRADOR=================================// -->
        <!-- login register wrapper start -->
        <div class="login-register-wrapper">
            <div class="container">
                <div class="member-area-from-wrap">
                    <div class="row">
                        <!-- Login Content Start -->
                        <div class="col-lg-12">
                            <div class="login-reg-form-wrap  pr-lg-50">
                                <h2>Iniciar Sesion Administrador</h2>
                                <form id="login-proveedor" method="post" action="../registro_login_ajax.php" >
                                    <div class="single-input-item">
                                    <p class="p_correo"></p>
                                        <input type="email" placeholder="Email or Username" required="" name="correo" id="id_correo">
                                    </div>
                                    <div class="single-input-item">
                                    <p class="p_password_login"></p>
                                        <input type="password" placeholder="Enter your Password" required="" name="password" id="id_password_login">
                                    </div>
                                    <div class="single-input-item">
                                        <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                            <a href="#" class="forget-pwd">Olvidates tu contraseña?</a>
                                        </div>
                                    </div>
                                    <div class="single-input-item">
                                    <input type="hidden" name="login" value="login-admin">
                                        <button class="sqr-btn">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Login Content End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- login register wrapper end -->

     
        

    <?php  }
    
            else{// formularo para cliente?>

    
        <!-- //==============================================LOGIN DE CLIENTE=================================//
        //==============================================LOGIN DE CLIENTE=================================//
        //==============================================LOGIN DE CLIENTE=================================// -->

        <!-- login register wrapper start -->
        <div class="login-register-wrapper">
            <div class="container">
                <div class="member-area-from-wrap">
                    <div class="row">
                        <!-- Login Content Start -->
                        <div class="col-lg-12">
                            <div class="login-reg-form-wrap  pr-lg-50">
                                <h2>Iniciar Sesion</h2>
                                <form id="login-cliente" method="post" action="../registro_login_ajax.php" >
                                    <div class="single-input-item">
                                    <p class="p_correo"></p>
                                        <input type="email" placeholder="Email or Username" id="id_correo"  required="" name="correo" >


                                    </div>
                                    <div class="single-input-item">
                                    <p class="p_password_login"></p>
                                        <input type="password" placeholder="Enter your Password" required="" name="password" id="id_password_login">
                                    </div>
                                    <div class="single-input-item">
                                        <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                            <!-- <div class="remember-meta">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="rememberMe">
                                                    <label class="custom-control-label" for="rememberMe">Remember Me</label>
                                                </div>
                                            </div> -->
                                            <!-- <a href="#" class="forget-pwd">Olvidates tu contraseña?</a> -->
                                        </div>
                                    </div>
                                    <div class="single-input-item">
                                    <input type="hidden" name="login" value="login-cliente">
                                        <button class="sqr-btn">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Login Content End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- login register wrapper end -->

<?php } //entonces es cliente?>



<?php

// $login=new CtrProveedor();

// $login->ctr_proveedor_login();



$plantilla->wassap();
$plantilla->ctr_footer();




?>