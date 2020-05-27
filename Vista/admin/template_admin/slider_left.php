
<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="../index.php"><img src="../Vista/img_dj/LOGO NEGRO.png" width="25" alt="PEDC"><span class="m-l-10">Ir a la tienda</span></a>
    </div> 
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="../index.php"><img src="../Vista/img_dj/LOGO NEGRO.png" alt="User"></a>
                    <div class="detail">
                        <h4>Hola <?php echo $_SESSION['usuario']?> </h4>
                        <!-- <small>Super Admin</small>                         -->
                    </div>
                </div>
            </li>
            <li class="active open"><a href="../Vista/admin/index_admin.php"><i class="zmdi zmdi-hc-fw"></i><span>Información</span></a></li>
            <?php if($_SESSION['tipo_usuario']=="Admin"){?>
            
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-hc-fw" ></i><span>Gestionar Dj/Editores</span></a>
                        <ul class="ml-menu">
                            <li><a href="../Vista/admin/listar_proveedor.php">Listar Dj/Editores</a></li>
                            <li><a href="../Vista/admin/form_agregar_editar_proveedor.php?editar=false">Agregar Dj/Editor</a></li>                   
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-hc-fw"></i><span>Gestionar Clientes</span></a>
                        <ul class="ml-menu">
                            <li><a href="../Vista/admin/listar_clientes.php">Listar Clientes</a></li>
                            <li><a href="../Vista/admin/listar_facturas.php">Listar facturas</a></li>

                        </ul>
                    </li>
                
            <?php } ?>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-hc-fw"></i><span>Audio</span></a>
                <ul class="ml-menu">

                <?php if($_SESSION['tipo_usuario']=="Admin"){?>
                    <li><a href="../Vista/admin/listar_productos.php">Listar todos los Edits</a></li>
                
                <?php } ?>

                    <li><a href="../Vista/admin/listar_mis_productos.php">Listar mis Edits</a></li>
                    <li><a href="../Vista/admin/form_agregar_editar_producto.php">Agregar nuevo Edit</a></li>
                </ul>
            </li>


            <?php if($_SESSION['tipo_usuario']=="Admin"){?>
                <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-hc-fw"></i><span>Biblioteca/Genero</span></a>
                    <ul class="ml-menu">
                        <li><a href="../Vista/admin/listar_biblioteca.php">Listar Generos Musical</a></li>
                        <li><a href="../Vista/admin/form_agregar_editar_biblioteca.php?editar=false">Agregar</a></li>
                    </ul>
                </li>
            
            <?php  }?>


            <?php if($_SESSION['tipo_usuario']=="Admin"){?>
                <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-hc-fw"></i><span>Actualizaciones</span></a>
                    <ul class="ml-menu">
                        <li><a href="../Vista/admin/listar_updates.php">Listar Updates</a></li>
                        <li><a href="../Vista/admin/form_agregar_editar_actualizacion.php?editar=false">Agregar</a></li>
                    </ul>
                </li>
            
            <?php  }?>

            <?php if($_SESSION['tipo_usuario']=="Admin"){?>
                <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-hc-fw"></i><span>Ofertas</span></a>
                    <ul class="ml-menu">
                        <li><a href="../Vista/admin/form_editar_oferta.php">Listar Oferta</a></li>
                     
                    </ul>
                </li>
            
            <?php  }?>
        </ul>
    </div>
</aside>
