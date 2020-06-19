<?php
	# Incluir los datos de conexión
    require 'models/conexion.models.php';
    
    # Incluir los datos de los models
    require 'models/pagina.models.php';

	
	
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex/nofollow">
	<title>Gestor-Contenidos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="css/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="css/jquery-ui-timepicker-addon.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" defer></script>
    <script src="js/jquery.mask.min.js" defer></script>
    <script src="js/jquery-ui.min.js" defer></script>
    <script src="js/jquery-ui-timepicker-addon.min.js" defer></script>
    <script src="js/gestor.js" defer></script>
</head>

<body class="gestor">
  <header>
    <h1>Gestor</h1>
    <a href="index.php" title="Volver a la web">Volver a la web</a>
    <a href="controllers/sesion.controler.php?accion=cerrar">Cerrar Sesión</a>
  </header>

  <main>

    <?php
    
    
     if($_COOKIE['id']){ ?>

        <section class="gestor__section"> 
                <h2 class="gestor__h2 gestor__h2--grande">Editando la cabecera</h2>
                <ul class="gestor__ul">
                    <li class="gestor__h2">Mostrando cabecera</li>
                <?php
                    $cabecera = Conexion::select('SELECT * FROM `cabecera`');
                    foreach( $cabecera as $i => $cadaLi ){  
                    # Ahora dentro de cada li añadimos un enlace para ELMINAR ese elemento
                    ?>  
                        <li>
                        <span><?php echo $cadaLi->contenido;?></span>

                        <a href="gestor.php?seccion=cabecera&id=<?php echo $cadaLi->id;?>" title="Actualizar">
                                    Actualizar el ID
                                <?php echo $cadaLi->id;?>
                            </a>
                            <a href="controllers/cabecera.controler.php?accion=eliminar&id=<?php echo $cadaLi->id;?>" title="Eliminar">
                                    Eliminar el ID
                                <?php echo $cadaLi->id;?>
                            </a>
                        </li>  
                    <?php   } ?>
                </ul>

                <!-- Este formulario sirve para añadir nuevos elementos a la cabecera -->

                <?php
                
                    if( $_GET['seccion'] == 'cabecera'){   ?>

                        <?php
                        
                            $id=$_GET['id'];

                            $contenidoUp=Conexion::select("SELECT * FROM `cabecera` WHERE `id`=$id");
                        
                        
                        ?>

                        <form class="gestor__form" action="controllers/cabecera.controler.php?accion=actualizar" method="post">
                                    <h2 class="gestor__h2">Actualizar <?=$contenidoUp->contenido?></h2>
                                    <input type="hidden" name="id" value="<?=$contenidoUp->id?>">
                                    <div class="checkbox">
                                        <label for="activado">¿Activar este elemento?</label>
                                        <input 
                                        autocomplete="off" 
                                        id="activado" 
                                        name="activado"   
                                        type="checkbox"
                                        <?php
                                        
                                            if($contenidoUp->activado){ ?>

                                                checked

                                            <?php }else{ ?>

                                                

                                            <?php }
                                        
                                        
                                        ?>
                                        >
                                    </div>
                                    <input autocomplete="off" id="contenido"   name="contenido"type="text" placeholder="Introduce el contenido" value="<?=$contenidoUp->contenido?>">
                                    <input autocomplete="off" id="enlace"      name="enlace"   type="text" placeholder="Introduce el href" value="<?=$contenidoUp->enlace?>">
                                    <div class="checkbox">
                                        <label for="target">¿Se abre en una nueva ventana?</label>
                                        <input 
                                        autocomplete="off" 
                                        id="target"  
                                        name="target"   
                                        type="checkbox"
                                        <?php
                                        
                                            if($contenidoUp->target){ ?>

                                                checked

                                            <?php }else{ ?>

                                                

                                            <?php }
                                        
                                        
                                        ?>
                                        >
                                    </div>
                                    <input type="submit" value="Actualizar <?=$contenidoUp->contenido?>">
                                    <!-- en el text area se pone lo del value como si fuera contenido -->
                        </form>





                    <?php }else{ ?>

                        <form class="gestor__form" action="controllers/cabecera.controler.php?accion=insertar" method="post">
                            <h2 class="gestor__h2">Añadir un elemento a la cabecera</h2>
                            <div class="checkbox">
                                <label for="activado">¿Activar este elemento?</label>
                                <input autocomplete="off" id="activado" name="activado"   type="checkbox">
                            </div>
                            <input autocomplete="off" id="contenido"   name="contenido"type="text" placeholder="Introduce el contenido">
                            <input autocomplete="off" id="enlace"      name="enlace"   type="text" placeholder="Introduce el href">
                            <div class="checkbox">
                                <label for="target">¿Se abre en una nueva ventana?</label>
                                <input autocomplete="off" id="target"  name="target"   type="checkbox">
                            </div>
                            <input type="submit" value="Añadir a la cabecera">
                        </form>


                    <?php }
                
                
                ?>

                
            </section>


















            <section class="gestor__section">  
                <h2 class="gestor__h2 gestor__h2--grande">Editando los titulares y párrafos</h2>
                <ul class="gestor__ul">
                    <li class="gestor__h2">Mostrando titulares</li>
                    <?php
                        $contenido = Conexion::select('SELECT * FROM `contenido`');
                        foreach( $contenido as $i => $cadaCont ){
                            # Ahora dentro de cada li añadimos un enlace para ELMINAR ese elemento ?>
                            <li>
                                <span><?php echo $cadaCont->titular; ?></span>  
                                <a href="gestor.php?seccion=contenido&id=<?php echo $cadaCont->id; ?>">Actualizar el ID <?php echo $cadaCont->id; ?></a>  
                                <a href="controllers/contenido.controler.php?accion=eliminar&id=<?php echo $cadaCont->id; ?>">Eliminar el ID <?php echo $cadaCont->id; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                
                
                <!-- Este formulario sirve para añadir nuevos elementos a los titulares -->

                <?php
                
                    if( $_GET['seccion'] == 'contenido'){ ?>

                        <?php
                        
                            $id=$_GET['id'];

                            $tituloAs=Conexion::select("SELECT * FROM `contenido` WHERE `id`=$id");
                        
                        
                        ?>

                        <form class="gestor__form" action="controllers/contenido.controler.php?accion=actualizar" method="post">
                                    <h2 class="form__title">Actualizar <?=$tituloAs->titular?></h2>
                                    <input type="hidden" name="id" value="<?=$tituloAs->id?>">
                                    <div class="checkbox">
                                        <label for="activado">¿Activar este elemento?</label>
                                        <input 
                                        autocomplete="off" 
                                        id="activado" 
                                        name="activado"   
                                        type="checkbox"
                                        <?php
                                        
                                            if($tituloAs->activado){ ?>

                                                checked

                                            <?php }else{ ?>



                                            <?php } 
                                        
                                        ?>
                                        >
                                    </div>
                                    <input autocomplete="off" id="contenido"   name="contenido"    type="text" placeholder="Introduce el contenido" value="<?=$tituloAs->titular?>">
                                    <textarea autocomplete="off" name="parrafo" id="parrafo" placeholder="Introduce tu párrafo"><?=$tituloAs->parrafo?></textarea>
                                    <input type="submit" value="Actualizar <?=$tituloAs->titular?>">
                        </form>


                    <?php }else{ ?>

                        <form class="gestor__form" action="controllers/contenido.controler.php?accion=insertar" method="post">
                            <h2 class="form__title">Añadir un titular</h2>
                            <div class="checkbox">
                                <label for="activado">¿Activar este elemento?</label>
                                <input autocomplete="off" id="activado" name="activado"   type="checkbox">
                            </div>
                            <input autocomplete="off" id="contenido"   name="contenido"    type="text" placeholder="Introduce el contenido">
                            <textarea autocomplete="off" name="parrafo" id="parrafo" placeholder="Introduce tu párrafo"></textarea>
                            <input type="submit" value="Añadir a Titulares">
                        </form>

                    <?php }
                
                
                
                ?>


                


                
            </section>






























            <section class="gestor__section"> 
                <h2 class="gestor__h2 gestor__h2--grande">Editando el blog</h2>
                <ul class="gestor__ul">
                    <li class="gestor__h2">Mostrando Post</li>
                <?php
                    $cabecera = Conexion::select('SELECT * FROM `BLOG`');
                    foreach( $cabecera as $i => $cadaLi ){  
                    # Ahora dentro de cada li añadimos un enlace para ELMINAR ese elemento
                    ?>  
                        <li>
                        <span><?php echo $cadaLi->Titular;?></span>

                        <a href="gestor.php?seccion=blog&id=<?php echo $cadaLi->id;?>" title="Actualizar">
                                    Actualizar el ID
                                <?php echo $cadaLi->id;?>
                            </a>
                            <a href="controllers/blog.controler.php?accion=eliminar&id=<?php echo $cadaLi->id;?>" title="Eliminar">
                                    Eliminar el ID
                                <?php echo $cadaLi->id;?>
                            </a>
                        </li>  
                    <?php   } ?>
                </ul>

                <!-- Este formulario sirve para añadir nuevos elementos a la cabecera -->

                <?php
                
                    if( $_GET['seccion'] == 'blog'){   ?>

                        <?php
                        
                            $id=$_GET['id'];

                            $contenidoUp=Conexion::select("SELECT * FROM `BLOG` WHERE `id`=$id");
                        
                        
                        ?>

                        <form class="gestor__form" action="controllers/blog.controler.php?accion=actualizar" method="post">
                                    <h2 class="gestor__h2">Actualizar <?=$contenidoUp->Titular?></h2>
                                    <input type="hidden" name="id" value="<?=$contenidoUp->id?>">
                                    <div class="checkbox">
                                        <label for="activado">¿Activar este elemento?</label>
                                        <input 
                                        autocomplete="off" 
                                        id="activado" 
                                        name="activado"   
                                        type="checkbox"
                                        <?php
                                        
                                            if($contenidoUp->activado){ ?>

                                                checked

                                            <?php }else{ ?>



                                            <?php } 
                                        
                                        ?>
                                        >
                                    </div>
                                    <input autocomplete="off" id="titular"   name="titular"type="text" placeholder="Introduce el Titular" value="<?=$contenidoUp->Titular?>">
                                    <input autocomplete="off" id="parrafo"      name="parrafo"   type="text" placeholder="Introduce el href" value="<?=$contenidoUp->Parrafo?>">
                                    <input autocomplete="off" id="datepicker" type="text" name="fecha" placeholder="2020-05-12 00:00:00">
                                    
                                    <input type="submit" value="Actualizar <?=$contenidoUp->Titular?>">
                                    <!-- en el text area se pone lo del value como si fuera contenido -->
                        </form>





                    <?php }else{ ?>

                        <form class="gestor__form" action="controllers/blog.controler.php?accion=insertar" method="post">
                            <h2 class="gestor__h2">Añadir un Post</h2>
                            <div class="checkbox">
                                <label for="activado">¿Activar este Post?</label>
                                <input autocomplete="off" id="activado" name="activado"   type="checkbox">
                            </div>
                            <input autocomplete="off" id="titular"   name="titular"type="text" placeholder="Introduce el Titular" value="<?=$contenidoUp->Titular?>">
                            <input autocomplete="off" id="parrafo"      name="parrafo"   type="text" placeholder="Introduce el párrafo" value="<?=$contenidoUp->Parrafo?>">
                            <input autocomplete="off" id="datepicker" type="text" name="fecha" placeholder="2020-05-12 00:00:00">
                            <input type="submit" value="Añadir el Post">
                        </form>


                    <?php }
                
                
                ?>

                
            </section>










































            <section class="gestor__section">    
                <h2 class="gestor__h2 gestor__h2--grande">Editando el Footer</h2>
                <ul class="gestor__ul">
                    <li class="gestor__h2">Mostrando los elementos del footer</li>
                <?php
                    $footer = Conexion::select('SELECT * FROM `footer`'); 
                    foreach( $footer as $i => $cadaFoo){
                        # Ahora dentro de cada li añadimos un enlace para ELMINAR ese elemento?>
                        <li>
                            <span><?php echo $cadaFoo->contenido; ?></span>  
                            <a href="gestor.php?seccion=footer&id=<?php echo $cadaFoo->id; ?>">Actualizar el ID <?php echo $cadaFoo->id; ?></a>  
                            <a href="controllers/footer.controler.php?accion=eliminar&id=<?php echo $cadaFoo->id; ?>">Eliminar el ID <?php echo $cadaFoo->id; ?></a>
                        </li>
                    <?php } ?>
                </ul>
                
                <!-- Este formulario sirve para añadir nuevos elementos al footer -->

                <?php
                
                        if($_GET['seccion'] == 'footer'){ ?>

                            <?php
                            
                                $id=$_GET['id'];

                                $footerAs=Conexion::select("SELECT * FROM `footer` WHERE `id`=$id");
                            
                            
                            
                            ?>


                            <form class="gestor__form" action="controllers/footer.controler.php?accion=actualizar" method="post">
                                <h2 class="form__title">Actualizar <?=$footerAs->contenido?></h2>
                                <input type="hidden" name="id" value="<?=$footerAs->id?>">
                                <div class="checkbox">
                                    <label for="activado">¿Activar este elemento?</label>
                                    <input 
                                    autocomplete="off" 
                                    id="activado" 
                                    name="activado"   
                                    type="checkbox"
                                    <?php
                                    
                                    if($footerAs->activado){ ?>

                                        checked

                                    <?php }else{ ?>

                                    <?php }
                                    
                                    ?>
                                    >
                                </div>
                                <input autocomplete="off" id="contenido"   name="contenido"    type="text" placeholder="Introduce el contenido" value="<?=$footerAs[0]->contenido?>">
                                <input autocomplete="off" id="enlace"      name="enlace"   type="text" placeholder="Introduce el href" value="<?=$footerAs[0]->enlace?>">
                                <div class="checkbox">
                                    <label for="target">¿Se abre en una nueva ventana?</label>
                                    <input 
                                    autocomplete="off" 
                                    id="target"  
                                    name="target"   
                                    type="checkbox"
                                    <?php
                                    
                                        if($footerAs->target){ ?>

                                            checked

                                        <?php }else{ ?>


                                        <?php }
                                    
                                    
                                    ?>
                                    
                                    >
                                </div>
                                <input type="submit" value="Actualizar <?=$footerAs->contenido?>">
                            </form>



                        <?php }else{ ?>

                            <form class="gestor__form" action="controllers/footer.controler.php?accion=insertar" method="post">
                                <h2 class="form__title">Añadir un elemento al footer</h2>
                                <div class="checkbox">
                                    <label for="activado">¿Activar este elemento?</label>
                                    <input autocomplete="off" id="activado" name="activado"   type="checkbox">
                                </div>
                                <input autocomplete="off" id="contenido"   name="contenido"    type="text" placeholder="Introduce el contenido">
                                <input autocomplete="off" id="enlace"      name="enlace"   type="text" placeholder="Introduce el href">
                                <div class="checkbox">
                                    <label for="target">¿Se abre en una nueva ventana?</label>
                                    <input autocomplete="off" id="target"  name="target"   type="checkbox">
                                </div>
                                <input type="submit" value="Añadir al Footer">
                            </form>



                        <?php }
                
                
                
                ?>


                


                
            </section>


     <?php }else{ ?>

            <form class="formReg" action="controllers/sesion.controler.php?accion=entrar" method="post">
            
                <input type="email" placeholder="Introduce tu email" name="email">
                <input type="password" placeholder="Introduce tu contraseña" name="contrasenia">
                <input type="submit" value="Entrar">
            
                
            
            </form>  
            
            


     <?php }
    
    
    
    ?>


    


  </main>

   



</body>
</html>

