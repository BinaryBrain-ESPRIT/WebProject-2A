<?php
session_start();
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] == 0) {
    header('Location:../Client/index.php');
}

use Controller\Product as ProductController;
use Model\Product as ProductModel;

include_once __DIR__ . '/../../../../Controller/Product.php';
include_once __DIR__ . '/../../../../Model/Product.php';

$productC = new ProductController();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = $productC->getProduct($id);
}

if (isset($_POST['brand']) && isset($_POST['type']) && isset($_POST['name']) && isset($_POST['qte']) && isset($_POST['price'])) {
    $product = new ProductModel($_GET['id'], $_POST['brand'], $_POST['type'], $_POST['name'], $_POST['price'], $_POST['qte']);
    $productC->updateProduct($product);
    header('Location: Display_Product.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>AdminLTE 3 | Validation Form</title>

    <!-- Google Font: Source Sans Pro -->
    <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
    <!-- Font Awesome -->
    <link
            rel="stylesheet"
            href="../../plugins/fontawesome-free/css/all.min.css"
    />
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css"/>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
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
            "status" => "",
            "status1" => "",
            "status2" => ""
        ],
        "Products" => [
            "link1" => "./../Product/Add_Product.php",
            "link2" => "./../Product/Display_Product.php",
            "status" => "menu-open",
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
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Products</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <!-- left column -->
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Edit Product
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="brand">Brand</label>
                                        <input class="form-control" id="brand"
                                               placeholder="Enter the Brand"
                                               type="text" name="brand" value="<?= $product['brand'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="Car parts">Car Parts</label>
                                        <br>
                                        <select class="form-control" name="type" id="Car parts">
                                            <option value="" <?php if($product['type'] == "") echo "selected" ?> >-- Select Car parts --</option>
                                            <option value="clutch" <?php if($product['type'] == "clutch") echo "selected" ?>>Clutch</option>
                                            <option value="wheel" <?php if($product['type'] == "wheel") echo "selected" ?>>Wheel</option>
                                            <option value="brake" <?php if($product['type'] == "brake") echo "selected" ?>>Brake</option>
                                            <option value="oil" <?php if($product['type'] == "oil") echo "selected" ?>>Oil</option>
                                            <option value="radiator" <?php if($product['type'] == "radiator") echo "selected" ?>>Radiator</option>
                                            <option value="gas pump" <?php if($product['type'] == "gas pump") echo "selected" ?>>Gas Pump</option>
                                            <option value="oil pump" <?php if($product['type'] == "oil pump") echo "selected" ?>>Oil pump</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input class="form-control" id="name"
                                               placeholder="Enter Name"
                                               type="text" name="name" value="<?= $product['name'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="qte">Quantity</label>
                                        <input class="form-control" id="qte"
                                               placeholder="Enter Quantity"
                                               type="number" name="qte" value="<?= $product['qte'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input class="form-control" id="price" placeholder="Enter the price"
                                               type="text" name="price" value="<?= $product['price'] ?>">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-lg-3"></div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6"></div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block"><b>Version</b> 3.2.0</div>
        <strong
        >Copyright &copy; 2014-2021
            <a href="https://adminlte.io">AdminLTE.io</a>.</strong
        >
        All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

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
        $("#userForm").validate({
            rules: {
                userEmail: {
                    required: true,
                    email: true,
                },
                userPassword: {
                    required: true,
                    minlength: 8,
                },
                userName: {
                    required: true,
                },
                userAge: {
                    required: true,
                    min: 1,
                    max: 100,
                },
            },
            messages: {
                userEmail: {
                    required: "Please enter an email address",
                    email: "Please enter a valid email address",
                },
                userPassword: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 8 characters long",
                },
                userName: {
                    required: "Please enter a name"
                },
                userAge: {
                    required: "Please enter a age",
                    min: "Please enter a valid age",
                    max: "Please enter a valid age",
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
