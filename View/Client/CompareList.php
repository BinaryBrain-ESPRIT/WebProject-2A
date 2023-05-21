<?php

use Controller\Compare;
use Controller\NewCar;

session_start();

require_once __DIR__ . "/../../Model/Compare.php";
require_once __DIR__ . "/../../Controller/Compare.php";
require_once __DIR__ . "/../../Controller/NewCar.php";

$compare = new Compare();
$newCarC = new NewCar();

if (!isset($_SESSION['id']))
    header('Location: index.php');

$compareList = [];

if (isset($_SESSION['id'])) {
    $idUser = $_SESSION['id'];
    $compareList = $compare->listCompare($idUser);
}

if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $compareM = new \Model\Compare(0, $_SESSION['id'], $_GET['delete']);
    $compare->deleteCompare($compareM);
    var_dump($_SERVER['HTTP_REFERER']);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if (isset($_GET['add']) && !empty($_GET['add'])) {
    $compareM = new \Model\Compare(0, $_SESSION['id'], $_GET['add']);
    $compare->addCompare($compareM);
    header('Location: CompareList.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <link
            href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
            rel="stylesheet"
    />

    <title>PHPJabbers.com | Free Car Dealer Website Template</title>

    <link
            rel="stylesheet"
            type="text/css"
            href="assets/css/bootstrap.min.css"
    />

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css"/>

    <link rel="stylesheet" href="assets/css/style.css"/>
</head>

<body>
<!-- ***** Preloader Start ***** -->
<!--<div id="js-preloader" class="js-preloader">-->
<!--    <div class="preloader-inner">-->
<!--        <span class="dot"></span>-->
<!--        <div class="dots">-->
<!--            <span></span>-->
<!--            <span></span>-->
<!--            <span></span>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- ***** Preloader End ***** -->

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                include_once 'Components/navbar.php';
                ?>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->

<!-- ***** Call to Action Start ***** -->
<section
        class="section section-bg"
        id="call-to-action"
        style="background-image: url(assets/images/banner-image-1-1920x500.jpg)"
>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br/>
                    <br/>
                    <h2>Our <em>Cars</em></h2>
                    <p>
                        Ut consectetur, metus sit amet aliquet placerat, enim est
                        ultricies ligula
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Call to Action End ***** -->

<!-- ***** Fleet Starts ***** -->
<section class="section" id="trainers">
    <div class="container">
        <div class="d-flex justify-content-around flex-wrap">
            <?php
            if (count($compareList) > 0) {

                foreach ($compareList as $compareItem) {
                    $car = $newCarC->getCar($compareItem['idCar']);
                    ?>
                    <div class="card m-3" style="width: 18rem;">
                        <img src="uploads/<?= $car['imgURL'] ?>">
                        <div class="card-body">
                            <div class="my-2 d-flex flex-column">
                                <div><span class="font-weight-bold">Category: </span><?= $car['category'] ?></div>
                                <div><span class="font-weight-bold">Brand: </span><?= $car['brand'] ?></div>
                                <div><span class="font-weight-bold">Model: </span><?= $car['model'] ?></div>
                                <div><span class="font-weight-bold">Cylinder: </span><?= $car['cylinder'] ?></div>
                                <div><span class="font-weight-bold">Energy: </span><?= $car['energy'] ?></div>
                                <div><span class="font-weight-bold">FiscalPower: </span><?= $car['fiscalPower'] ?></div>
                                <div><span class="font-weight-bold">GearBox: </span><?= $car['gearbox'] ?></div>
                                <div><span class="font-weight-bold">Availability: </span><?= $car['availability'] ?>
                                </div>
                                <div><span class="font-weight-bold">guarantee: </span><?= $car['guarantee'] ?></div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="CompareList.php?delete=<?= $compareItem['idCar'] ?>" class="btn btn-danger"><i
                                            class="fa fa-close"></i> Remove</a>
                            </div>
                        </div>
                    </div>

                    <?php
                }
            } else {
                ?>
                <div class="alert alert-danger m-5 " role="alert">
                    No car in compare list
                </div>
                <?php
            }
            ?>

        </div>
</section>
<!-- ***** Fleet Ends ***** -->

<!-- ***** Footer Start ***** -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>
                    Copyright © 2020 Company Name - Template by:
                    <a href="https://www.phpjabbers.com/">PHPJabbers.com</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src="assets/js/jquery-2.1.0.min.js"></script>

<script src="https://pagination.js.org/dist/2.1.5/pagination.js"></script>

<!-- Bootstrap -->
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="assets/js/scrollreveal.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/imgfix.min.js"></script>
<script src="assets/js/mixitup.js"></script>
<script src="assets/js/accordions.js"></script>

<!-- Global Init -->
<script src="assets/js/custom.js"></script>
<script src="assets/js/pagination.js"></script>

</body>
</html>
