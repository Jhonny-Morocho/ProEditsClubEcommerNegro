<?php

ini_set('display_errors', 'On');


//revisamos la session si existe
require'../../Controlador/class_ctr_template_admin.php';
$plantilla= new ControladorPlantilla_Admin();

$plantilla->usuario_autentificado();


//1.importo las clases  de los modelo aqui esta las consultas
require'../../Modelo/class_mdl_bd_conexion.php';




//==========================================AJAX PROVEEDOR======================================//
//==========================================AJAX PROVEEDOR======================================//
    require'../../Modelo/class_mdl_proveedor.php';


    //2. importo las clases  de los controladores donde me regresa la respuesta aqui esta las consultas
    include'../../Controlador/class_ctr_proveedor.php';

    //3. ENVIO LOS DATOS Q RECIVO DEL FORMULARIO CREANDO UN OBJETO DEL CONTROLADOR
    $proveedor= new CtrProveedor();//creo el bojeto para ocupar sus metodos

    switch (@$_POST['proveedor']) {

        case 'editar':

        //===========================ACTUALIZAR LOS DATOS DE LOS PROVEEDORES////////
        $proveedor->ctr_individual_update( htmlspecialchars(@$_POST['id']),
                                        htmlspecialchars (@$_POST['nombre'] ),
                                        htmlspecialchars (@$_POST['apellido']) ,
                                        htmlspecialchars (@$_POST['correo'] ),
                                        htmlspecialchars (@$_POST['apodo'] ),
                                        htmlspecialchars (@$_POST['password'] ),
                                        htmlspecialchars (@$_POST['img'] )
                                                            );
            break;


        case 'eliminar':
        //===========================EIIMINAR LOGICAMENTE EL PROVEEDOR////////
        $proveedor->ctr_individual_eliminar(@$_POST['id']);
            
            break;

        case 'agregar':

        $proveedor->ctr_agregar_proveedor(htmlspecialchars(@$_POST['nombre']),
                                        htmlspecialchars(@$_POST['apellido']),
                                        htmlspecialchars(@$_POST['correo']),
                                        htmlspecialchars(@$_POST['apodo']),
                                        htmlspecialchars(@$_POST['password']),
                                        htmlspecialchars(@$_POST['img'])  
                                        );

            break;
    }



    //==========================================AJAX PRODUCTO======================================//
    //==========================================AJAX PRODUCTO======================================//
    require'../../Modelo/class_mdl_producto.php';


    //2. importo las clases  de los controladores donde me regresa la respuesta aqui esta las consultas
    include'../../Controlador/class_ctr_producto.php';

    //3. ENVIO LOS DATOS Q RECIVO DEL FORMULARIO CREANDO UN OBJETO DEL CONTROLADOR
    $producto= new CtrProducto();//creo el bojeto para ocupar sus metodos

    @$dolares=$_POST['dolares'];
    @$centavos=$_POST['centavo'];
    @$precio=$dolares.".".$centavos;
    @$id_proveedor=$_POST['id_proveedor'];
    @$id_genero=$_POST['id_genero'];
    @$url_descarga=$_POST['url_descarga'];



    //para eliminar el producto
    @$id_producto=$_POST['id_producto'];
    @$titulo_arhivo=$_POST['titulo_arhivo'];



    switch (@$_POST['producto']) {

        case 'agregar':


                        //verifico si el archivo se encuetra cargado solo imprimo para contatar
                        //$respuesta=array('post'=> $_POST , 
                                            //'file'=> $_FILES );
                        //print_r($respuesta);

                        //==================================MUEVEO EL ARCHIVO A LA CARPETA DE DESTINO=======================//
                        //==================================MUEVEO EL ARCHIVO A LA CARPETA DE DESTINO=======================//
                        $directorio="../../biblioteca/";// la direecion donde quiero q se guarde
                        $subir_archivo=false;

                        if(move_uploaded_file($_FILES['archivo_musica']['tmp_name'], $directorio.$_FILES['archivo_musica']['name'])){
                            // para acceder al archiv q se alamceno con el siguiente comando
                            $musica_url=$_FILES['archivo_musica']['name'];
                            $musica_resultado="Se cargo correctameten";
                            $subir_archivo=true;
                        }else{
                            $respuesta=array('respuesta'=>error_get_last());// imprime el ultimo error que haya registrado al intentar subi este archivo
                            //echo "No se puede subir el erchivo";
                            //print_r($respuesta);

                            }

                        //die(json_encode($_POST));debugiar
                        //==================================GUARDO DATOS DEL ARCHIVO  O PRODUCTO EN LA BD=======================//
                        //==================================GUARDO DATOS DEL ARCHIVO  O PRODUCTO EN LA BD=======================//
                        if($subir_archivo==true){
                                $producto->ctr_agregar_producto(@$id_proveedor,
                                                                @$id_genero,
                                                                @$url_descarga,
                                                                @$precio,
                                                                ($musica_url)
                                                            );

                        }else{
                            //1. el archvo es demasiado grande 
                            //2. no se puede contrar la ubicacion de destino para guardar el archivo
                            $respuesta=array(
                                'respuesta'=>'error_archivo_subir'
                            );
                            die(json_encode($respuesta));//si el archivo no se guardo bien
                        }
        
            
            break;


        case 'editar':  
                     
                         @$titulo_nuevo=($_POST['titulo-nuevo']);
                         @$titulo_antiguo=($_POST['titulo-antiguo']);
                        
                        $producto->ctr_editar_producto(@$_POST['id_producto'],
                                                        @$id_genero,
                                                        @$url_descarga,
                                                        @$precio,
                                                        $titulo_nuevo,
                                                        $titulo_antiguo
                                                        );

                
            break;

        case 'eliminar':
                        $producto->ctr_eliminar_producto(@$id_producto,$titulo_arhivo);
                        
                      

            break;
    }
    

  

      //==========================================AJAX BIBLIOTECA======================================//
    //==========================================AJAX BIBLIOTECA======================================//
    require'../../Modelo/class_mdl_biblioteca.php';


    //2. importo las clases  de los controladores donde me regresa la respuesta aqui esta las consultas
    include'../../Controlador/class_ctr_biblioteca.php';

    //3. ENVIO LOS DATOS Q RECIVO DEL FORMULARIO CREANDO UN OBJETO DEL CONTROLADOR
    $biblioteca= new CtrBiblioteca();//creo el bojeto para ocupar sus metodos



    switch (@$_POST['biblioteca']) {

        case 'agregar':

                        $biblioteca->ctr_agregar_biblioteca(@$_POST['genero']);
            break;


        case 'editar':  
                        $biblioteca->ctr_editar_biblioteca(@$_POST['id'],@$_POST['genero']);//espero la respuesta y el ajax recibe la respuesta

            break;

        case 'eliminar':
                        $biblioteca->ctr_eliminar_biblioteca(@$_POST['id']);
            break;
    }

 ?>