<?php
    ini_set('display_errors', 'On');

    
    //include'Controlador/class_ctr_update.php';

    
?>


<!DOCTYPE html>
<html class="no-js" lang="es">

<head>
    
    <meta charset="utf-8" /> 
   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Plataforma de Remixes y Edits para Djs">


    
    <base href="Vista/">
     <meta property="og:title" content="Proeditsclub"/>
     <meta property="og:description" content="Plataforma de Remixes y Edits para Djs" /> 
    <meta property="og:image" content="img_dj/meta.jpeg" />      
    <meta property="og:url" content="https://www.proeditsclub.com/" />
    <!-- Site title -->
    <title>ProEditsClub</title>


    <!-- Favicon -->
    <link rel="shortcut icon" href="img_dj/iconoProedit.png?v=1" type="image/x-icon" />
    <!-- <link rel="image_src" href="img_dj/Palntilla-color-azul-yo-me-quedo-en-casa.png"> -->
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"> 
    <!-- Font-Awesome CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- helper class css -->
    <link href="assets/css/helper.min.css" rel="stylesheet">
    <!-- Plugins CSS -->
    <link href="assets/css/plugins.css" rel="stylesheet">
    <!-- Main Style CSS -->
    <link href="assets/css/style.css?v=2" rel="stylesheet">
    <link href="assets/css/skin-default.css?v=1" rel="stylesheet" id="galio-skin">

    <!-- //============================DATA_TABLE_===========================//
    //============================DATA_TABLE_===========================// -->

    <link rel="stylesheet" href="css/data_table/bootstrap.min.css">
    <link rel="stylesheet" href="css/data_table/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/data_table/responsive.bootstrap.min.css">
    
    <!-- //=======================Membresia=============================== -->
    <link rel="stylesheet" href="../Tabla_Membresia/style.css?v=1">

    <!-- //============EFECTO CARGANDO=================== -->
    <link rel="stylesheet" href="../Fx Cargando/css/styles.css?v=2.1">

    <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>


    <!-- //==========================ANIMACION DE CARGANDO LA PAGINA===================// -->



    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" rel="stylesheet">
    
    <link href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css"> -->
       <!-- //==========================ANIMACION DE CARGANDO LA PAGINA===================// -->
  
    
    
</head>
<body >
    

 
        <!-- header area start -->
