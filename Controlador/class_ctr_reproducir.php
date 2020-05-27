<?php

        
        $nombre_fichero = $_POST['url_destino'];

        if (file_exists($nombre_fichero)) {
            $respuesta=array('archivo'=>'existe');
            
            
        } else {
            
            $respuesta= array('archivo'=>'noExiste');
            
        }

        sleep(1);
        die(json_encode($respuesta));
        
       
        // Devuelve TRUE
        //$exists = file_exists( $directory );


       

?>