<?php
session_start();
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] == 0) {
    header('Location:../../../Client/index.php');
}
use Controller\NewCar;

include_once __DIR__ . "/../../../../Model/NewCar.php";
include_once __DIR__ . "/../../../../Controller/NewCar.php";
$carC = new NewCar();
$cars = $carC->getCars();

if (isset($_GET['id'])) {
    $carC->deleteCar($_GET['id']);
    header("Location: Display_NewCar.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>Karhabti TN | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
          rel="stylesheet"/>
    <!-- Font Awesome -->
    <link href="../../plugins/fontawesome-free/css/all.min.css" rel="stylesheet"/>
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet"/>
    <!-- Tempusdominus Bootstrap 4 -->
    <link href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet"/>
    <!-- iCheck -->
    <link href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css" rel="stylesheet"/>
    <!-- JQVMap -->
    <link href="../../plugins/jqvmap/jqvmap.min.css" rel="stylesheet"/>
    <!-- Theme style -->
    <link href="../../dist/css/adminlte.min.css" rel="stylesheet"/>
    <!-- overlayScrollbars -->
    <link href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css" rel="stylesheet"/>
    <!-- Daterange picker -->
    <link href="../../plugins/daterangepicker/daterangepicker.css" rel="stylesheet"/>
    <!-- summernote -->
    <link href="../../plugins/summernote/summernote-bs4.min.css" rel="stylesheet"/>

    <!-- DataTables -->
    <link href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css" rel="stylesheet">
    <link href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <!-- Theme style -->
    <link href="../../dist/css/adminlte.min.css" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Preloader -->
    <div
            class="preloader flex-column justify-content-center align-items-center"
    >
        <img
                alt="AdminLTELogo"
                class="animation__shake"
                height="60"
                src="../../dist/img/AdminLTELogo.png"
                width="60"
        />
    </div>

    <!-- Navbar -->
    <?php
    include_once __DIR__.'/../../Components/navbar.php';
    ?>


    <!-- Main Sidebar Container -->

    <?php
    include_once __DIR__ . "/../../Components/Sidebar.php";
    $navigation = [
        "Dashboard" => [
            'link' => "./../../index.php",
            'status' => ""
        ],
        "New Car" => [
            "link1" => "./../NewCar/Add_NewCar.php",
            "link2" => "./../NewCar/Display_NewCar.php",
            "status" => "menu-open",
            "status1" => "",
            "status2" => "active"
        ],
        "Used Car" => [
            "link1" => "./../UsedCar/Add_UsedCar.php",
            "link2" => "./../UsedCar/Display_UsedCar.php",
            "status" => "",
            "status1" => "",
            "status2" => ""
        ],
        "Products" => [
            "link1" => "./../Product/Add_Product.php",
            "link2" => "./../Product/Display_Product.php",
            "status" => "",
            "status1" => "",
            "status2" => ""
        ],
        "Users" => [
            "link1" => "./../User/Add_User.php",
            "link2" => "./../User/Display_User.php",
            "status" => "",
            "status1" => "",
            "status2" => ""
        ],
        "Commands" => [
            "link1" => "./../Command/Display_Command.php",
            "link2" => "./../Command/Command_Stats.php",
            "status" => "",
            "status1" => "",
            "status2" => "",
        ],
        "Maintenance" => [
            "link1" => "./../Maintenance/Add_Maintenance.php",
            "link2" => "./../Maintenance/Display_Maintenance.php",
            "status" => "" ,
            "status1" => "",
            "status2" => "",
        ]
    ];
    $nav = new Sidebar($navigation);
    $nav->displaySideBar();
    ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Users</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">


                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <h3 class="card-title">New Cars List</h3>
                                <div class="">
                                    <a href="Add_NewCar.php" class="btn btn-outline-success mx-4"><i class="fas fa-plus mx-2"></i>
                                        Add New Car
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped" id="example1">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>category</th>
                                        <th>brand</th>
                                        <th>model</th>
                                        <th>energy</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($cars as $car) {
                                        ?>
                                        <tr>

                                            <td><?= $car['id'] ?></td>
                                            <td><?= $car['category'] ?></td>
                                            <td><?= $car['brand'] ?></td>
                                            <td><?= $car['model'] ?></td>
                                            <td><?= $car['energy'] ?></td>
                                            <td class="d-flex justify-content-around">
                                                <a href="Edit_NewCar.php?id=<?=$car['id']?>">
                                                    <button class="btn btn-outline-info">Edit</button>
                                                </a>
                                                <a href="Display_NewCar.php?id=<?=$car['id']?>">
                                                <button class="btn btn-outline-danger">Delete</button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>id</th>
                                        <th>category</th>
                                        <th>brand</th>
                                        <th>model</th>
                                        <th>energy</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </section>
    </div>
    <footer class="main-footer">
        <strong
        >Copyright &copy; 2014-2021
            <a href="https://adminlte.io">AdminLTE.io</a>.</strong
        >
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
        </div>
    </footer>

    <aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge("uibutton", $.ui.button);
</script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

</body>
</html>
