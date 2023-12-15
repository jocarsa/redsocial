<?php

    $servidor = "localhost";
    $usuario = "redsocial";
    $contrasena = "redsocial";
    $basededatos = "redsocial";

    $conexion = mysqli_connect(
        $servidor,
        $usuario,
        $contrasena,
        $basededatos
    );
    mysqli_set_charset($conexion, "utf8mb4");
    $peticion = "
    INSERT INTO usuarios
    VALUES 
    (NULL,
    '".$_GET['usuario']."',
    '".$_GET['contrasena']."',
    '".$_GET['nombrepropio']."',
    '".$_GET['apellidos']."',
    '".$_GET['email']."',
    '')
    
    ";
   

    mysqli_query($conexion,$peticion);


?>