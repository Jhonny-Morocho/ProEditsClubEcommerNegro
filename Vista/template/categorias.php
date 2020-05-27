<?php
ini_set('display_errors', 'On');

require'Modelo/class_mdl_biblioteca.php';
    

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

            <?php $plantilla= new ControladorPlantilla();
            $plantilla->ctr_tabla_productos(); 
            ?>
       
        </div>
    </div>
</div>
<!-- page wrapper end -->