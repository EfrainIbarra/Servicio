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
        case 'read':
            accionLeer($conexion);
            break;
        case 'delete':
            accionEliminar($conexion);
            break;
        case 'update':
            accionActualizar($conexion);
            break;
        default:
            echo("Error, por favor defina una accion.");
            break;
    }

    function accionCrear($conexion) {
        if (!isset($_GET['acta']) || !isset($_GET['alumno']) || !isset($_GET['profesores']) || !isset($_GET['doc'])) {
            $respuesta['estado']  = 3;
            $respuesta['mensaje'] = "No hay datos a guardar.";
            $respuesta['id']      = -1;
            echo json_encode($respuesta);
            return;
        }

        $respuesta = array();
        $acta    = $_GET['acta'];
        $alumno = $_GET['alumno'];
        $profesores = $_GET['profesores'];
        $doc    = $_GET['doc'];

        $Query = " SELECT * FROM `acta-titulacion` WHERE `acta` = '" . $acta . "' ; ";
        $resultado = mysqli_query($conexion, $Query);
        $numero = mysqli_num_rows($resultado);
        
        if($numero >= 1){
            $respuesta['estado']  = 2;
            $respuesta['mensaje'] = "Ya existe un registro con esa acta.";
            $respuesta['id']      = -1;
            echo json_encode($respuesta);
        } else {
            $Query2 = " INSERT INTO `acta-titulacion` (`id`, `acta`, `alumno`, `profesores`, `doc`) VALUES (NULL, '" . $acta . "' , '" . $alumno . "' , '" . $profesores . "' ,  '" . $doc . "' ); ";
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

    function accionLeer($conexion){
        $respuesta = array();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $Query = " SELECT * FROM `acta-titulacion` WHERE id = ".$id."; ";
            $resultado = mysqli_query($conexion,$Query);
            $numero = mysqli_num_rows($resultado);

            if($numero >= 1){
                $row = mysqli_fetch_array($resultado);

                $respuesta["id"]         = $row["id"];
                $respuesta["acta"]       = $row["acta"];
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
            $Query = " SELECT * FROM `acta-titulacion` ";
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
                    $rowActa["acta"]       = $row["acta"];
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

        $Query = " SELECT * FROM `acta-titulacion` WHERE id = $id ";
        $resultado = mysqli_query($conexion,$Query);
        $numero = mysqli_num_rows($resultado);

        if($numero >= 1){
            $row = mysqli_fetch_array($resultado);

            if(unlink('./../../upload/'.$row["fname"])) {
                $Query = " DELETE FROM `acta-titulacion` WHERE id = $id ";
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
    
    function accionActualizar($conexion){
        $respuesta = array();
        $id         = $_POST['id'];
        $acta       = $_POST['acta'];
        $alumno     = $_POST['alumno'];
        $profesores = $_POST['profesores'];
        //$doc        = $_POST['doc'];

        $Query = " UPDATE `acta-titulacion` SET `acta` = '$acta', `alumno` = '$alumno', `profesores` = '$profesores' WHERE `acta-titulacion`.`id` = $id; ";

        $resultado = mysqli_query($conexion,$Query);
        $numero = mysqli_affected_rows($conexion);

        if($numero >= 1){
            $respuesta["estado"] = 1;
            $respuesta["mensaje"] = "El registro se actualizo correctamente";
        }else{
            $respuesta["estado"] = 0;
            $respuesta["mensaje"] = mysqli_error($conexion);
        }
        echo json_encode($respuesta);
        mysqli_close($conexion);
    }
?>