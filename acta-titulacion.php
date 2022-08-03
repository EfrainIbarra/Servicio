<?php
session_start();

if (!isset($_SESSION['nombre'])) {
    header("Location: ./index.php");
}
$nombre = $_SESSION['nombre'];
?>

<?php
$conn = new PDO('mysql:host=localhost; dbname=servicio_pb', 'root', '');
if (isset($_POST['submit']) != "") {
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $type = $_FILES['file']['type'];
    $temp = $_FILES['file']['tmp_name'];
    $alumno = $_POST['alumno'];
    $acta = $_POST['acta'];
    $profesores = $_POST['profesores'];

    $fname = date("YmdHis") . '_' . $name;
    $chk = $conn->query("SELECT * FROM  `acta-titulacion` where name = '$name' ")->rowCount();
    if ($chk) {
        $i = 1;
        $c = 0;
        while ($c == 0) {
            $i++;
            $reversedParts = explode('.', strrev($name), 2);
            $tname = (strrev($reversedParts[1])) . "_" . ($i) . '.' . (strrev($reversedParts[0]));

            $chk2 = $conn->query("SELECT * FROM  `acta-titulacion` where name = '$tname' ")->rowCount();
            if ($chk2 == 0) {
                $c = 1;
                $name = $tname;
            }
        }
    }
    $reg = $conn->query("SELECT * FROM `acta-titulacion` WHERE acta = '$acta'")->rowCount();
    if ($reg >= 1) {
        //echo '<script>alert("Ya existe un registro con ese numero de acta.");</script>';
        echo '<script>$(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: `top-end`,
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                icon: `error`,
                title: `Lorem ipsum dolor sit amet, consetetur sadipscing elitr.`
            })

        }
        </script>';
    } else {
        $move =  move_uploaded_file($temp, "upload/" . $fname);
        if ($move) {
            $query = $conn->query("insert into `acta-titulacion`(name,fname,alumno,acta,profesores)values('$name','$fname','$alumno','$acta','$profesores')");
            if ($query) {
                header("location:acta-titulacion.php");
            } else {
                echo "Error";
            }
        }
    }
}

// https://compubinario.com/subir-y-descargar-archivos-en-php-y-mysql/
?>

