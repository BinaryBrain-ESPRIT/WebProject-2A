<?php
session_start();
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] == 0) {
    header('Location:../../../Client/index.php');
}
include_once __DIR__ . "/../../../../Model/Maintenance.php";
include_once __DIR__ . "/../../../../Controller/Maintenance.php";

$maintenanceC = new Controller\Maintenance();

if (isset($_POST['name']) && isset($_POST['type']) && isset($_POST['description']) && isset($_POST['phone']) && isset($_POST['address'])) {
    $maintenance = new Model\Maintenance((int)null, $_POST['name'], $_POST['type'], $_POST['description'], $_POST['phone'], $_POST['address']);
    $maintenanceC->addMaintenance($maintenance);
    header('Location: Display_Maintenance.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>Karhabti TN | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
            rel="stylesheet"
    />
    <!-- Font Awesome -->
    <link href="../../plugins/fontawesome-free/css/all.min.css" rel="stylesheet"/>
    <!-- Ionicons -->
    <link
            href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
            rel="stylesheet"
    />
    <!-- Tempusdominus Bootstrap 4 -->
    <link
            href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"
            rel="stylesheet"
    />
    <!-- iCheck -->
    <link
            href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css"
            rel="stylesheet"
    />
    <!-- JQVMap -->
    <link href="../../plugins/jqvmap/jqvmap.min.css" rel="stylesheet"/>
    <!-- Theme style -->
    <link href="../../dist/css/adminlte.min.css" rel="stylesheet"/>
    <!-- overlayScrollbars -->
    <link
            href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css"
            rel="stylesheet"
    />
    <!-- Daterange picker -->
    <link href="../../plugins/daterangepicker/daterangepicker.css" rel="stylesheet"/>
    <!-- summernote -->
    <link href="../../plugins/summernote/summernote-bs4.min.css" rel="stylesheet"/>
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
            "status" => "menu-open",
            "status1" => "active",
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
                        <h1 class="m-0">Products</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
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
                                <h3 class="card-title">Add maintenance</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" id="maintenance">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="Name">Name</label>
                                        <input class="form-control" id="Name"
                                               placeholder="Enter the Name"
                                               type="text" name="name">
                                    </div>

                                    <div class="form-group">
                                        <label for="Car parts">Type</label>
                                        <br>
                                        <select class="form-control" name="type" id="Car parts">
                                            <option value="">-- Select Type --</option>
                                            <option value="Mechanic">Mechanic</option>
                                            <option value="Electrician">Electrician</option>
                                            <option value="Taulier">Taulier</option>
                                            <option value="Diagnostic">Diagnostic</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="Description">Description</label>
                                        <input class="form-control" id="Description"
                                               placeholder="Enter the Description"
                                               type="text" name="description">
                                    </div>

                                    <div class="form-group">
                                        <label for="Phone">Phone</label>
                                        <input class="form-control" id="Phone"
                                               placeholder="Enter the Phone Number"
                                               type="number" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="Address">Address</label>
                                        <input class="form-control" id="Address" placeholder="Enter the Address"
                                               type="text" name="address">
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
        $("#maintenance").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                type: {
                    required: true,
                },
                description: {
                    required: true,
                    minlength: 2
                },
                phone: {
                    required: true,
                    minlength: 8,
                    maxlength: 8,
                    number: true
                },
                address: {
                    required: true,
                    minlength: 10
                },
            },
            messages: {
                name: {
                    required: "Please enter a name",
                    minlength: "Your name must consist of at least 2 characters"
                },
                type: {
                    required: "Please select a type",
                },
                description: {
                    required: "Please enter a description",
                    minlength: "Your description must consist of at least 2 characters"
                },
                phone: {
                    required: "Please enter a phone number",
                    minlength: "Your phone number must consist of at least 8 characters",
                    number: "Your phone number must be a number"
                },
                address: {
                    required: "Please enter an address",
                    minlength: "Your address must consist of at least 10 characters"
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