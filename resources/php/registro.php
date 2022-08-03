<?php

    if (isset($_POST['action'])) {
        $action = $_POST['action'];
    } else if(isset($_GET['action'])){
        $action = $_GET['action'];
    } else {
        echo("Error innesperado, falta accion get o post");
    }

    include 'conexion.php';

    switch($action){
        case 'create':
            accionCrear($conexion);
            break;
        default:
            echo("Error, por favor defina una accion. (create)");
            break;
    }

    function accionCrear($conexion) {
        $respuesta = array();
        $nombre    = $_GET['nombre'];
        $apPaterno = $_GET['apPaterno'];
        $apMaterno = $_GET['apMaterno'];
        $boleta    = $_GET['boleta'];
        $pass      = $_GET['pass'];
        $email     = $_GET['email'];
        
        $nc = $nombre . " " . $apPaterno . " " . $apMaterno;

        $Query = " SELECT * FROM usuarios WHERE access = $boleta ; ";
        $resultado = mysqli_query($conexion, $Query);
        $numero = mysqli_num_rows($resultado);
        
        if($numero >= 1){
            $respuesta['estado']  = 2;
            $respuesta['mensaje'] = "Ya existe un usuario registado con esa boleta";
            $respuesta['id']      = -1;
            echo json_encode($respuesta);
        } else {
            $Query2 = " INSERT INTO usuarios (id, access, name, password, type) VALUES (NULL, '" . $boleta . "', '" . $nc . "', '" . $pass . "', 'alumno'); ";
            $resultado = mysqli_query($conexion, $Query2);

            if($resultado >= 1){
                $respuesta['estado']  = 1;
                $respuesta['mensaje'] = "El registro se creo con exito.";
                $respuesta['id']      = mysqli_insert_id($conexion);
                echo json_encode($respuesta);
            } else {
                $respuesta['estado']  = 0;
                $respuesta['mensaje'] = "A ocurrido un error al crear el registro";
                $respuesta['id']      = -1;
                echo json_encode($respuesta);
            }
        }
        mysqli_close($conexion);
    }
?>