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
    <title>AniDB | Inicio</title>

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
                                    <a href="./acta-titulacion.php" class="nav-link">
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
                            <h1>Constancia</h1>
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

                                <!-- /.card-header -->
                                <div class="card-body" style="text-align: center;">
                                    <h2>Ingresa al siguiente link para obtener tu contancia:</h2>
                                    <h4>Link: Sin constancia aun, vuelva mas tarde</h4>
                                    <h4>Link: <a href=" https://www.youtube.com/watch?v=BkrICLDQ3T4">Click aqui</a></h4>
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
                "autoWidth": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

</body>

</html>