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
    SELECT * FROM usuarios 
    ";

    $resultado = mysqli_query($conexion,$peticion);

    while($fila = mysqli_fetch_assoc($resultado)){
        if(sha1($fila['nombreusuario']) == $_GET['usuario']){
            $idususuario = $fila['Identificador'];
        }
    }
    $imagen = $_FILES['imagen'];
    $peticion = "
    INSERT INTO publicaciones
    VALUES 
    (NULL,
    '".date('Y')."-".date('m')."-".date('d')."',
    '".$idususuario."',
    'img/".basename($imagen['name'])."',
    '".$_GET['contenido']."')
    
    ";
   
    mysqli_query($conexion,$peticion);


?>