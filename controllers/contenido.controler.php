<?php

    
    require '../models/conexion.models.php';
    require '../models/pagina.models.php';


    $accion = $_GET['accion'];

    switch ($accion) {
        case 'insertar':
            
            if( $_POST['activado'] == 'on' ){ $activado = 1; }else{ $activado = 0; }
    
    
            $contenido = $_POST['contenido'];
            
            
            $parrafo = $_POST['parrafo'];
            
        
            Gestor::sql("INSERT INTO `contenido` (`id`, `activado`, `titular`, `parrafo`) VALUES (NULL, '$activado', '$contenido', '$parrafo')");

            header('Location: ../index.php?mensaje=ok'); 

            break;
        
        case 'eliminar':
           

            $id = $_GET['id'];

            Gestor::sql("DELETE FROM `contenido` WHERE `id` = '$id'");

            header('Location: ../gestor.php?mensaje=ok'); 

            break;

        case 'actualizar':

            $id=$_POST['id'];
            
            if( $_POST['activado'] == 'on' ){ $activado = 1; }else{ $activado = 0; }
    
    
            $contenido = $_POST['contenido'];
            
            
            $parrafo = $_POST['parrafo'];
            
        
            Gestor::sql("UPDATE `contenido` SET `activado`='$activado',`titular`='$contenido',`parrafo`='$parrafo' WHERE `id`=$id");

            header('Location: ../gestor.php?mensaje=ok'); 

            break;        
    }


   

?>