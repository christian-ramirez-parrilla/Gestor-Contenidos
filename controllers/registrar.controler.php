<?php

    
    require '../models/conexion.models.php';
    require '../models/pagina.models.php';

   
    

    $accion = $_GET['accion'];

    

    
    switch ($accion) {
        case 'insertar':

            $email = $_POST['email'];

            $emailHash=Seguridad::encriptar($email);

            $contrasenia = $_POST['contrasenia'];

            $token = md5($emailHash.$contrasenia);
            
            $buscar = Conexion::select("SELECT * FROM `registros` WHERE `token`='$token' AND `email`='$emailHash'");

        

            if( gettype($buscar) !== "string"){ 

                echo 'Ya existe este email'; 

                echo '<br>'; 
                echo '<br>'; 
                echo '<br>'; 
                echo '<br>'; 

               ?>
                
                    <a href="../index.php">Volver a la Home</a>
               
               <?php


            }else{ 

                Gestor::sql("INSERT INTO `registros` (`id`,`activado`,`token`,`email`) VALUES (NULL,0,'$token','$emailHash')");

                $emailD = Seguridad::desencriptar("$emailHash");

                

                $contacto = new Correo(
                    $emailD,
                    'es una prueba',
                    '',
                    'Christian',
                    ''
                );
              
               echo $contacto->texto;    
                
               

                


              }  
            break;
        
        
        
        
        case 'actualizar':
        
            $email = $_GET['caca'];

            $emailhash = Seguridad::encriptar($email);


            Gestor::sql("UPDATE `registros` SET `activado`=1  WHERE `email`='$emailhash'");

            echo 'Te has registrado correctamente';

            echo '<br>'; 
            echo '<br>'; 
            echo '<br>'; 
            echo '<br>'; 
            

            ?>
                
                <a href="../index.php">Volver a la Home</a>
               
            <?php

            break;
    } 

    
?>


