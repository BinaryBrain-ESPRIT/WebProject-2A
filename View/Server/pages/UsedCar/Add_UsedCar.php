<?php
session_start();
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] == 0) {
    header('Location:../../../Client/index.php');
}
include_once __DIR__ . "/../../../../Model/UsedCar.php";
include_once __DIR__ . "/../../../../Controller/UsedCar.php";

if (isset($_POST['category']) && isset($_POST['brand']) && isset($_POST['model']) && isset($_POST['cylinder']) && isset($_POST['energy']) && isset($_POST['fiscalPower']) && isset($_POST['gearbox']) && isset($_POST['registerNumber']) && isset($_POST['year']) && isset($_POST['kilometers'])) {
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $cylinder = $_POST['cylinder'];
    $energy = $_POST['energy'];
    $fiscalPower = $_POST['fiscalPower'];
    $gearbox = $_POST['gearbox'];
    $registerNumber = $_POST['registerNumber'];
    $year = $_POST['year'];
    $kilometers = $_POST['kilometers'];

    $car = new Model\UsedCar(0,$category, $brand, $model, $cylinder, $energy, $fiscalPower, $gearbox, $registerNumber, $year, $kilometers);
    $carC = new Controller\UsedCar();
    $carC->addCar($car);
    header('location: Display_UsedCar.php');
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
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img alt="AdminLTELogo" class="animation__shake" height="60" src="../../dist/img/AdminLTELogo.png"
             width="60"/>
    </div>

    <!-- Navbar -->
    <?php
    include_once __DIR__ . '/../../Components/navbar.php';
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
            "status" => "",
            "status1" => "",
            "status2" => ""
        ],
        "Used Car" => [
            "link1" => "./../UsedCar/Add_UsedCar.php",
            "link2" => "./../UsedCar/Display_UsedCar.php",
            "status" => "menu-open",
            "status1" => "active",
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
                        <h1 class="m-0">Cars</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Cars</li>
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
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Car</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" id="usedCarForm">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="carCategory">Category</label>
                                        <input class="form-control"
                                               placeholder="Enter the Category" type="text" name="category"
                                               id="carCategory">
                                    </div>
                                    <div class="form-group">
                                        <label for="carBrand">Brand</label>
                                        <br>
                                        <select class="form-control" name="brand" id="carBrand">
                                            <option value="">-- Select Brand --</option>
                                            <option value="BMW">BMW</option>
                                            <option value="Mercedes-Benz">Mercedes-Benz</option>
                                            <option value="Land Rove">Land Rover</option>
                                            <option value="Volkswagen">Volkswagen</option>
                                            <option value="Toyota">Toyota</option>
                                            <option value="KIA">KIA</option>
                                            <option value="Hyundai">Hyundai</option>
                                            <option value="Audi">Audi</option>
                                            <option value="Peugeot">Peugeot</option>
                                            <option value="Renault">Renault</option>
                                            <option value="Seat">Seat</option>
                                            <option value="Citroën">Citroën</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="carModel">Model</label>
                                        <input class="form-control"
                                               placeholder="Enter" type="text" name="model" id="carModel">
                                    </div>
                                    <div class="form-group">
                                        <label for="carCylinder">Cylinder</label>
                                        <br>
                                        <input class="form-control" placeholder="Enter Num of Cylinder" type="number"
                                              max="4" min="3" name="cylinder" id="carCylinder">
                                    </div>
                                    <div class="form-group">
                                        <label for="carEnergy">Energy</label>
                                        <br>
                                        <select class="form-control" name="energy" id="carEnergy">
                                            <option value="">-- Energy --</option>
                                            <option value="Essence">Essence</option>
                                            <option value="Diesel">Diesel</option>
                                            <option value="Hybride">Hybride</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="carFiscalPow">Fiscal Power</label>
                                        <input class="form-control"
                                              min="4" placeholder="Enter the fiscal power" type="number" name="fiscalPower"
                                               id="carFiscalPow">
                                    </div>
                                    <div class="form-group">
                                        <label for="cargearbox">gearbox</label>
                                        <br>
                                        <select class="form-control" name="gearbox" id="cargearbox">
                                            <option value="">-- Gear Box --</option>
                                            <option value="auto">Automatic</option>
                                            <option value="manu">Manual</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="carRegNum">Register Number</label>
                                        <input class="form-control" placeholder="123 TUN 456" type="text"
                                               name="registerNumber" id="carRegNum">
                                    </div>
                                    <div class="form-group">
                                        <label for="carYear">Year</label>
                                        <input class="form-control" placeholder="Enter the year" type="number"
                                               name="year" id="carYear">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputGuar1">Kilometers</label>
                                        <input class="form-control" placeholder="Enter the kilometer" type="number"
                                               name="kilometers">
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
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
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
    $(function () {
        $("#usedCarForm").validate({
            rules: {
                category: {
                    required: true,
                },
                brand: {
                    required: true,
                },
                model: {
                    required: true,
                },
                cylinder: {
                    required: true,
                    min: 2,
                    max: 10
                },
                energy: {
                    required: true,
                },
                fiscalPower: {
                    required: true,
                    number: true,
                    min: 4,
                    max: 50
                },
                gearbox: {
                    required: true,
                },
                registerNumber: {
                    required: true,
                    registerNum: true
                },
                year: {
                    required: true,
                    number: true,
                    min: 1990,
                    max: 2022
                },
                kilometers: {
                    required: true,
                    number: true,
                    min: 1,
                    max: 1000000
                },

            },
            messages: {
                category: {
                    required: "Please select a category",
                },
                brand: {
                    required: "Please select a brand",
                },
                model: {
                    required: "Please enter a model",
                },
                cylinder: {
                    required: "Please enter a cylinder",
                    min: "Please enter a valid cylinder",
                    max: "Please enter a valid cylinder"
                },
                energy: {
                    required: "Please select an energy",
                },
                fiscalPower: {
                    required: "Please enter a fiscal power",
                    number: "Please enter a valid fiscal power",
                },
                gearbox: {
                    required: "Please select a gear box",
                },
                registerNumber: {
                    required: "Please enter a register number",
                    // pattern: "Please enter a valid register number"
                },
                year: {
                    required: "Please enter a year",
                    number: "Please enter a valid year",
                    min: "Please enter a valid year",
                    max: "Please enter a valid year",
                    year: true,
                },
                kilometers: {
                    required: "Please enter a kilometer",
                    number: "Please enter a valid kilometer",
                    min: "Please enter a valid kilometer",
                    max: "Please enter a valid kilometer"
                },
            },
            errorElement: "span",
            errorPlacement: function (error, element) {
                error.addClass("invalid-feedback");
                element.closest(".form-group").append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass("is-invalid");
            },
        });
    });

    jQuery.validator.addMethod("registerNum", function (value, element) {
        return this.optional(element) || /\b([0-9]|[1-9][0-9]|[1-9][0-9][0-9])\b TUN \b([0-9]|[1-9][0-9]|[1-9][0-9][0-9])\b/.test(value);
    }, "Please specify the correct Registration Number EX: 123 TUN 456");
</script>
</body>

</html>