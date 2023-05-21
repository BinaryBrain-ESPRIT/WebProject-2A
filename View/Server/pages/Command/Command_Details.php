<?php
session_start();
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] == 0) {
    header('Location:../../../Client/index.php');
}

require_once __DIR__ . '/../../../../Model/Command.php';
require_once __DIR__ . '/../../../../Controller/Command.php';
require_once __DIR__ . '/../../../../Model/CommandProduct.php';
require_once __DIR__ . '/../../../../Controller/CommandProduct.php';
require_once __DIR__ . '/../../../../Model/Product.php';
require_once __DIR__ . '/../../../../Controller/Product.php';

$commandC = new Controller\Command();
$command = $commandC->getCommand($_SESSION['id']);
$productC = new Controller\Product();
$commandProductC = new Controller\CommandProduct();
$commandProducts = $commandProductC->getCommandProduct($_GET['idCommand']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Invoice</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
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
            "status" => "menu-open",
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
                        <h1>Invoice</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Invoice</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> AdminLTE, Inc.
                                        <small class="float-right">Date: <?= explode(' ', $command['date'])[0] ?></small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    From
                                    <address>
                                        <strong><?= $_SESSION['name']?></strong><br>
                                        Phone: (804) 123-5432<br>
                                        Email: <a href="mailto: $_SESSION['email']"> <?= $_SESSION['email']?></a>
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">

                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <b>Invoice #<?= $command['id']?></b><br>
                                    <br>
                                    <b>Payment Due:</b> <?= $command['date']?><br>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID #</th>
                                            <th>Type</th>
                                            <th>Brand</th>
                                            <th>Name</th>
                                            <th>Qty</th>
                                            <th>Unit Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($commandProducts as $commandProduct) {
                                            $product = $productC->getProduct($commandProduct['idProduct']);
                                            ?>
                                            <tr>
                                                <td>#<?= $product['id'] ?></td>
                                                <td><?= $product['type'] ?></td>
                                                <td><?= $product['brand'] ?></td>
                                                <td><?= $product['name'] ?></td>
                                                <td><?= $commandProduct['qte'] ?></td>
                                                <td><?= $product['price'] ?> <sup>DT</sup></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-6">
                                    <p class="lead">Payment Methods:</p>
                                    <img src="../../dist/img/credit/visa.png" alt="Visa">
                                    <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                                    <img src="../../dist/img/credit/american-express.png" alt="American Express">
                                    <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                                </div>
                                <!-- /.col -->
                                <div class="col-6">
                                    <p class="lead"><?= $command['date'] ?></p>

                                    <div class="table-responsive">
                                        <table class="table">

                                            <tr>
                                                <th>Total:</th>
                                                <td> <?= $command['total']?> <sup>DT</sup></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">
                                    <a href="Command_Details_Print.php?idCommand=<?=$command['id'] ?>" rel="noopener" target="_blank" class="btn btn-default"><i
                                                class="fas fa-print"></i> Print</a>

                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer no-print">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.2.0
        </div>
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
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
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
