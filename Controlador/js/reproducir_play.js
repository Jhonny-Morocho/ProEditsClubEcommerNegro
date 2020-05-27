//===========================================JSQUERY REPRODUCTOr===================///



 


    //animacion de espera
    function configureLoadingScreen(screen){

        $(document)
            .ajaxStart(function () {
                screen.fadeIn();
            })
            .ajaxStop(function () {
                screen.fadeOut();
            });
        }
        
        function animacion(){
            
            var screen = $('#loading-screen');
            
            configureLoadingScreen(screen);
            $.get('http://jsonplaceholder.typicode.com/posts')
                    .done(function(result){
        
                    })
                    .fail(function(error){
        
        })
    }
            
        
var estadoReproductor=false;

$('.reproducir_play i').on('click',function(e){
    //('.loading').remove();
    estadoReproductor=true;

    if(estadoReproductor==true){

        estadoReproductor=false;

        $(this).toggleClass('fa fa-play-circle').toggleClass('fa fa-pause-circle');
    }else{
        estadoReproductor=true;
        $('.reproducir_play i').toggleClass('fa fa-pause-circle').toggleClass('fa fa-play-circle');
    }
    
    
});

   
$('.reproducir_play').on('click',function(e){


    e.preventDefault();


 var player = $.AudioPlayer;
    player.init({
        container: '#audioWrap'
        ,source: ''
        ,imagePath: '../ReproducotrMinimal/src/image'
        ,debuggers: true
        ,allowSeek: true
    });

    //$(".cargandoCancion").remove();
    var url_destino=$(this).attr('url_destino');
    var titulo=$(this).attr('nombre_cancion');
    console.log("ddd");
    //animacion();

    //$(this).append('<div class="cargandoCancion"></div>');
   
    //$('.cargandoCancion').html('<div class="loading"><img style="width:100%" src="../Fx Cargando/images/loader.gif"/><br/>Cargando</div>');

    $.ajax({
        type:'post',
        data:{
            'url_destino':url_destino
        },
        url:'../Controlador/class_ctr_reproducir.php',
        //dataType:'text',//json
        success:function(data){
            console.log(data);
            animacion();

            //(this).fadeIn(1000).html(data);
            //$(".cargandoCancion").remove();
            //(this).remove('.loading');//eliminar el icno de espera sie xite uno
            player.updateSource({
                source: url_destino
            });

            
        }
    });
 
   

   
    
});