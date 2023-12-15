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
        if(sha1($fila['nombreusuario']) == $_GET['miusuario']){
            $idmiusuario = $fila['Identificador'];
        }
    }
    ///////////////////////////
    $peticion = "
    SELECT * FROM usuarios WHERE nombreusuario = '".$_GET['tuusuario']."'
    "; 

    $resultado = mysqli_query($conexion,$peticion);

    while($fila = mysqli_fetch_assoc($resultado)){
            $idtuusuario = $fila['Identificador'];
    }
    
    $peticion = "
    INSERT INTO enlaces
    VALUES 
    (NULL,
    NOW(),
    '".$idmiusuario."',
    '".$idtuusuario."')
    
    ";
   
    mysqli_query($conexion,$peticion);

   


?>