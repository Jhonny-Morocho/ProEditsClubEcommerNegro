<?php
    ini_set('display_errors', 'On');

    class Ctr_Oferta{
            //* listar  facturas del cliente individual
            
        public static function ctr_listar_Oferta(){//listar cliente
                 return $respuesta=Modelo_Oferta::sql_lisartar_Oferta();//

        } 
        

        public static function ctr_editar_Oferta($arrayOferta){
			
            
            $respuesta=Modelo_Oferta::sql_editar_Oferta($arrayOferta);
            //return  $respuesta =Modelo_Oferta::sql_editar_oferta($arrayOferta);//
          
           // print_r($respuesta);
            return die(json_encode($respuesta));
        }


		
    }

//$objOferta=new Ctr_Oferta();


switch (@$_POST['Oferta']) {

    case 'listar':
        require'../Modelo/class_mdl_bd_conexion.php';
        require'../Modelo/class_mdl_Oferta.php';
        
         die(json_encode( Ctr_Oferta::ctr_listar_Oferta() ) );

            break;
    case 'editar':
        require'../Modelo/class_mdl_bd_conexion.php';
        require'../Modelo/class_mdl_Oferta.php';
        
            Ctr_Oferta::ctr_editar_Oferta($_POST);

            break;
            
        default:
            # code...
            break;
    }



?>