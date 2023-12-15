<?php

     include "../../config.php";

    
    $peticion = "
    SELECT 
    foto AS imagen,
    nombreusuario AS nombre,
    '' AS contactos
    FROM
    usuarios
    WHERE
    usuarios.nombreusuario LIKE '%".$_GET['busca']."%'
    ";
   
    $resultado = mysqli_query($conexion,$peticion);
    $entradas = [];
    while($fila = mysqli_fetch_assoc($resultado)){
        $entradas[] = $fila;
    }
    $entradas = json_encode($entradas,JSON_PRETTY_PRINT);
    echo $entradas;
?>