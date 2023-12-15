<?php

    include "../../config.php";

    
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
echo $peticion;
   
    mysqli_query($conexion,$peticion);

   


?>