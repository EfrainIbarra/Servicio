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
    <title>Acta-Titulacion</title>

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
        <aside class="main-sidebar sidebar-dark-danger elevation-4">
            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-5">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="./home.php" class="nav-link">
                                <p>Departamento de evaluacion y seguimiento academico</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="./constancias.php" class="nav-link">
                                <p>Constancias</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./constacias-adm.php" class="nav-link">
                                <p>Constancias adm</p>
                            </a>
                        </li>
                        <li class="nav-item menu-is-opening menu-open">
                            <a href="#" class="nav-link active">
                                <p>
                                    Departamaneto de evaluacion y seguimiento academico
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: block;">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                        <p>Acta de examen de titulacion</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./oficio-designacion.php" class="nav-link">
                                        <p>Oficio de designacion</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./constancia-designacion.php" class="nav-link">
                                        <p>Constancia de designacion</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
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
                                    <table id="example1" class="table table-bordered table-striped" style="text-align: center; ">
                                        <thead>
                                            <tr>
                                                <th>Numero de acta</th>
                                                <th>Alumno</th>
                                                <th>Profesores</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>

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
                                <h4 class="modal-title">Acta de dexamen de titulacion</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

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

                            </div>
                            <div class="modal-footer justify-content-right">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-primary" onclick="actionCreate()">Confirmar</button>
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
                                <div class="form-group row">
                                    <label style="text-align: right;" for="nActa" class="col-sm-4 col-form-label">Numero de acta</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="nActa-act">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label style="text-align: right;" for="alumno" class="col-sm-4 col-form-label">Nombre del alumno</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="alumno-act">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label style="text-align: right;" for="profesores" class="col-sm-4 col-form-label">Profesores</label>
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
                                </div>

                                <div class="form-group row">
                                    <label style="text-align: right;" for="doc" class="col-sm-4 col-form-label">Documento</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="doc-act" id="doc-act">
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer justify-content-right">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-primary" onclick="actionUpdate()">Confirmar</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- / .modal -->

                <div class="modal fade" id="modal-cons">
                    <div class="modal-dialog modal-dialog-centered modal-validar">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!--<img src="../assets/images/Bg.jpg" style="width: 100%;">-->
                                        <embed src="./assets/files/1RES_EIB.pdf#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px">
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

        $(document).ready(function() {
            actionRead();
        });
    </script>

</body>

</html>