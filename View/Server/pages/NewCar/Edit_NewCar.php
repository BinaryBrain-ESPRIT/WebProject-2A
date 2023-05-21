<?php
session_start();
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] == 0) {
    header('Location:../../../Client/index.php');
}
include_once __DIR__ . "/../../../../Model/NewCar.php";
include_once __DIR__ . "/../../../../Controller/NewCar.php";

$carC = new Controller\NewCar();

if (isset($_GET['id'])) {
    $newCar = $carC->getCar($_GET['id']);
}

if (isset($_POST['category']) && isset($_POST['brand']) && isset($_POST['model']) && isset($_POST['cylinder']) && isset($_POST['energy']) && isset($_POST['fiscalPower']) && isset($_POST['gearbox']) && isset($_POST['availability']) && isset($_POST['guarantee'])) {

    $car = new Model\NewCar($_GET['id'], $_POST['category'], $_POST['brand'], $_POST['model'], $_POST['cylinder'], $_POST['energy'], $_POST['fiscalPower'], $_POST['gearbox'], $_POST['availability'], $_POST['guarantee']);
    $carC->updateCar($car);

    header('location: Display_NewCar.php');
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
        <img alt="AdminLTELogo" class="animation__shake" height="60" src="../../dist/img/AdminLTELogo.png" width="60"/>
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
            "status2" => "",
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
                            <form method="post" id="newCarForm">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="carCategory">Category</label>
                                        <input class="form-control"
                                               placeholder="Enter the Category" type="text" name="category"
                                               id="carCategory" value="<?= $newCar['category'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="carBrand">Brand</label>
                                        <br>
                                        <select class="form-control" name="brand" id="carBrand">
                                            <option value="" <?php if ($newCar['brand'] == "") echo "selected" ?>>--
                                                Select Brand --
                                            </option>
                                            <option value="BMW" <?php if ($newCar['brand'] == "BMW") echo "selected" ?>>
                                                BMW
                                            </option>
                                            <option value="Mercedes-Benz" <?php if ($newCar['brand'] == "Mercedes-Benz") echo "selected" ?>>
                                                Mercedes-Benz
                                            </option>
                                            <option value="Land Rover" <?php if ($newCar['brand'] == "Land Rover") echo "selected" ?>>
                                                Land Rover
                                            </option>
                                            <option value="Volkswagen" <?php if ($newCar['brand'] == "Volkswagen") echo "selected" ?>>
                                                Volkswagen
                                            </option>
                                            <option value="Toyota" <?php if ($newCar['brand'] == "Toyota") echo "selected" ?>>
                                                Toyota
                                            </option>
                                            <option value="KIA" <?php if ($newCar['brand'] == "KIA") echo "selected" ?>>
                                                KIA
                                            </option>
                                            <option value="Hyundai" <?php if ($newCar['brand'] == "Hyundai") echo "selected" ?>>
                                                Hyundai
                                            </option>
                                            <option value="Audi" <?php if ($newCar['brand'] == "Audi") echo "selected" ?>>
                                                Audi
                                            </option>
                                            <option value="Peugeot" <?php if ($newCar['brand'] == "Peugeot") echo "selected" ?>>
                                                Peugeot
                                            </option>
                                            <option value="Renault" <?php if ($newCar['brand'] == "Renault") echo "selected" ?>>
                                                Renault
                                            </option>
                                            <option value="Seat" <?php if ($newCar['brand'] == "Seat") echo "selected" ?>>
                                                Seat
                                            </option>
                                            <option value="Citroën" <?php if ($newCar['brand'] == "Citroën") echo "selected" ?>>
                                                Citroën
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="carModel">Model</label>
                                        <input class="form-control"
                                               placeholder="Enter" type="text" name="model" id="carModel"
                                               value="<?= $newCar['model'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="carCylinder">Cylinder</label>
                                        <br>
                                        <input class="form-control" placeholder="Enter Num of Cylinder" type="number"
                                               name="cylinder" id="carCylinder" value="<?= $newCar['cylinder'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="carEnergy">Energy</label>
                                        <br>
                                        <select class="form-control" name="energy" id="carEnergy">
                                            <option value="" <?php if ($newCar['brand'] == "energy") echo "selected" ?>>
                                                -- Energy --
                                            </option>
                                            <option value="Essence" <?php if ($newCar['energy'] == "Essence") echo "selected" ?>>
                                                Essence
                                            </option>
                                            <option value="Diesel" <?php if ($newCar['energy'] == "Diesel") echo "selected" ?>>
                                                Diesel
                                            </option>
                                            <option value="Hybride" <?php if ($newCar['energy'] == "Hybride") echo "selected" ?>>
                                                Hybride
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="carFiscalPow">Fiscal Power</label>
                                        <input class="form-control"
                                               placeholder="Enter the fiscal power" type="number" name="fiscalPower"
                                               id="carFiscalPow" value="<?= $newCar['fiscalPower'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="cargearbox">gearbox</label>
                                        <br>
                                        <select class="form-control" name="gearbox" id="cargearbox">
                                            <option value="" <?php if ($newCar['gearbox'] == "Citroën") echo "selected" ?>>
                                                -- Gear Box --
                                            </option>
                                            <option value="Automatic" <?php if ($newCar['gearbox'] == "Automatic") echo "selected" ?>>
                                                Automatic
                                            </option>
                                            <option value="Manual" <?php if ($newCar['gearbox'] == "Manual") echo "selected" ?>>
                                                Manual
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="availability">Availability</label>
                                        <input class="form-control" id="availability"
                                               placeholder="Enter availability (Months)" type="number"
                                               name="availability" value="<?= $newCar['availability'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="guarantee">Guarantee</label>
                                        <input class="form-control" id="guarantee"
                                               placeholder="Enter guarantee (YEAR)" type="number" name="guarantee"
                                               value="<?= $newCar['guarantee'] ?>">
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                        </div>
                        </form>
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
        $("#newCarForm").validate({
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
                availability: {
                    required: true,
                    number: true,
                    min: 1,
                    max: 10
                },
                guarantee: {
                    required: true,
                    number: true,
                    min: 1,
                    max: 10
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
                availability: {
                    required: "Please enter an availability",
                    number: "Please enter a valid availability",
                },
                guarantee: {
                    required: "Please enter a guarantee",
                    number: "Please enter a valid guarantee",
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

</script>
</body>

</html>