<?php

    require '../models/conexion.models.php';

    require '../models/pagina.models.php';


    $accion = $_GET['accion'];

    switch ($accion) {
        case 'insertar':

            if($_POST['activado'] == 'on'){

                $activado = 1;

            }else{

                $activado = 0;

            }
            
            $titular  = $_POST['titular'];

            $parrafo  = $_POST['parrafo'];

            $fecha    = $_POST['fecha'].':00';

            echo $activado;
            echo $titular;
            echo $parrafo;
            echo $fecha;

            Gestor::sql("INSERT INTO `BLOG` (`id`,`activado`,`Titular`,`Parrafo`,`Fecha`) VALUES (NULL,'$activado','$titular','$parrafo','$fecha')");

            
            header('Location: ../gestor.php?mensaje=ok');


            break;
    
        case 'eliminar':
            
            $id = $_GET['id'];

            GESTOR::sql("DELETE FROM `BLOG` WHERE `id`='$id'");

            header('Location: ../gestor.php?mensaje=ok');


            break;

        case 'actualizar':

            $id = $_POST['id'];
            
            if( $_POST['activado'] == 'on' ){

                $activado=1;

            }else{

                $activado=0;

            }

            $titular = $_POST['titular'];

            $parrafo = $_POST['parrafo'];

            $fecha   = $_POST['fecha'];

            Gestor::sql("UPDATE `BLOG` SET `activado`='$activado',`Titular`='$titular',`Parrafo`='$parrafo',`Fecha`='$fecha' WHERE `id`='$id'");

            header('Location:  ../gestor.php?mensaje=ok');


            break;
    }

?>


