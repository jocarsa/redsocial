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
    
    $imagen = $_FILES['imagen'];

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
    'img/".basename($imagen['name'])."')
    
    ";
   

    mysqli_query($conexion,$peticion);

     move_uploaded_file($imagen['tmp_name'], "../../escritorio/img/".basename($imagen['name']));
?>