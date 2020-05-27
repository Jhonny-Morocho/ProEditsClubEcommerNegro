     <!-- main wrapper start -->

     <div class="col-lg-6 order-1 order-lg-2 panel panel-default">
                <div class="category-tab-area mb-30 mt-md-16 mt-sm-16">
                    <div class="category-tab">
                        <ul class="nav">
                            <li>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </li>
                            <li>
                                <a class="active" data-toggle="tab" href="#tab_one">Nuevos Edits</a>
                            </li>
                        </ul>
                    </div>
                </div>
<!-- //========================================= EDIST DESTACADOS=========================================// -->
                <div class="tab-content">
                                <!-- //========================================= TODOS LOS PRODUCTOS=========================================// -->
                        <div class="tab-pane fade show active" id="tab_one">
                            <div class="feature-category-carousel-wrapper">
                           
                                    <table id="example_2" class="table table-bordered table-dark table-hover"  width="100%" style="overflow-x:auto;overflow-y:auto;" >
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                         $productos=CtrProducto::ctr_listar_productos();
                            
                                         foreach($productos as $key=>$value){
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
                                              
             
                                                     }

                                        ?>
                                    </tbody>
                              
                                    </table>
                               
                            </div>
                        </div>

                </div>
                <!-- category tab area start -->
    </div>

    <?php 
        require_once 'Controlador/class_template_index.php';
        $plantilla= new ControladorPlantilla();
        //$plantilla->usuario_autentificado();
        //$plantilla->cerrar_session(@$_GET['cerrar_session']);//aqui cierro la session
        $plantilla->categoria_derecha();

    ?>
    
          