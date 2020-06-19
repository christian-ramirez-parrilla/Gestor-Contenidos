<?php
	# Incluir los datos de conexión
    require 'models/conexion.models.php';
    
    # Incluir los datos de los models
    require 'models/pagina.models.php';

	Cookies::borrar('id_act');
	
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
</head>
<body>
        
   <?php
        # Incluyendo la cabecera
        include 'views/layout/cabecera.php';

        # Incluyendo la cabecera
        include 'views/layout/contenido.php';

        # Incluyendo la cabecera
        include 'views/layout/footer.php';
    ?>

</body>
</html>
