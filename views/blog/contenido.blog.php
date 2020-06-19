<main>

    <?php

        date_default_timezone_set('Europe/Madrid');

        setlocale(LC_ALL,"es_ES");

        $buscar = Conexion::select("SELECT * FROM `BLOG` ORDER BY `Fecha` DESC");
    
        foreach ($buscar as $i => $cadabl) { 
            
            $tiempo = time();
            
            $tiempoBl = strtotime($cadabl->Fecha);

            $dia = strftime('%d',$tiempoBl);
            
            $mes = strftime('%B',$tiempoBl);

            $ano = strftime('%G',$tiempoBl);


            if( $tiempo > $tiempoBl){ ?>


                <section>

                    <div class="encuadre">

                        <h2 class="titulobl"><?=$cadabl->Titular?></h2>

                        <p class="pbl"><?=$cadabl->Parrafo?></p>

                        <h5>Post publicado el dia <?=$dia?> de <?=$mes?> del año <?=$ano?></h5>



                    </div>



                </section>





            <?php }
            
        }
    
    
    ?>

    

    

</main>

