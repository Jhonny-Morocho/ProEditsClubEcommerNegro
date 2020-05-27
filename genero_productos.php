
<?php

ini_set('display_errors', 'On');


session_start();
require'Modelo/class_mdl_bd_conexion.php';
require'Modelo/class_mdl_proveedor.php';
require'Modelo/class_mdl_cliente_producto.php';
require'Modelo/class_mdl_producto.php';
require'Modelo/class_mdl_biblioteca.php';


include'Controlador/class_ctr_update.php';
include'Controlador/class_ctr_proveedor.php';
include'Controlador/class_ctr_producto.php';
include'Controlador/class_ctr_cliente_producto.php';
include'Controlador/class_ctr_biblioteca.php';


//=============================creacion de objetos==========================
//=============================creacion de objetos==========================

require_once 'Controlador/class_template_index.php';
$plantilla= new ControladorPlantilla();

//$plantilla->usuario_autentificado();
//$plantilla->cerrar_session(@$_GET['cerrar_session']);//aqui cierro la session
$plantilla->ctr_header();

$cont=1;
$productos=CtrProducto::ctr_listar_productos();



?>
<!-- page wrapper start -->
<div class="page-wrapper pt-20 ">
    <div class="container">
        <div class="row">
            <!-- sidebar start -->
            <div class="col-lg-3 order-2 order-lg-1">
                <!-- category menu start -->
                <div class="home-single-sidebar hm-4-cat mb-30 mb-sm-34">
                    <div class="main-header-inner">
                        <div class="category-toggle-wrap max-100">
                            <div class="category-toggle">
                                Genero Musical
                                <div class="cat-icon">
                                    <i class="fa fa-angle-down"></i>
                                </div>
                            </div>
                            <nav class="category-menu static hm-1">
                                <ul>
                                <li><a href="../index.php"><i class="fa fa-music" aria-hidden="true"></i>Todos los generos</a></li>
                                <?php 
                                    $biblioteca=CtrBiblioteca::ctr_listar_biblioteca();
                                    foreach($biblioteca as $key=>$value){
                                        echo'<li>
                                                <a href="'.(ControladorPlantilla::url_biblioteca_productos()).$value['id'].'">
                                                    <i class="fa fa-music" aria-hidden="true"></i> '.$value['genero'].'
                                                </a>
                                            </li>';
                                    }
                                ?>

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- category menu end -->
            </div>
            <!-- sidebar end -->

     <!-- main wrapper start -->
    
     <div class="col-lg-6 order-1 order-lg-2 panel panel-default">
              
                <div class="category-tab-area mb-30 mt-md-16 mt-sm-16">
                    <div class="category-tab">
                        <ul class="nav">
                        
                            <li>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </li>
                            <li>
                                <a class="active" data-toggle="tab" href="#tab_one">
                                <?php 
                                    foreach($biblioteca as $key=>$value){ 

                                        if(@$_GET['id_genero']==$value['id']){
                                            echo $value['genero'];
                                            
                                        }
                                    }
                                ?>
                                </a>
                            </li>
                          

                        </ul>
                    </div>
                </div>
<!-- //========================================= Nuevos edits =========================================// -->
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab_one">
                        <table id="example_2" class="table table-bordered table-dark table-hover"  width="100%"  >
                     
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                                    foreach($productos as $key=>$value){

                                        if(@$_GET['id_genero']==$value['id_biblioteca']){

                                echo '  <tr>
                                            <td>
                                                <div class="product-item fix mb-30">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-sm-5 col-xl-5">
                                                                <div class="product-thumb">
                                                                    
                                                                        <img src=  " ../'. ($value['img']).' " class="img-pri" alt="" width="100%">
                                                                    
                                                                    
                                                                    <div class="product-label-verde">
                                                                        <div title="Reproducir"  type="button"  url_destino="../biblioteca/'.($value['url_directorio']) .'"  nombre_cancion=" '.($value['url_directorio']) .' " class="reproducir_play " ><i class="fa fa-play-circle" aria-hidden="true"></i></div>
            
                                                                    </div>
        
                                                                    <div class="product-action-link">
                                                                    
                                                                        <a href="'.(ControladorPlantilla::url_producto()).$value['id'].' " target="_blank"  data-toggle="tooltip" data-placement="left" title="Compartir"><i class="fa fa-link"></i></a>
                                                                        <a href="#" 
                                                                                        data-toggle="tooltip" 
                                                                                        data-placement="left" 
                                                                                        title="Añadir al carrito" 
                                                                                        class="agregar-carrito"  
                                                                                        data-id="'.$value['id'].'"  
                                                                                        data-nombre="'.($value['url_directorio']).'" 
                                                                                        precio="'.$value['precio'].' " >
                                                                            <i class="fa fa-shopping-cart">  '.$value['precio'].'</i>
                                                                        </a>
                                                         
                                                                    </div>
                                                                </div>
                                                        
                                                        </div>
                                                
                                                        <div class="col-lg-7 col-sm-7 col-xl-7">
                                                                <div class="product-content">
                                                                <meta content="keywords" name="'.($value['url_directorio']).'">
                                                               
                                                                                    <h4><span class="producto-detalle">Titulo</span> :  '.($value['url_directorio']).'</h4>
                                                                                    <h4><span class="producto-detalle">Genero </span>:'.($value['genero']).'</h4>
                                                                                   
                                                                                    <h4><span class="producto-detalle">Fecha </span>:'.($value['fecha_producto']).'</h4>
                                                                                   
                                                                                   
                                      
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>' ;
                                                
                                            $cont++;

                                        }else{
                                            //header("Location:404/404.php");//
                                        }
                                        
                                    }


                                ?>

                                        </tbody>
                                    </table>
    <!-- //========================================= TODOS LOS PRODUCTOS=========================================// -->
                        </div>
                    </div>
                </div>
                    <?php 
                        require_once 'Controlador/class_template_index.php';
                        $plantilla= new ControladorPlantilla();
                        //$plantilla->usuario_autentificado();
                        //$plantilla->cerrar_session(@$_GET['cerrar_session']);//aqui cierro la session
                        $plantilla->categoria_derecha();
            
                    ?>
            </div>
        </div>


<?php

//$plantilla->ctr_categorias();
$plantilla->ctr_lista_update();
$plantilla->reproductor();
$plantilla->ctr_footer();
$plantilla->wassap();


?>


<!-- <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script> -->
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->

