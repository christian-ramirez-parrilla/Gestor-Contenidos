
<?php

    require '../models/conexion.models.php';
    
    require '../models/pagina.models.php';

    $accion = $_GET['accion'];

    switch ($accion) {
        case 'entrar':

            echo 1;
            
            $email = $_POST['email'];

            $emailHash = Seguridad::encriptar($email);

            $contrasenia = $_POST['contrasenia'];

            $token = md5($emailHash.$contrasenia);

            echo 2;

            $buscar = Conexion::select("SELECT * FROM `registros` WHERE `token`='$token' AND `email`='$emailHash'");
           
            if( gettype($buscar) !== 'string'){

                echo 4;
                echo 'hola';

                Cookies::crear('id',$buscar->id);

                header("Location: ../gestor.php");


            }else{


               header("Location: ../gestor.php?mensaje=error"); 


               echo 'no existe';


            } 





            break;
        
        case 'cerrar':
            
            Cookies::borrar('id');

            header('Location: ../gestor.php');


            break;
    }






?>    
    
