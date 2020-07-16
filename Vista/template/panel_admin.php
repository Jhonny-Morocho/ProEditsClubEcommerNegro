

<!-- breadcrumb area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../admin_cliente.php">Mi Cuenta</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $_SESSION['usuario']." ".$_SESSION['apellido']?></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<!-- my account wrapper start -->
<div class="my-account-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- My Account Page Start -->
                <div class="myaccount-page-wrapper">
                    <!-- My Account Tab Menu Start -->
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="myaccount-tab-menu nav" role="tablist">
                                <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>
                                    Tablero</a>
                                <a href="#download" data-toggle="tab"><i class="fa fa-cart-arrow-down" ></i> Productos Adquiridos</a>

                                <!-- <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i> Payment
                                    Method</a> -->
                                <!-- <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i> address</a> -->
                                <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Detalles de Mi cuenta</a>
                                <a href="../admin_cliente.php?cerrar_session=true"><i class="fa fa-sign-out"></i> Cerrar Session</a>
                            </div>
                        </div>
                        <!-- My Account Tab Menu End -->

                        <!-- My Account Tab Content Start -->
                        <div class="col-lg-9 col-md-8">
                            <div class="tab-content" id="myaccountContent">
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                    <div class="myaccount-content">

                                            <div class="opciones_pagox">
                                                <div class="row ">
                                                        <div class="col-lg-6 pull-right ">
                                                            <h2 class="sqr-btn d-block">Monedero Saldo disponible :
                                                                <?php
                                                                        $saldo=CtrCliente::ctr_listar_cliente();
                                                                        foreach($saldo as $key=>$value){
                                                                            if(@$_SESSION['id_cliente']==$value['id']){
                                                                                echo $value['saldo_actual'];
                                                                            }
                                                                        }
                                                                ?>
                                                            </h2>
                                                                <label style="color: red">

                                                                <a class="btn btn-success btn-flat " data-toggle="modal"  href="" data-target="#quick_view_info" ><i class="fa fa-info-circle" aria-hidden="true"></i> Informacion</a>
                                                                </label>
                                                        </div>
                                                        <!-- //=============Membresia=============================// -->
                                                        <div class="col-lg-6 pull-right ">
                                                            <h2 class="sqr-btn d-block">Membresia Adquiridas</h2>
                                                                <div class="membresia" >
                                                          
                                                                    <?php
                                                                        $listar_membresia=CtrMembresia::ctr_listar_membresia();

                                                                        //print_r($listar_membresia);
                                                                        //print_r($_SESSION);
                                                                        $tipo_membresia="";
                                                                        $cont=1;
                                                                        foreach($listar_membresia as $key=>$value){
                                                                        
                                                                            if(@$_SESSION['id_cliente']==$value['id_cliente']){

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
                                                                                    echo'<div class="alert alert-success" role="alert">';   
                                                                                        echo '<br><label style="color: red">'.($cont++).'.) Tipo Membresia : </label>'.$tipo_membresia;
                                                                                        echo '<br><label style="color: red">Fecha Adquisicion de la membresia : </label>'.$value['fecha_inicio'];
                                                                                        echo '<br><label style="color: red">Fecha Culmininacion Membresia: </label>'.$value['fecha_culminacion'];
                                                                                        echo '<br><label style="color: red">Descargas Disponibles : </label>'.$value['rango'];
                                                                                    echo"</div>";
                                                                                    echo"<br>";
                                                                                    
                                                                            }
                                                                        }

                                                                    ?>
                                                                       
                                                                </div>        

                                                        </div>
                                                </div>

                                            </div>
                                        <h3>Tablero</h3>
                                        <div class="welcome">
                                            <p>Hello, <strong><?php echo $_SESSION['usuario']." ".$_SESSION['apellido']?></strong></p>
                                        </div>
                                        <p class="mb-0">Desde el tablero de su cuenta, puede gestionar  su informacion y productos adquiridos, tambien editar sus datos personales</p>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                            

                                <?php

                                $nombre="";
                                $apellido="";
                                $correo="";



                                $plantilla= new ControladorPlantilla();//traigo la tabla
                                $cliente =new CtrCliente();// para el formulario de informacion del cliente



                                foreach($cliente->ctr_listar_cliente() as $key=>$value){

                                    if($_SESSION['id_cliente']==$value['id']){
                                        //variables para el formulario
                                        $nombre=$value['nombre'];
                                        $apellido=$value['apellido'];
                                        $correo=$value['correo'];

                                    }


                                }


                                $plantilla->ctr_tabla_descargar_productos_cliente();
                                ?>

                   
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start Detalle de mi cuenta -->
                                    <div class="tab-pane fade" id="account-info" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Account Details</h3>
                                        <div class="account-details-form">
                                                <form  method="post" action="../registro_login_ajax.php"  id="id_editar_cliente">
                                                <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item ">
                                                            <p class="p_nombre"></p>
                                                                <input type="text" placeholder="Pirmer Nombre" required="" name="nombre" id="id_nombre" value="<?php echo $nombre?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                            <p class="p_epellido"></p>
                                                                <input type="text" placeholder="Primer Apellido" required=""  name="apellido" id="id_apellido" value="<?php echo $apellido?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="single-input-item">
                                                                <p class="p_correo"></p>
                                                            <input type="email" placeholder="Correro" required="" name="correo" id="id_correo" value="<?php echo $correo?>" >
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row contraseña_check">
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item ">
                                                            <label for="">Cambiar contraseña <input  id='bmm" + (i + 1) + "' rel='canvas" + (i + 1) + "' type='checkbox' class='squaredThreex fantasma hh' name='check' value='0'></label>

                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="single-input-item">
                                                    <input type="hidden" name="cliente" value="editar">
                                                    <input type="hidden" name="id_cliente" value="<?php echo $_SESSION['id_cliente']?>">
                                                    <button class="sqr-btn">Guardar datos editados</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                            </div>
                        </div> <!-- My Account Tab Content End -->
                    </div>
                </div> <!-- My Account Page End -->
            </div>
        </div>
    </div>
</div>
<!-- my account wrapper end -->

