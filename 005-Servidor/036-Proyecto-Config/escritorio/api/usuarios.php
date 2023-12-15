<?php

     include "../../config.php";

   
    $peticion = "
    SELECT 
    foto AS imagen,
    nombreusuario AS nombre
    FROM usuarios 
    ";
   
    $resultado = mysqli_query($conexion,$peticion);
    $usuarios = [];
    while($fila = mysqli_fetch_assoc($resultado)){
        $usuarios[] = $fila;
    }
    $usuarios = json_encode($usuarios,JSON_PRETTY_PRINT);
    echo $usuarios;
?>