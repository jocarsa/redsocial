<?php

     include "../../config.php";

    

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
    NOW(),
    '".$idususuario."',
    'img/".basename($imagen['name'])."',
    '".$_GET['contenido']."')
    
    ";
   
    mysqli_query($conexion,$peticion);

    move_uploaded_file($imagen['tmp_name'], "../../escritorio/img/".basename($imagen['name']));


?>