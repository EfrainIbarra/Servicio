<?php
require "./resources/php/conexion.php";

session_start();

if (isset($_SESSION['nombre'])) {
    header("Location: ./home.php");
}

if ($_POST) {
    $user = $_POST["user_access"];
    $pass = $_POST["user_pass"];
    $type = $_POST["user-type"];

    $Query = " SELECT * FROM usuarios WHERE access = '" . $user . "' AND type = '" . $type . "'; ";
    $resultado = mysqli_query($conexion, $Query);
    
    $num = mysqli_num_rows($resultado);
    
    if ($num == 1) {
        $row = $resultado->fetch_assoc();
        $pass_db = $row['password'];
        $pass_c = $pass;

        if ($pass_db == $pass_c) {
            $_SESSION['nombre'] = $row['name'];

            header("Location: ./home.php");
        } else {
            echo " <div class='card card-header color-bg4'>Contraseña incorrecta</div> ";
        }
    } else {
        echo " <div class='card card-header color-bg4'>El usuario no existe</div> ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ingresar</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./resources/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="./resources/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./resources/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="./resources/style.css">
</head>

<body class="hold-transition login-page color-bg">

    <!-- Contenedor de la tarjeta de login -->
    <div class="login-box">

        <!-- Tarjeta de login -->
        <div class="card color-bg2">

            <!-- Encabezado de la targeta de login -->
            <div class="card-header text-center">
                <h1>Ingresar</h1>
            </div>
            <!-- Contenido de la tarjeta de login -->
            <div class="card-body">

                <!-- Selector de ingreso -->
                <div class="card card-secondary card-tabs">
                    <div class="card-header p-0 border-bottom-0 color-bg">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="login-alumno-tab" data-toggle="pill" href="#login-alumno" role="tab" aria-controls="login-alumno" aria-selected="true">Alumno</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="login-docente-tab" data-toggle="pill" href="#login-docente" role="tab" aria-controls="login-docente" aria-selected="false">Docente</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- Fin de selector de ingreso -->

                <!-- Contenido de la targeta de seleccion -->
                <div class="card-body">

                    <!-- Display de opciones -->
                    <div class="tab-content" id="custom-tabs-four-tabContent">

                        <!-- Opcion de ingreso para alumno -->
                        <div class="tab-pane fade show active" id="login-alumno" role="tabpanel" aria-labelledby="login-alumno-tab">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control color-bg5" placeholder="Boleta" name="user_access" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text color-bg5">
                                            <span class="fa fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3 color-bg5">
                                    <input type="password" class="form-control color-bg5" placeholder="Contraseña" name="user_pass" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text color-bg5">
                                            <span class="fas fa-key"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-8"></div>
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-danger btn-block" value="alumno" name="user-type" >Ingresa</button>
                                    </div>
                                </div>
                            </form>
                            <p class="mb-4"></p>
                            <p class=" mb-1">
                                <a href="./register.html" class="text-center text-warning">¿No tienes una cuenta? registrate <b>aqui</b>.</a>
                            </p>
                        </div>

                        <!-- Opcion de ingreso para docente -->
                        <div class="tab-pane fade" id="login-docente" role="tabpanel" aria-labelledby="login-docente-tab">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control color-bg5" placeholder="Numero de empleado" name="user_access" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text color-bg5">
                                            <span class="fa fa-user-plus"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control color-bg5" placeholder="Contraseña" name="user_pass" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text color-bg5">
                                            <span class="fas fa-key"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-8"></div>
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-danger btn-block" value="docente" name="user-type" >Ingresa</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="./resources/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="./resources/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./resources/dist/js/adminlte.min.js"></script>

</body>

</html>
