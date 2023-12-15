<?php
    
    function arrayToTuple($array) {
        $array = array_map(function($item) {
            if (is_string($item)) {
                return "'" . addslashes($item) . "'";
            }
            return $item;
        }, $array);
        return "(" . implode(", ", $array) . ")";
    }

     include "../../config.php";

    

    /////////////////////////// Este soy yo
    $peticion = "
    SELECT * FROM usuarios 
    ";

    $resultado = mysqli_query($conexion,$peticion);

    while($fila = mysqli_fetch_assoc($resultado)){
        if(sha1($fila['nombreusuario']) == $_GET['usuario']){
            $idmiusuario = $fila['Identificador'];
        }
    }

    /////////////////////////// Lista de enlaces
    $peticion = "
    SELECT * FROM enlaces
    WHERE usuarios_usuario = ".$idmiusuario."
    ";

    $resultado = mysqli_query($conexion,$peticion);
    $enlaces = [''];
    while($fila = mysqli_fetch_assoc($resultado)){
        $enlaces[] = $fila['usuarios_usuario2'];
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
    WHERE 
    publicaciones.usuarios_usuario = ".$idmiusuario."
    OR
    publicaciones.usuarios_usuario IN ".arrayToTuple($enlaces)."
    ORDER BY fecha,publicaciones.Identificador DESC
    ";

    //echo $peticion;
   
    $resultado = mysqli_query($conexion,$peticion);
    $entradas = [];
    while($fila = mysqli_fetch_assoc($resultado)){
        $entradas[] = $fila;
    }
    $entradas = json_encode($entradas,JSON_PRETTY_PRINT);
    echo $entradas;
?>