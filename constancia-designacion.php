<?php
session_start();

if (!isset($_SESSION['nombre'])) {
    header("Location: ./index.php");
}
$nombre = $_SESSION['nombre'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Constancia-Designacion</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./resources/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="./resources/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./resources/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="./resources/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./resources/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="./resources/style2.css">

</head>

<body class="light-mode sidebar-mini layout-fixed layout-navbar">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="dark-mode main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
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
                                    <a href="./acta-titulacion.php" class="nav-link">
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
                                    <a href="#" class="nav-link active">
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
                            <h1>Constancia de designacion</h1>
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
                                        Subir Constancia
                                    </button>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped" style="text-align: center;">
                                        <thead>
                                            <tr>
                                                <th>Profesor</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Profesor 1</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" onclick="regActualizar(' + acta.id + ');" href="#" data-toggle="modal" data-target="#modal-actualizar">
                                                        <i class="fa fa-pen"></i>
                                                        Editar
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" onclick="ideEliminar(' + acta.id + ');" href="#" data-toggle="modal" data-target="#modal-delete">
                                                        <i class="fa fa-trash"></i>
                                                        Borrar
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Profesor 2</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" onclick="regActualizar(' + acta.id + ');" href="#" data-toggle="modal" data-target="#modal-actualizar">
                                                        <i class="fa fa-pen"></i>
                                                        Editar
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" onclick="ideEliminar(' + acta.id + ');" href="#" data-toggle="modal" data-target="#modal-delete">
                                                        <i class="fa fa-trash"></i>
                                                        Borrar
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Profesor 3</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" onclick="regActualizar(' + acta.id + ');" href="#" data-toggle="modal" data-target="#modal-actualizar">
                                                        <i class="fa fa-pen"></i>
                                                        Editar
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" onclick="ideEliminar(' + acta.id + ');" href="#" data-toggle="modal" data-target="#modal-delete">
                                                        <i class="fa fa-trash"></i>
                                                        Borrar
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Profesor 4</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" onclick="regActualizar(' + acta.id + ');" href="#" data-toggle="modal" data-target="#modal-actualizar">
                                                        <i class="fa fa-pen"></i>
                                                        Editar
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" onclick="ideEliminar(' + acta.id + ');" href="#" data-toggle="modal" data-target="#modal-delete">
                                                        <i class="fa fa-trash"></i>
                                                        Borrar
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Profesor 5</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" onclick="regActualizar(' + acta.id + ');" href="#" data-toggle="modal" data-target="#modal-actualizar">
                                                        <i class="fa fa-pen"></i>
                                                        Editar
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" onclick="ideEliminar(' + acta.id + ');" href="#" data-toggle="modal" data-target="#modal-delete">
                                                        <i class="fa fa-trash"></i>
                                                        Borrar
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
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
                                <h4 class="modal-title">Constancia de designacion</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group row">
                                    <label style="text-align: right;" for="profesor" class="col-sm-4 col-form-label">Nombre del profesor</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="profesor">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label style="text-align: right;" for="doc" class="col-sm-4 col-form-label">Documento</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="doc" id="doc">
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer justify-content-right">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-primary">Confirmar</button>
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
    <!-- AdminLTE App -->
    <script src="./resources/dist/js/adminlte.min.js"></script>
    <!-- Page specific script -->
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

</body>

</html>