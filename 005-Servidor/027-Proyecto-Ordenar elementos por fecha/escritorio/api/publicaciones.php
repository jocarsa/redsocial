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
    SELECT * 
    FROM publicaciones
    ORDER BY fecha,Identificador DESC
    ";
   
    $resultado = mysqli_query($conexion,$peticion);
    $entradas = [];
    while($fila = mysqli_fetch_assoc($resultado)){
        $entradas[] = $fila;
    }
    $entradas = json_encode($entradas,JSON_PRETTY_PRINT);
    echo $entradas;
?>