<?php

    
    require '../models/conexion.models.php';
    require '../models/pagina.models.php';

    $accion=$_GET['accion'];

    switch ($accion) {
        case 'insertar':
            
            if( $_POST['activado'] == 'on' ){ $activado = 1; }else{ $activado = 0; }
    
    
            $contenido = $_POST['contenido'];
            
            
            $enlace = $_POST['enlace'];

            if( $_POST['target'] == 'on' ){ $target = 1; }else{ $target = 0; }
            
        
            Gestor::sql("INSERT INTO `footer`(`id`,`activado`,`contenido`,`enlace`,`target`) VALUES (NULL , '$activado' , '$contenido' , '$enlace' , '$target')");

            header('Location: ../index.php');

            break;
        
        case 'eliminar':
           
            $id = $_GET['id'];

            Gestor::sql("DELETE FROM `footer` WHERE `id` = '$id' ");

            header('Location: ../gestor.php');

            break;


        case 'actualizar':
            
            $id=$_POST['id'];

            if( $_POST['activado'] == 'on' ){ $activado = 1; }else{ $activado = 0; }
    
    
            $contenido = $_POST['contenido'];
            
            
            $enlace = $_POST['enlace'];

            if( $_POST['target'] == 'on' ){ $target = 1; }else{ $target = 0; }

            Gestor::sql("UPDATE `footer` SET `activado`='$activado',`contenido`='$contenido',`enlace`='$enlace',`target`='$target' WHERE `id`=$id");

            header('Location: ../gestor.php'); 

        break;
    }

    
    
    
    
    
    
?>