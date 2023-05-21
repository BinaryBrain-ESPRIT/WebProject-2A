<?php
session_start();
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] == 0) {
    header('Location:../Client/index.php');
}

require_once __DIR__ . '/../../Controller/Command.php';
require_once __DIR__ . '/../../Controller/UsedCar.php';
require_once __DIR__ . '/../../Controller/NewCar.php';
require_once __DIR__ . '/../../Controller/Product.php';
require_once __DIR__ . '/../../Controller/User.php';

$commandC = new Controller\Command();
$UserC = new Controller\User();
$productC = new Controller\Product();
$usedCarC = new Controller\UsedCar();
$newCarC = new Controller\NewCar();


$nbCommands = count($commandC->getCommands());
$nbUsers = count($UserC->listUser());
$nbProducts = count($productC->getProducts());
$nbUsedCars = count($usedCarC->getCars());
$nbNewCars = count($newCarC->getCars());

$usedCars = $usedCarC->getCars();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Karhabti TN | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
        rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="plugins/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" />
    <!-- Tempusdominus Bootstrap 4 -->
    <link href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <!-- iCheck -->
    <link href="plugins/icheck-bootstrap/icheck-bootstrap.min.css" rel="stylesheet" />
    <!-- JQVMap -->
    <link href="plugins/jqvmap/jqvmap.min.css" rel="stylesheet" />
    <!-- Theme style -->
    <link href="dist/css/adminlte.min.css" rel="stylesheet" />
    <!-- overlayScrollbars -->
    <link href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css" rel="stylesheet" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
    <!-- summernote -->
    <link href="plugins/summernote/summernote-bs4.min.css" rel="stylesheet" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img alt="AdminLTELogo" class="animation__shake" height="60" src="dist/img/AdminLTELogo.png" width="60" />
        </div>

        <!-- Navbar -->
        <?php
        include_once 'Components/navbar.php';
        ?>


        <!-- Main Sidebar Container -->

        <?php
        include_once __DIR__ . "/Components/Sidebar.php";
        $navigation = [
            "Dashboard" => [
                'link' => "./index.php",
                'status' => "active"
            ],
            "New Car" => [
                "link1" => "./pages/NewCar/Add_NewCar.php",
                "link2" => "./pages/NewCar/Display_NewCar.php",
                "status" => "",
                "status1" => "",
                "status2" => ""
            ],
            "Used Car" => [
                "link1" => "./pages/UsedCar/Add_UsedCar.php",
                "link2" => "./pages/UsedCar/Display_UsedCar.php",
                "status" => "",
                "status1" => "",
                "status2" => ""
            ],
            "Products" => [
                "link1" => "./pages/Product/Add_Product.php",
                "link2" => "./pages/Product/Display_Product.php",
                "status" => "",
                "status1" => "",
                "status2" => ""
            ],
            "Users" => [
                "link1" => "./pages/User/Add_User.php",
                "link2" => "./pages/User/Display_User.php",
                "status" => "",
                "status1" => "",
                "status2" => ""
            ],
            "Commands" => [
                "link1" => "./pages/Command/Display_Command.php",
                "link2" => "./pages/Command/Command_Stats.php",
                "status" => "",
                "status1" => "",
                "status2" => "",
            ],
            "Maintenance" => [
                "link1" => "./pages/Maintenance/Add_Maintenance.php",
                "link2" => "./pages/Maintenance/Display_Maintenance.php",
                "status" => "",
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
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
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
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?= $nbCommands ?></h3>

                                    <p>Commands</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a class="small-box-footer" href="pages/Command/Display_Command.php">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?= $nbProducts ?></h3>

                                    <p>Products</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a class="small-box-footer" href="#">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?= $nbUsers ?></h3>

                                    <p>User Registrations</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a class="small-box-footer" href="pages/User/Display_User.php">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?= $nbUsedCars ?></h3>

                                    <p>Used Cars</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-car"></i>
                                </div>
                                <a class="small-box-footer" href="pages/UsedCar/Display_UsedCar.php">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?= $nbNewCars ?></h3>

                            <p>New Cars</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-car"></i>
                        </div>
                        <a class="small-box-footer" href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>


        </div>
        </section>
    </div>
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021
            <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
        </div>
    </footer>

    <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge("uibutton", $.ui.button);
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>

</body>

</html>