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
    FROM usuarios
    WHERE 
    nombreusuario = '".$_GET['usuario']."'
    AND
    contraseña = '".$_GET['contrasena']."'
    ";
   

    $resultado = mysqli_query($conexion,$peticion);

    if($fila = mysqli_fetch_assoc($resultado)){
        echo '{"acceso":true,"usuario":"'.sha1($fila['nombreusuario']).'"}';
    }else{
        echo '{"acceso":false}';
    }

?>