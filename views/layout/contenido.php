<main>

    <?php

        date_default_timezone_set('Europe/Madrid');

        $contenido = Conexion::select('SELECT * FROM `contenido`');
        
        

        # Aqui MOSTRAMOS todos los datos de contenido

                               

        foreach( $contenido as $i => $cadaCont ){ 
            
            $tiempoactual = time();

            $tiempoFuturo = strtotime($cadaCont->fecha);

            if( $tiempoactual > $tiempoFuturo){ ?>

                
                <section>
                    <h2><?php echo $cadaCont->titular; ?></h2>
                    <p><?php echo $cadaCont->parrafo; ?></p>
                </section>    



            <?php }
             
                
        } 

    ?>
    
    
</main>