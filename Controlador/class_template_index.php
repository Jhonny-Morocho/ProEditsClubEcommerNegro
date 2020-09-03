<?php
ini_set('display_errors', 'On');


class ControladorPlantilla{

        public  function ctr_header(){
            require"Vista/template/header.php";
            require"Animacion/animacion_espera.php";
           
        }

        public  function ctr_slider(){
            
            require"Vista/template/slider.php";
            
        }

        public  function ctr_categorias(){
            require"Vista/template/categorias.php";
        }

        public  function ctr_lista_update(){
            require"Vista/template/lista_update.php";
          
        }

        public  function ctr_footer(){
            
            require"Vista/template/footer.php";

 
        }


        public function reproductor(){
           
           // require"jPlayer Flat Audio Theme/reproductor.php";
           require"jPlayer Flat Audio Theme/reproductorWave.php";
        }

        
        public function ctr_panel_admin(){
            require"Vista/template/panel_admin.php";
        }


        public function ctr_tabla_descargar_productos_cliente(){
            require'Vista/template/tabla_descargar_productos_cliente.php';
        }



        public function ctr_tabla_carrito_compras(){
             require'Vista/template/tabla_carrito_compras.php';
        }

        public function ctr_tabla_productos(){
            require'Vista/template/tabla_productos.php';
        }


        public function ctr_modal_info(){
            require'Vista/template/modal_info.php';
        }

        public function wassap(){
            require'Wassap/wassap.php';
        }


        public function categoria_derecha(){
            require'Vista/template/cetegoria_derecha.php';
        }
        
        // ==================Funciones para session==================
        // ==================Funciones para session==================
        public function usuario_autentificado(){

            session_start();
            function revisar_usuario_session(){

                if($_SESSION['tipo_usuario']=='Cliente'){

                    return isset($_SESSION['usuario']);
                }else{
                    return 0;
                }
            }

            if(!revisar_usuario_session()){
                header('location: index.php');
                exit();
            }


        }


        public function cerrar_session($cerrar_session){
            $cerrar_session=@$_GET['cerrar_session'];
            if($cerrar_session){// si se emvio la session entonces destruir
            session_destroy();
            header('location: index.php');
            }
        }


        
        public static function url_producto(){
            
                return "../demo.php?id_producto=";
           
        }

        public static function url_update(){
            return "../update_demos.php?id_update=";
        }

        public static function url_dj_productos(){
          
            return "../dj_productos.php?id_proveedor=";
           
        }

        public static function url_biblioteca_productos(){
   
            return "../genero_productos.php?id_genero=";
            
        }




        







}


?>

