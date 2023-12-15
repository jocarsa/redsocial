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
    INSERT INTO publicaciones
    VALUES 
    (NULL,
    '".date('Y')."-".date('m')."-".date('d')."',
    '1',
    '',
    '".$_GET['contenido']."')
    
    ";
   
    mysqli_query($conexion,$peticion);


?>