<header>

    <!-- header middle start -->
        <div id = "fb-root" > </div> 
            <div class="header-middle-area pt-20 pb-20">
  
                <div class="container">
                
                    <div class="row align-items-center">


                        <div class="col-lg-3">
                            <div class="brand-logo">
                                <a href="../">
                                    <img src="../Vista/img_dj/LOGO CON COLOR.png" alt="Logo Proedits">
                                    <!-- //============REDES SOCIALES SEGUIR===========// -->
                             <!--        <div class="row center-block">
                                    <div class="col-12 center-block">
                                        <div id="fb-root"></div>
                                                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v5.0"></script>
                                                <div class="fb-like" data-href="https://www.facebook.com/Proeditsclub-702404853464740/" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
                                        </div>
                                    </div> -->
                                </a>
                            </div>
                        </div> <!-- end logo area -->

                        <div class="col-lg-4">
                            <div class="brand-logo">
                                 <div class="header-top float-md- float-none"  style="font-size: 18px;">
                                                                                            <!-- //===============REDES SOCIALES COMPARTIR ==========// -->
                                            <nav>
                                                <ul>
                                                    <li>
                                                  
                                                    

                                                    </li>

                                                </ul>
                                            </nav>
                                    </div>
                            </div>
                        </div> <!-- end logo area -->


                        <div class="col-lg-5">
                            <!--  <h5 class="ofertaH5">La oferta termina en   </h5> 
                            
                            <span id="date-str"></span>

                            <div id="countdown-2"></div> -->
 

                    <div class="row center-block">
                                    <div class="col-12 center-block">
                                        <div id="fb-root"></div>
                                                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v5.0"></script>
                                                <div class="fb-like" data-href="https://www.facebook.com/Proeditsclub-702404853464740/" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
                                        </div>
                                    </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- header middle end -->


         
            <!-- main menu area start -->

            <div class="main-header-wrapper bdr-bottom1 header-style-4">
                <div class="container">

                        <div class="col-lg-12">
                            <div class="main-header-inner header-2 header-4">
                                <div class="main-menu menu-style-4">
                                
                                    <nav id="mobile-menu">
                                        <ul>  
                                            <li class="active"><a href="../"><i class="fa fa-home"></i>Inicio</a></li>
                                             <li class="static"><a href="../membresia.php">Membresias</a></li> 

                                             <li class="static"><a href="../">Editores/Remixer <i class="fa fa-angle-down"></i></a>
                                                <ul class="megamenu dropdown">

                                                <?php
                                                $proveedor=CtrProveedor::ctr_listar_proveedor();
                                                $numTotalProveedes=count($proveedor);
                                                $numColumaImprimir=$numTotalProveedes/4;
                                                // echo $numColumaImprimir;
                                                //echo round($numColumaImprimir);
                                                //echo $numTotalProveedes;
                                                $contadorProveedor=0;
                                                // echo (count($proveedor));
                                                 for($i=0; $i <4; $i++){
                                                        # code...
                                                    echo  '<li class="mega-title"><a href="#"></a>
                                                                <ul>';
                                                            
                                                            for ($j=0; $j <round($numColumaImprimir) ; $j++) { 
                                                                //echo $contadorProveedor++;
                                                                if($contadorProveedor<$numTotalProveedes){
                                                                echo '<li><a href="'.(ControladorPlantilla::url_dj_productos()).$proveedor[$contadorProveedor]['id'].'&dj='.$proveedor[$contadorProveedor]['apodo'].'"> '.$proveedor[$contadorProveedor]['apodo'].'</a></li>';
                                                                }
                                                                $contadorProveedor++;
                                                                # code...
                                                               //echo'<li><a href="'.(ControladorPlantilla::url_dj_productos()).$value['id'].'&dj='.$value['apodo'].'"> '.$value['apodo'].'</a></li>';
                                                            }
                                                        

                                                    echo    '      </ul>
                                                            </li>';

                                                    }
  
                                                ?>
                                                  
                                                </ul>
                                            </li>
                                          

                                            <!-- <li><a href="../updates.php">Updates</a></li> -->
                                            <li>
                                            
                                            <?php 

                                                    if(isset($_SESSION['usuario'])){// si no existe session presentar esto admin_cliente
                                                        //print_r($_SESSION);
                                                        
                                                        switch (@$_SESSION['tipo_usuario']) {
                                                            
                                                            case 'Cliente':
                                                            
                                                                    echo ' <a class="dropdown-item " href="../admin_cliente.php"> Hola: '.$_SESSION['usuario'].'</a>';
                                                                break;


                                                            case 'Proveedor':  
                                                                    echo ' <a class="dropdown-item " href="../Vista/admin/index_admin.php"> Hola: '.$_SESSION['usuario'].'</a>';

                                                                    
                                                                break;

                                                            case 'Admin':
                                                                    echo ' <div class="dropdown header-top-dropdown">
                                                                                <a class="dropdown-item " href="../Vista/admin/index_admin.php"> Hola : '.$_SESSION['usuario'].'</a>
                                                                                
                                                                            </div> ';

                                                                break;
                                                        }
                                                        
                                                    }else{
                                                        echo' 
                                                        <div class="dropdown header-top-dropdown">
                                                            <a class="dropdown-toggle" id="myaccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mi Cuenta
                                                                
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="myaccount">
                                                            <a class="dropdown-item" href="../login.php"> login</a>
                                                            <a class="dropdown-item" href="../form_registro_cliente.php">Registrarme</a>
                                                            <a class="dropdown-item" href="../login.php?admin=true">Administrador</a>
                                                            </div>
                                                        </div> ';
                                                    }
                                                    ?>
                                            
                                            </li>
                                            <!-- <li><a href="../index.php">Updates</a></li> -->
                                 
                                        </ul>
                                    </nav>
                                </div>
                             
                            <!-- //========================carrito de compras====================================== -->
                        
                                <div class="mini-cart2">
                                    <div class="header-mini-cart mini-cart-btn">
                                        <div class="mini-cart-btn">
                                            <i class="fa fa-shopping-cart"></i>
                                                <span class="cart-notification"></span> <!--aqui va el numero de productos -->
                                        </div>
                                        <!-- <div class="cart-total-price">
                                            <span>total:</span>
                                            $50.00
                                        </div> -->
                                        <ul class="cart-list">

                                        <!-- <li class="checkout-btn">
                                                <a href="../carrito_compras.php" class="ir_carrito">Ir al carrito</a>
                                        </li> -->
                                            <!-- <li>
                                                <div class="cart-img">
                                                    <a href="product-details.html"><img src="assets/img/cart/cart-1.jpg" alt=""></a>
                                                </div>
                                                <div class="cart-info">
                                                    <h4><a href="product-details.html">simple product 09</a></h4>
                                                    <span>$60.00</span>
                                                </div>
                                                <div class="del-icon">
                                                    <i class="fa fa-times"></i>
                                                </div>
                                            </li> -->

                                            <li class="checkout-btn ir_carrito">
                                                <a href="#">Ir al carrito de compras</a>
                                            </li> 
                                        </ul> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-block d-lg-none"><div class="mobile-menu mean-4"></div></div>
                    </div>
                </div>
            </div>
            <!-- main menu area end -->


    </header>
        <!-- header area end -->


        

<div class="content">
    <!-- <h1>Efecto cargando con jQuery Ajax Demo</h1>  -->
    <h2 class="lead d-none"></h2>
    
    <div class="row">
        <div id="content" class="col-lg-12">
            <!-- Contenido inicial... -->
        </div>
    </div>

</div>


