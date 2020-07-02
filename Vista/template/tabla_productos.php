        <?php 
            //validacion de campos
            require'Controlador/class_ctr_validacion_campos.php';
            $respuestaValidacion=Pagination::validarCamposBuscador(@$_GET['busqueda']);


            //falra el de paginacion
            //print_r($respuestaValidacion);
    

            $where1="WHERE 
                                productos.id_proveedor=proveedor.id 
                        and     productos.id_biblioteca=biblioteca.id 
                        and     productos.activo=1 

                        and productos.tipo='audio' 
                        and proveedor.estado='1' "; 

            $where2="WHERE 
                                productos.id_proveedor=proveedor.id 
                        and     productos.id_biblioteca=biblioteca.id 
                        and     productos.activo=1 

                        and productos.tipo='audio' 
                        and proveedor.estado='1' and  productos.url_directorio LIKE '%".@$_GET['busqueda']."%'";    
                        
                        
            if(@$_GET['busqueda'] && $respuestaValidacion['respuesta_validacion']=="TRUE"){// este ahun falta congigurar
                
                $page = (isset($_GET["page"]) )? $_GET["page"] : 1;
                Pagination::config($page, 20, " productos , proveedor , biblioteca ", $where2, null , 10); 
                $data = Pagination::data(); 
                //print_r($data);
            }else{
                
                //cuando la pagina inicia solo presenta los datos normales
                $page = ( isset($_GET["page"]) ) ? $_GET["page"] : 1;
                Pagination::config($page, 20, " productos , proveedor , biblioteca ", $where1, null , 10); 
                $data = Pagination::data(); 
            }
            
        ?> 
 
 
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
                            
                                    <div class="formBuscador">
                                            <div class="row">
                                                <div class="col-12">
                                                    <form method="get" action="../">
                                                        <div class="contenderoFormularioBusqueda">
                                                            <div class="row">
                                                                <div class="col-lg-10">
                                                                    <div class="form-group">
                                                                        <input type="text" name="busqueda" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="buscar...">
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2">
                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                    </div>
                           
                                    <table id="" class="table table-bordered table-dark table-hover"  width="100%" style="overflow-x:auto;overflow-y:auto;" >
                                    <?php echo "Stock Total  " .count (CtrProducto::ctr_listar_productos()) ?>
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php $active = ""; ?>

                                        <?php //if ($data["error"]): header("location: ./?page=1"); endif;?>
                      
                                        <?php foreach (Pagination::show_rows("id") as $row): ?>
                                        <?php  $banderaError=false; if( $row['apodo']!== 'Error: vacío' ){ ?>
                                
                                                <tr>
                                                        <td>
                                                            <div class="product-item fix mb-30">
                                                                <div class="row">
                                                                    <div class="col-lg-5 col-sm-5 col-xl-5">
                                                                            <div class="product-thumb">
                                                                                
                                                                                    <img src="../<?php echo $row['img']?>" class="img-pri" alt="" width="100%">
                                                                                
                                                                                
                                                                                <div class="product-label-verde">
                                                                                
                                                                                    <div title="Reproducir"  type="button"  url_destino="../biblioteca/<?php echo $row['url_directorio']?>"  nombre_cancion="<?php echo $row['url_directorio']?> " class="reproducir_play " ><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                        
                                                                                </div>
                    
                                                                                <div class="product-action-link">
                                                                                
                                                                                    <a href="<?php echo (ControladorPlantilla::url_producto()).$row['id'] ?>" target="_blank"  data-toggle="tooltip" data-placement="left" title="Compartir"><i class="fa fa-link"></i></a>
                                                                                    <a href="#" 
                                                                                                    data-toggle="tooltip" 
                                                                                                    data-placement="left" 
                                                                                                    title="Añadir al carrito" 
                                                                                                    class="agregar-carrito"  
                                                                                                    data-id="<?php echo $row['id']?>"  
                                                                                                    data-nombre="<?php echo $row['url_directorio']?>" 
                                                                                                    precio="<?php echo $row['precio']?>" >
                                                                                        <i class="fa fa-shopping-cart"><?php echo $row['precio']?></i>
                                                                                    </a>
                                                                    
                                                                                </div>
                                                                            </div>
                                                                    
                                                                    </div>
                                                            
                                                                    <div class="col-lg-7 col-sm-7 col-xl-7">
                                                                            <div class="product-content">
                                                                            <meta content="keywords" name="<?php echo  $row['url_directorio']?>">
                                                                        
                                                                                <h4><span class="producto-detalle">Titulo</span> : <?php echo  $row['url_directorio']?></h4>
                                                                                <h4><span class="producto-detalle">Genero </span>:<?php echo $row['genero']?></h4>
                                                                            
                                                                                <h4><span class="producto-detalle">Fecha </span>: <?php echo $row['fecha_producto']?></h4>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                        <?php }else{
                                                echo '<div class="alert alert-primary" role="alert">
                                                        No existe resultado para la cadena de busqueda 
                                                    </div>';
                                                $banderaError=true;
                                            } ?>	
                                        <?php endforeach; ?>

                                        </tbody>

                                        <?php if( $banderaError==false){  // si no exite resultado osea marcar erro entonces no presentra paginacion?>
                                            <nav>
                                               
                                                <ul class="pagination">
                                                    <?php if ($data["actual-section"] != 1): ?> 		  			
                                                        <li><a href="../?busqueda=<?php echo @$_GET['busqueda'] ?>&page=1">Inicio</a></li>
                                                        <li><a href="../?busqueda=<?php echo @$_GET['busqueda'] ?>&page=<?php echo $data['previous']; ?>">&laquo;</a></li>
                                                    <?php endif; ?>

                                                    <?php for ($i = $data["section-start"]; $i <= $data["section-end"]; $i++): ?>					
                                                    <?php if ($i > $data["total-pages"]): break; endif; ?>
                                                    <?php $active = ($i == $data["this-page"]) ? "active" : ""; ?>			    
                                                        <li class="<?php echo $active; ?>">
                                                        <a href="../?busqueda=<?php echo @$_GET['busqueda'] ?>&page=<?php echo $i; ?>">
                                                            <?php echo $i; ?>			    		
                                                        </a>
                                                        </li>
                                                        <?php endfor; ?>
                                                    
                                                    <?php if ($data["actual-section"] != $data["total-sections"]): ?>
                                                        <li><a href="../?busqueda=<?php echo @$_GET['busqueda'] ?>&page=<?php echo $data['next']; ?>">&raquo;</a></li>
                                                        <li><a href="../?busqueda=<?php echo @$_GET['busqueda'] ?>&page=<?php echo $data['total-pages']; ?>">Final</a></li>
                                                        <?php endif; ?>
                                                </ul>
                                            </nav>
                                        <?php }  ?>
                                
                                    </table>

                                    <?php if( $banderaError==false){  // si no exite resultado osea marcar erro entonces no presentra paginacion?>
                                            <nav>
                                                
                                                <ul class="pagination">
                                                    <?php if ($data["actual-section"] != 1): ?> 		  			
                                                        <li><a href="../?busqueda=<?php echo @$_GET['busqueda'] ?>&page=1">Inicio</a></li>
                                                        <li><a href="../?busqueda=<?php echo @$_GET['busqueda'] ?>&page=<?php echo $data['previous']; ?>">&laquo;</a></li>
                                                    <?php endif; ?>

                                                    <?php for ($i = $data["section-start"]; $i <= $data["section-end"]; $i++): ?>					
                                                    <?php if ($i > $data["total-pages"]): break; endif; ?>
                                                    <?php $active = ($i == $data["this-page"]) ? "active" : ""; ?>			    
                                                        <li class="<?php echo $active; ?>">
                                                        <a href="../?busqueda=<?php echo @$_GET['busqueda'] ?>&page=<?php echo $i; ?>">
                                                            <?php echo $i; ?>			    		
                                                        </a>
                                                        </li>
                                                        <?php endfor; ?>
                                                    
                                                    <?php if ($data["actual-section"] != $data["total-sections"]): ?>
                                                        <li><a href="../?busqueda=<?php echo @$_GET['busqueda'] ?>&page=<?php echo $data['next']; ?>">&raquo;</a></li>
                                                        <li><a href="../?busqueda=<?php echo @$_GET['busqueda'] ?>&page=<?php echo $data['total-pages']; ?>">Final</a></li>
                                                        <?php endif; ?>
                                                </ul>
                                            </nav>
                                        <?php }  ?>
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


