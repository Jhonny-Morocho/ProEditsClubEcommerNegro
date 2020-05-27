<div class="col-lg-3 float-right order-lg-1 panel panel-default" style="order:2 !important">


    
    <div class="row">
        <div class="col-lg-12" >
            <h2 class="top_15">Top 15 de la semana</h2>
           <UL clas="nav">
               
                <?php 
                    $cont_2=0;
                
                    $cliente_producto=CtrCliente_Producto::ctr_listar_cliente_producto();
              
                                        
                        foreach($cliente_producto as $key=>$value){
        
                            if($cont_2<15){//solo q impirma 10 productos
                                echo ' <LI>
                                    <div class="product-item fix mb-30">
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-4 col-xl-4">
                                                    <div class="top-10">
                                                        <a href="'.(ControladorPlantilla::url_dj_productos()).$value['id_proveedor'].'">
                                                            <img src=  " ../'. ($value['img']).' " class="img-pri" alt="" width="100%">
                                                        
                                                        </a>
                                                    
                                                        
                                                    </div>
                                            
                                            </div>
                                    
                                            <div class="col-lg-8 col-sm-8 col-xl-8">
                                                    <div class="product-content">
                                                    
                                                        <h4><span class="producto-detalle"><a href="'.(ControladorPlantilla::url_producto()).$value['id_producto'].'">Titulo</span> :  '.($value['url_directorio']).'</a></h4>
                                                        
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
                            
                                    </LI>' ;
        
                            }
                            $cont_2++;
        
                            }
                                                ?>
                </LI>
           </UL>
        </div>

    </div>

</div>

       


