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
    <title>AdminLTE 3 | Invoice Print</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body>
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
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
                            <td><?= $product['price']?> <sup>DT</sup></td>
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
                <p class="lead">Amount Due 2/22/2014</p>

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
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
    window.addEventListener("load", window.print());
</script>
</body>
</html>
