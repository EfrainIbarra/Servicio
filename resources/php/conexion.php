<?php
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $base = "servicio_pb";

    $conexion = mysqli_connect($servidor,$usuario,$clave,$base);
    mysqli_set_charset($conexion,"utf8");
?>