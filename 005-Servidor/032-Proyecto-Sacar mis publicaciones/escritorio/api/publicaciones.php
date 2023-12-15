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

    ///////////////////////////
    $peticion = "
    SELECT * FROM usuarios 
    ";

    $resultado = mysqli_query($conexion,$peticion);

    while($fila = mysqli_fetch_assoc($resultado)){
        if(sha1($fila['nombreusuario']) == $_GET['usuario']){
            $idmiusuario = $fila['Identificador'];
        }
    }
    $peticion = "
    SELECT 
    publicaciones.texto,
    publicaciones.fecha,
    publicaciones.imagen,
    usuarios.nombreusuario AS usuario
    FROM publicaciones
    LEFT JOIN usuarios
    ON publicaciones.usuarios_usuario = usuarios.Identificador
    WHERE publicaciones.usuarios_usuario = ".$idmiusuario."
    ORDER BY fecha,publicaciones.Identificador DESC
    ";
   
    $resultado = mysqli_query($conexion,$peticion);
    $entradas = [];
    while($fila = mysqli_fetch_assoc($resultado)){
        $entradas[] = $fila;
    }
    $entradas = json_encode($entradas,JSON_PRETTY_PRINT);
    echo $entradas;
?>