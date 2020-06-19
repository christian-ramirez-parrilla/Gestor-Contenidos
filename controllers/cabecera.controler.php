<?php

    
    require '../models/conexion.models.php';
    require '../models/pagina.models.php';

    
    
    $accion = $_GET['accion'];

    switch ($accion) {
        case 'insertar':

                if( $_POST['activado'] == 'on' ){ $activado = 1; }else{ $activado = 0; }
        
        
                $contenido = $_POST['contenido'];
                
                
                $enlace = $_POST['enlace'];

                
                if( $_POST['target'] == 'on' ){ $target = 1; }else{ $target = 0; }
                
                
                Gestor::sql("INSERT INTO `cabecera`(`id`,`activado`,`contenido`,`enlace`,`target`) VALUES (NULL , '$activado' , '$contenido' , '$enlace' , '$target' )");

                header('Location: ../gestor.php?mensaje=ok'); 


            break;
        
        case 'eliminar':
            
            $id = $_GET['id'];

            Gestor::sql("DELETE FROM `cabecera` WHERE `id` = '$id' ");

            header('Location: ../gestor.php?mensaje=ok');

            break;

        case 'actualizar':

                $id=$_POST['id'];
            
                if( $_POST['activado'] == 'on' ){ $activado = 1; }else{ $activado = 0; }
        
        
                $contenido = $_POST['contenido'];
                
                
                $enlace = $_POST['enlace'];

                
                if( $_POST['target'] == 'on' ){ $target = 1; }else{ $target = 0; }
                
                
                Gestor::sql("UPDATE `cabecera` SET `activado`='$activado',`contenido`='$contenido',`enlace`='$enlace',`target`='$target' WHERE `id`=$id");

                header('Location: ../gestor.php?mensaje=ok');



            break;
    }
    
    
















   /*  if ( $accion == 'insertar' ){ */

        // ESTO ES INSERTAR
    

        /* if( $_POST['activado'] == 'on' ){ $activado = 1; }else{ $activado = 0; }
        
        
        $contenido = $_POST['contenido'];
        
        
        $enlace = $_POST['enlace'];

        
        if( $_POST['target'] == 'on' ){ $target = 1; }else{ $target = 0; }
        
        
        Gestor::sql("INSERT INTO `cabecera`(`id`,`activado`,`contenido`,`enlace`,`target`) VALUES (NULL , '$activado' , '$contenido' , '$enlace' , '$target' )");
 */


    /* }else{ */

        // ESTO ES ELIMINAR



        /* $id = $_GET['id'];

        Gestor::sql("DELETE FROM `cabecera` WHERE `id` = '$id' "); */



   /*  } */
    
    
    /* header('Location: ../gestor.php?mensaje=ok');  */


    // aqui se haria un switch con tres casos: Insertar,Eliminar y Actualizar. EN FUNCION DE Q PETICION GET ME LLEGUE ($_GET['accion']).accion=insertar , accion=eliminar o accion=actualizar

?>