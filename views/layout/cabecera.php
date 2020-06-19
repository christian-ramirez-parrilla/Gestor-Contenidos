<header>
    <h1><?=InfoPag::$title?></h1>
    <nav>
        <ul>

        <li><a href="index.php">Home</a></li>

        <li><a href="blog.php">Blog</a></li>

            <?php
                
                $cabecera = Conexion::select('SELECT * FROM `cabecera`');

                foreach ($cabecera as $i => $cadaLi) 
                    
                {  ?>  
                    <li>
                        <a 
                            href="<?php echo $cadaLi->enlace; ?>" 
                            title="<?php echo $cadaLi->contenido;?>"
                            
                            <?php 
                                # Si en la BDD la cabecerata tiene $target = 1, mostramos el atributo "target + rel"
                                if( $cadaLi->target ){ ?> target="_blank" rel="noopener noreferrer" <?php }
                            
                            ?>
                            ><?php echo $cadaLi->contenido;?></a>
                    </li>  
                <?php   } ?>

                <!-- Lo he añadido para que sea más fácil acceder al gestor -->
                <li><a href="gestor.php">Ir al gestor</a></li>
        </ul>
    </nav>
</header>