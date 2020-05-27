<?php
ini_set('display_errors', 'On');


class ControladorPlantilla_Admin{

        public  function ctr_header(){
            require"template_admin/header_admin.php";
           

        }

        public  function ctr_slider_left(){
            require"template_admin/slider_left.php";
        
        }

        public  function ctr_slider_raigt(){
            require"template_admin/slider_raigt.php";
        }

        public  function ctr_lista_update(){
            require"template_admin/lista_update.php";
        }

        public  function ctr_footer(){
            require"template_admin/footer_admin.php";
        }


        public function reproductor(){
            require"../template/reproductor.php";

        }

        public function ctr_tabla_proveedor(){
            require"proveedores/tabla_proveedor.php";
        }

        public function ctr_tabla_cliente(){
            require"proveedores/tabla_clientes.php";
        }

        public function ctr_tabla_simple_historial_compras_cliente(){
            require"proveedores/tabla_compras_cliente.php";
        }

        public function ctr_tabla_compras_membresias(){
            require'proveedores/tabla_compras_membresia.php';
        }


        public function ctr_tabla_facturas(){
            require"proveedores/tabla_facturas.php";
        }

        public function ctr_tabla_productos(){
            require"proveedores/tabla_productos.php";
        }

        public function ctr_tabla_mis_productos(){
            require"proveedores/tabla_mis_productos.php";
        }
        public function ctr_tabla_productos_vendido_proveedor(){
            require'proveedores/tabla_productos_vendidos_proveedor.php';
        }

        public function ctr_tabla_biblioteca(){
            require'proveedores/tabla_biblioteca.php';
        }

        public function ctr_navegador_derecho(){
            require'template_admin/navegador_derecha.php';
        }

        public function ctr_oferta(){
            require'template_admin/navegador_derecha.php';
        }

        public function ctr_tabla_update(){
            require'proveedores/tabla_update.php';
        }




        // ==================Funciones para session==================
        // ==================Funciones para session==================
        public function usuario_autentificado(){

                session_start();
                
                function revisar_usuario_session(){

                    if($_SESSION['tipo_usuario']=='Admin' or $_SESSION['tipo_usuario']=='Proveedor'){

                        return isset($_SESSION['usuario']);
                    }else{
                        return 0;
                    }
                }

                if(!revisar_usuario_session()){
                    header('location:../../index.php');
                    exit();
                }


        }

    
        public function cerrar_session($cerrar_session){
            $cerrar_session=@$_GET['cerrar_session'];
            if($cerrar_session){// si se emvio la session entonces destruir
              session_destroy();
              header('location:../../index.php');
            }
        }

        public function seguridad_admin(){
           

            if(@$_SESSION['tipo_usuario']="Admin"){
            }else{
                header("Location:index_admin.php");// 
                
            }
        }



}


?>