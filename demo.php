
<?php

ini_set('display_errors', 'On');


session_start();
require'Modelo/class_mdl_bd_conexion.php';
require'Modelo/class_mdl_proveedor.php';
require'Modelo/class_mdl_cliente_producto.php';
require'Modelo/class_mdl_producto.php';


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
$cont=1;
// $cliente_producto=CtrCliente_Producto::ctr_listar_cliente_producto();
$plantilla->ctr_header();
$plantilla->ctr_slider();

$productos=CtrProducto::ctr_listar_productos();




foreach($productos as $key=>$value){



    if(@$_GET['id_producto']==$value['id']){

            echo '
    <div class="hero-slider-area">
        <div class="container">
            <div class="row">
                <div clas="col-lg-12">
                    <div class="product-item fix mb-30 demo_producto ">
                    
                            <div class="col-lg-6 col-sm-6 col-xl-6 ">
                                    <div class="product-thumb">
                                    <link rel="image_src" ../'. ($value['img']).' ">
                                            <img src=  " ../'. ($value['img']).' " class="img-pri" alt="" width="100%">
                                        
                                       
                                        <div class="product-label">
                                            <span>hot '.$cont.'</span>
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
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                            
                            </div>
                    
                            <div class="col-lg-6 col-sm-6 col-xl-6">
                                    <div class="product-content">
                                    <meta content="keywords" name="'.($value['url_directorio']).'">
                                    <div type="button" url_destino="../biblioteca/'.($value['url_directorio']) .'"  nombre_cancion=" '.($value['url_directorio']) .' " class="reproducir_play " ><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                                        <h4><span class="producto-detalle">Titulo</span> :  '.($value['url_directorio']).'</h4>
                                                        <h4><span class="producto-detalle">Genero </span>:  '.($value['genero']).'</h4>
                                                        <h4><span class="producto-detalle">Dj/Editor </span>:'.($value['apodo']).'</h4>
                                                        <h4><span class="producto-detalle">Fecha </span>:'.($value['fecha_producto']).'</h4>
                                                    
                                        
                                        <div class="pricebox">
                                            <span class="regular-price">$'.$value['precio'].'</span>
                                            <div class="ratings">
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <div class="pro-review">
                                                    <span>1 review(s)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
            

                ' ;
            
        $cont++;
        break;
    }else{
        //header("Location:404/404.php");//
    }
    
}



?>

<?php

// $plantilla->ctr_categorias();
$plantilla->ctr_lista_update();
$plantilla->reproductor();
$plantilla->ctr_footer();
$plantilla->wassap();


?>


<!-- <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script> -->
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->

