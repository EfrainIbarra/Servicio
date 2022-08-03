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
        case 'read':
            accionLeer($conexion);
            break;
        case 'delete':
            accionEliminar($conexion);
            break;
        default:
            echo("Error, por favor defina una accion.");
            break;
    }

    function accionLeer($conexion){
        $respuesta = array();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $Query = " SELECT * FROM `oficio-designacion` WHERE id = ".$id."; ";
            $resultado = mysqli_query($conexion,$Query);
            $numero = mysqli_num_rows($resultado);

            if($numero >= 1){
                $row = mysqli_fetch_array($resultado);

                $respuesta["id"]         = $row["id"];
                $respuesta["alumno"]     = $row["alumno"];
                $respuesta["profesores"] = $row["profesores"];
                $respuesta["name"]       = $row["name"];
                $respuesta["fname"]      = $row["fname"]; 

                $respuesta["estado"] = 1;
                $respuesta["mensaje"] = "Existe registro";
            }else{
                $respuesta["estado"] = 0;
                $respuesta["mensaje"] = "Ocurrio un error inesperado";
            }
        }else{
            $Query = " SELECT * FROM `oficio-designacion` ";
            $resultado = mysqli_query($conexion,$Query);
            
            $numero = mysqli_num_rows($resultado);

            //registros regresados
            if($numero >= 1){
                $respuesta["estado"]         = 1;
                $respuesta["mensaje"]        = "Registros encontrados";
                $respuesta["actas"] = array();

                while($row = mysqli_fetch_array($resultado)){
                    $rowActa = array();
                    $rowActa["id"]         = $row["id"];
                    $rowActa["alumno"]     = $row["alumno"];
                    $rowActa["profesores"] = $row["profesores"];
                    
                
                    array_push($respuesta["actas"],$rowActa);
                }
            }else{
                $respuesta["estado"]         = 0;
                $respuesta["mensaje"]        = "Registros no encontrados";
            }
        }
        echo json_encode($respuesta);
        mysqli_close($conexion);
    }

    function accionEliminar($conexion){
        $respuesta = array();
        $id = $_POST['id'];

        $Query = " SELECT * FROM `oficio-designacion` WHERE id = $id ";
        $resultado = mysqli_query($conexion,$Query);
        $numero = mysqli_num_rows($resultado);

        if($numero >= 1){
            $row = mysqli_fetch_array($resultado);

            if(unlink('./../../oficios-designacion/'.$row["fname"])) {
                $Query = " DELETE FROM `oficio-designacion` WHERE id = $id ";
                mysqli_query($conexion,$Query);

                $registrosEliminados = mysqli_affected_rows($conexion);

                if($registrosEliminados >=1){
                    $respuesta['estado']  = 1;
                    $respuesta['mensaje'] = "El registro se elimino con exito";
                }else{
                    $respuesta['estado']  = 0;
                    $respuesta['mensaje'] = mysqli_error($conexion);
                }
            } else {
                $respuesta['estado']  = 0;
                $respuesta['mensaje'] = "Error eliminando archivo. ";
            }
        }
        echo json_encode($respuesta);
        mysqli_close($conexion);
    }
?>