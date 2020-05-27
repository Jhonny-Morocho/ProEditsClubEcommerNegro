
<!-- ===================================SOLO MIS EDITS PERSOLANES SOLO PROVEEDOR ==================================
===================================SOLO MIS EDITS PERSOLANES SOLO PROVEEDOR ==================================
===================================SOLO MIS EDITS PERSOLANES SOLO PROVEEDOR ================================== -->

    <section class="content">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Todos Mis Edits</h2>

                </div>
            </div>

            <div class="container-fluid">
                <!-- Basic Examples -->
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="header">
                                <?php
                                    ControladorPlantilla_Admin::reproductor();
                                ?>

                            </div>
                            <div class="body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap table-hover"  width="100%"  >
                                <thead>
                                    <tr>

                                        <th>PlaY</th>
                                        
                                        <th>TITULO</th>
                                        <th>GENERO</th>
                                        <th>PRECIO</th>
                                        <th>DJ</th>
                                        <th>Acciones</th>
                                      
                                        <th>DESCARGA</th>
                                        <th>COMPARTIR</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $cont=1;
                                        $productos=CtrProducto::ctr_listar_productos();
        
                                        foreach($productos as $key=>$value){

                                            if($_SESSION['id_proveedor']==$value['id_proveedor']){
                                                echo'<tr>
                                                          
                                                            <td><button type="button" url_destino="../biblioteca/'.($value['url_directorio']) .' " nombre_cancion="'.($value['url_directorio']) .'"   class="btn btn-success reproducir_play " ><i class="zmdi zmdi-hc-fw"></i></button></td>
                                                          
                                                            <td>'.( $value['url_directorio'] ).'</td>
                                                            <td>'.( $value['genero'] ).'</td>
                                                            <td>'.( $value['precio'] ).'</td>
                                                            <td>'.( $value['apodo'] ).'</td>
                                                            <td>  
                                                                <a href="../Vista/admin/form_agregar_editar_producto.php?editar=true&id_producto='.$value['id'].' " data-id=" '.$value['id'].' " class="btn btn-primary "><i class="zmdi zmdi-hc-fw"></i> </a>
                                                            
                                                                <a href="#" data-id=" '.$value['id'].' " data-tipo="eliminar" data-titulo-archivo="'.$value['url_directorio'].'" class="btn btn-danger borrar_producto"><i class="zmdi zmdi-hc-fw"></i> </a>
                                                            </td>
                                                            <td>  <a href=" '.$value['url_descarga'].' "  class="btn btn-info "  target="_blank" ><i class="zmdi zmdi-hc-fw"></i> </a></td>
                                                            <td>  <a href="https://www.proeditsclub.com/demo.php?id_producto= '.$value['id'].' " target="_blank" class="btn btn-success">
                                                                <i class="zmdi zmdi-hc-fw"></i>
                                                            </td>
                                                    </tr>' ;

                                             }
                                        }

                                    ?>

                                </tbody>
                            </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

