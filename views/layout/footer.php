<footer>

    <!-- Este formulario añade información dentro de la tabla registros, sólo hace un INSERT INTO -->
    <form action="controllers/registrar.controler.php?accion=insertar" method="post">
        <input type="email" name="email" placeholder="Email" autocomplete="off">
        <input type="password" name="contrasenia" placeholder="Contraseña">
        <input type="submit" value="Registrarse">
    </form>

    <ul>

    <?php

        $footer = Conexion::select('SELECT * FROM `footer`');
        
        # Aquí MOSTRAMOS todos los datos del footer
        foreach( $footer as $i => $cadaFoo){ ?>
        
            <li><a 
                href="<?php echo $cadaFoo->enlace; ?>"
                title="<?php echo $cadaFoo->contenido; ?>">
                    <?php echo $cadaFoo->contenido; ?>
                </a></li>
        
        <?php } ?>
        
       
    </ul>
</footer>