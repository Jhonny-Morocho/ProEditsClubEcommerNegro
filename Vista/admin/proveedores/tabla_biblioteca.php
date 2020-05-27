
<!-- ===================================SOLO MIS EDITS PERSOLANES SOLO PROVEEDOR ==================================
===================================SOLO MIS EDITS PERSOLANES SOLO PROVEEDOR ==================================
===================================SOLO MIS EDITS PERSOLANES SOLO PROVEEDOR ================================== -->

    <section class="content">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Generos Musicales</h2>

                </div>
            </div>

            <div class="container-fluid">
                <!-- Basic Examples -->
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="header">
                          
                            </div>
                            <div class="body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap table-hover"  width="100%"  >
                                <thead>
                                    <tr>
                                        <th>Genero</th>
                                        <th>EDITAR</th>
                                        <th>ELIMINAR</th>s
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $bliblioteca=CtrBiblioteca::ctr_listar_biblioteca();

                                        foreach($bliblioteca as $key=>$value){
                                            echo'<tr>
                                                        <td>'.( $value['genero'] ).'</td>
                                                        <td>  <a href="../Vista/admin/form_agregar_editar_biblioteca.php?editar=true&id_genero='.$value['id'].' " data-id=" '.$value['id'].' " class="btn btn-primary "><i class="zmdi zmdi-hc-fw"></i> </a></td>
                                                        <td>  <a href="#" data-id="'.$value['id'].'"  data-genero="'.$value['genero'].'"   class="btn btn-danger borrar_bliblioteca"><i class="zmdi zmdi-hc-fw"></i> </a></td>
                                                      
                                                </tr>' ;

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