<?php
$conn = new PDO('mysql:host=localhost; dbname=servicio_pb', 'root', '');
if (isset($_POST['update']) != "") {
    $name = $_FILES['doc-act']['name'];
    $temp = $_FILES['doc-act']['tmp_name'];
    $alumno = $_POST['alumno-act'];
    $acta = $_POST['acta-act'];
    $profesores = $_POST['profesores-act'];
    $id = $_POST['id-act'];
    $fnameOr = $_POST['fname-act'];

    $fname = date("YmdHis") . '_' . $name;

    if ($alumno == "" || $acta == "" || $profesores == "") {
        echo '<script>alert("Error, faltan datos, por favor no deje espacios en blanco.")</script>';
    } else {
        if ($name == "" || $temp == "") {
            $reg = $conn->query("UPDATE `acta-titulacion` SET `acta` = '$acta', `alumno` = '$alumno', `profesores` = '$profesores' WHERE `id` = $id;")->rowCount();
            if ($reg >= 1) {
                echo 'Cambios aplicados.';
            } else {
                echo "No se realizo ningun cambio.";
            }
        } else {
            if (unlink('./upload/' . $fnameOr)) {

                $registrosEliminados = $conn->query("DELETE FROM `acta-titulacion` WHERE id = $id")->rowCount();

                if ($registrosEliminados >= 1) {
                    echo "Piola";
                } else {
                    echo "Hijole.";
                }
            } else {
                echo "HIJOLEEEEEEE";
            }

            $chk = $conn->query("SELECT * FROM  `acta-titulacion` where name = '$name' ")->rowCount();
            if ($chk) {
                $i = 1;
                $c = 0;
                while ($c == 0) {
                    $i++;
                    $reversedParts = explode('.', strrev($name), 2);
                    $tname = (strrev($reversedParts[1])) . "_" . ($i) . '.' . (strrev($reversedParts[0]));

                    $chk2 = $conn->query("SELECT * FROM  `acta-titulacion` where name = '$tname' ")->rowCount();
                    if ($chk2 == 0) {
                        $c = 1;
                        $name = $tname;
                    }
                }
            }
            $reg = $conn->query("SELECT * FROM `acta-titulacion` WHERE acta = '$acta'")->rowCount();
            if ($reg >= 1) {
                echo '<script>alert("Ya existe un registro con ese numero de acta.");</script>';
            } else {
                $move =  move_uploaded_file($temp, "upload/" . $fname);
                if ($move) {
                    $query = $conn->query("insert into `acta-titulacion`(name,fname,alumno,acta,profesores)values('$name','$fname','$alumno','$acta','$profesores')");
                    if ($query) {
                        header("location:acta-titulacion.php");
                    } else {
                        echo "Error";
                    }
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acta-Titulacion</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./resources/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="./resources/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./resources/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="./resources/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="./resources/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="./resources/plugins/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./resources/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="./resources/style2.css">

</head>

<body class="light-mode sidebar-mini layout-fixed layout-navbar">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="dark-mode main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <h5><span id="user_name"><?php echo $nombre; ?></span></h5>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <a href="./resources/php/logout.php" class="dropdown-item">
                    <i class="fa fa-power-off"></i>
                </a>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->


        <aside class="main-sidebar sidebar-no-expand sidebar-dark-danger elevation-4">
            <div class="sidebar">
                <nav class="mt-5">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item menu-is-opening menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-folder-open"></i>
                                <p>
                                    Departamento de evaluacion y seguimiento academico
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                        <i class="far fa-file nav-icon"></i>
                                        <p>Acta de examen de titulacion</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./oficio-designacion.php" class="nav-link">
                                        <i class="far fa-file nav-icon"></i>
                                        <p>Oficio de designacion</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./constancia-designacion.php" class="nav-link">
                                        <i class="far fa-file nav-icon"></i>
                                        <p>Constancia de designacion</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="./constacias-adm.php" class="nav-link">
                                <i class="nav-icon fas fa-upload"></i>
                                <p>
                                    Constancias adm
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./home.php" class="nav-link">
                                <i class="nav-icon far fa-file-pdf"></i>
                                <p>
                                    Departamento de evaluacion y seguimiento academico
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./constancias.php" class="nav-link">
                                <i class="nav-icon fas fa-link"></i>
                                <p>
                                    Constancias
                                </p>
                            </a>
                        </li>
                        
                    </ul>
                </nav>

            </div>

        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Acta de examen de titulacion</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div>
                                    <button type="button" class="btn btn-primary boton-add" data-toggle="modal" data-target="#modal-lg">
                                        Subir Acta
                                    </button>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <table class="table table-striped table-bordered" id="example1" style="text-align: center;">
                                        <thead>
                                            <tr>
                                                <th>Numero de Acta</th>
                                                <th>Alumno</th>
                                                <th>Profesores</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $query = $conn->query("select * from `acta-titulacion` ");
                                        while ($row = $query->fetch()) {
                                            $name = $row['name'];
                                            $alumno = $row['alumno'];
                                            $acta = $row['acta'];

                                            $profesores = "";
                                            $size = strlen($row['profesores']);
                                            for ($i = 0; $i < $size; $i++) {
                                                if ($row['profesores'][$i] == "\n") {
                                                    $profesores = $profesores . ",</br>";
                                                } else {
                                                    $profesores = $profesores . $row['profesores'][$i];
                                                }
                                            }
                                        ?>
                                            <tr>
                                                <td style="vertical-align: middle;"> &nbsp;<?php echo $acta; ?> </td>
                                                <td style="vertical-align: middle;"> &nbsp;<?php echo $alumno; ?> </td>
                                                <td style="vertical-align: middle;"> &nbsp;<?php echo $profesores; ?> </td>
                                                <td style="vertical-align: middle;">
                                                    <a title="Editar elemento." class="btn btn-primary btn-lg" onclick="regActualizar('<?php echo $row['id']; ?>');" href="#" data-toggle="modal" data-target="#modal-actualizar"><i class="fa fa-pen"></i></a>
                                                    <a title="Borrar elemento." class="btn btn-danger btn-lg" onclick="ideEliminar('<?php echo $row['id']; ?>');" href="#" data-toggle="modal" data-target="#modal-delete"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->

                <div class="modal fade" id="modal-lg">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Acta de dexamen de titulacion</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form enctype="multipart/form-data" action="" name="form" method="post">
                                    <div class="form-group row">
                                        <label style="text-align: right;" for="acta" class="col-sm-4 col-form-label">Numero de acta</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="acta" name="acta">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label style="text-align: right;" for="alumno" class="col-sm-4 col-form-label">Nombre del alumno</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="alumno" id="alumno" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label style="text-align: right;" for="profesores" class="col-sm-4 col-form-label">Profesores</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="profesores" id="profesores" rows="5"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label style="text-align: right;" for="doc" class="col-sm-4 col-form-label">Documento</label>
                                        <div class="col-sm-8">
                                            <input type="file" name="file" id="file" />
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-right">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Aceptar" />
                                    </div>
                                </form>
                            </div>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

                <div class="modal fade" id="modal-delete">
                    <div class="modal-dialog modal-dialog-centered modal-sm">
                        <div class="modal-content bg-danger">
                            <div class="modal-header">
                                <h4 class="modal-title">Borrar</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>¿Decea borrar este registro?</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-outline-light" onclick="actionDelete();">Aceptar</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

                <div class="modal fade" id="modal-actualizar">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Acta de dexamen de titulacion</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form enctype="multipart/form-data" action="" name="form2" method="post">
                                    <div class="form-group row">
                                        <label style="text-align: right;" for="acta-act" class="col-sm-4 col-form-label">Numero de acta</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="acta-act" name="acta-act">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label style="text-align: right;" for="alumno-act" class="col-sm-4 col-form-label">Nombre del alumno</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="alumno-act" id="alumno-act">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label style="text-align: right;" for="profesores-act" class="col-sm-4 col-form-label">Profesores</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="profesores-act" id="profesores-act" rows="5"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label style="text-align: right;" for="doc-s" class="col-sm-4 col-form-label">Mostrar archivo</label>
                                        <div class="col-sm-8">
                                            <a class="btn btn-warning btn-sm" href="#" id="doc-s" data-toggle="modal" data-target="#modal-cons" style="width: 170px;">
                                                <i class="fa fa-search-plus"></i>
                                            </a>
                                        </div>
                                        <!-- <button><a id="descarga">Descargar</a></button> -->
                                    </div>

                                    <div class="form-group row">
                                        <label style="text-align: right;" for="doc-act" class="col-sm-4 col-form-label">Documento</label>
                                        <div class="col-sm-8">
                                            <input type="file" name="doc-act" id="doc-act">
                                        </div>
                                    </div>
                                    <input type="text" name="id-act" id="id-act" hidden>
                                    <input type="text" name="fname-act" id="fname-act" hidden>
                                    <div class="modal-footer justify-content-right">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <input type="submit" class="btn btn-primary" name="update" id="update" value="Aceptar" />
                                    </div>
                                </form>
                            </div>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- / .modal -->

                <div class="modal fade" id="modal-cons">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4><b>Numero de acta: </b><span id="acta-doc"> </span></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <embed id="doc" type="application/pdf" width="100%" height="500px">
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer justify-content-between">
                                <button type="button" data-dismiss="modal" class="btn btn-warning">Cerrar</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="./resources/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="./resources/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="./resources/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="./resources/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="./resources/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="./resources/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="./resources/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="./resources/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="./resources/plugins/jszip/jszip.min.js"></script>
    <script src="./resources/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="./resources/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="./resources/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="./resources/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="./resources/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="./resources/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="./resources/plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./resources/dist/js/adminlte.min.js"></script>
    <!-- Page specific script -->

    <script src="./resources/js/acta-titulacion.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [{
                        extend: "copy",
                        text: "Copear"
                    },
                    "csv", "excel", "pdf",
                    {
                        extend: "print",
                        text: "Imprimir",
                        autoPrint: false
                    },
                    {
                        extend: 'colvis',
                        text: "Visibilidad"
                    }
                ],
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    }
                }
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>

    <script>
        function sToast() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                icon: 'error',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })

        }
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            $('.swalDefaultError').click(function() {
                Toast.fire({
                    icon: 'error',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.swalDefaultWarning').click(function() {
                Toast.fire({
                    icon: 'warning',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });

        });
    </script>

</body>

</html>