<?php

use Model\Compare;

session_start();
include_once __DIR__ . "/../../Controller/NewCar.php";
include_once __DIR__ . "/../../Model/NewCar.php";
include_once __DIR__ . "/../../Controller/Compare.php";
include_once __DIR__ . "/../../Model/Compare.php";

$carC = new Controller\NewCar();
$compareC = new \Controller\Compare();

$cars = $carC->getCars();

$brand = "";
$fiscalPower = "";
$energy = "";
$gearbox = "";

if (isset($_POST['reset'])) {
    $_POST = "";
}

if (isset($_POST['brand']) || isset($_POST['fiscalPower']) || isset($_POST['energy']) || isset($_POST['gearbox'])) {
    $brand = $_POST['brand'];
    $fiscalPower = $_POST['fiscalPower'];
    $energy = $_POST['energy'];
    $gearbox = $_POST['gearbox'];

    $cars = $carC->filterCar($brand, $fiscalPower, $energy, $gearbox);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet" />

    <title>PHPJabbers.com | Free Car Dealer Website Template</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" />

    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
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
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br />
                        <br />
                        <h2>New <em>Cars</em></h2>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <br />
            <br />
            <div class="contact-form">
                <form method="post" id="contact">
                    <div class="row">


                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Marque:</label>

                                <select name="brand">
                                    <option value="" <?php if ($brand == "") echo "selected" ?>>-- Toutes Les Marques --
                                    </option>
                                    <option value="BMW" <?php if ($brand == "BMW") echo "selected" ?>>BMW</option>
                                    <option value="Mercedes-Benz" <?php if ($brand == "Mercedes-Benz") echo "selected" ?>>
                                        Mercedes-Benz
                                    </option>
                                    <option value="Land Rover" <?php if ($brand == "Land Rover") echo "selected" ?>>Land
                                        Rover
                                    </option>
                                    <option value="Volkswagen" <?php if ($brand == "Volkswagen") echo "selected" ?>>
                                        Volkswagen
                                    </option>
                                    <option value="Toyota" <?php if ($brand == "Toyota") echo "selected" ?>>Toyota
                                    </option>
                                    <option value="KIA" <?php if ($brand == "KIA") echo "selected" ?>>KIA</option>
                                    <option value="Hyundai" <?php if ($brand == "Hyundai") echo "selected" ?>>Hyundai
                                    </option>
                                    <option value="Audi" <?php if ($brand == "Audi") echo "selected" ?>>Audi</option>
                                    <option value="Peugeot" <?php if ($brand == "Peugeot") echo "selected" ?>>Peugeot
                                    </option>
                                    <option value="Renault" <?php if ($brand == "Renault") echo "selected" ?>>Renault
                                    </option>
                                    <option value="Seat" <?php if ($brand == "Seat") echo "selected" ?>>Seat</option>
                                    <option value="Citroën" <?php if ($brand == "Citroën") echo "selected" ?>>Citroën
                                    </option>
                                </select>
                            </div>
                        </div>

                        <!--                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">-->
                        <!--                        <div class="form-group">-->
                        <!--                            <label>Price:</label>-->
                        <!---->
                        <!--                            <select>-->
                        <!--                                <option value="">-- All --</option>-->
                        <!--                                <option value="">-- All --</option>-->
                        <!--                                <option value="">-- All --</option>-->
                        <!--                                <option value="">-- All --</option>-->
                        <!--                            </select>-->
                        <!--                        </div>-->
                        <!--                    </div>-->

                        <!--                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">-->
                        <!--                        <div class="form-group">-->
                        <!--                            <label>Kilometers:</label>-->
                        <!---->
                        <!--                            <select>-->
                        <!--                                <option value="">-- All --</option>-->
                        <!--                                <option value="">-- All --</option>-->
                        <!--                                <option value="">-- All --</option>-->
                        <!--                                <option value="">-- All --</option>-->
                        <!--                            </select>-->
                        <!--                        </div>-->
                        <!--                    </div>-->

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Power:</label>

                                <select name="fiscalPower">
                                    <option value="" <?php if ($fiscalPower == "") echo "selected" ?>>-- All --</option>
                                    <?php
                                    for (
                                        $i = 4;
                                        $i <= 15;
                                        $i++
                                    ) {
                                    ?>
                                        <option value='<?= $i ?>' <?php if ($fiscalPower == $i) echo "selected" ?>><?= $i ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Fuel:</label>

                                <select name="energy">
                                    <option value="" <?php if ($energy == "") echo "selected" ?>>-- All --</option>
                                    <option value="Essence" <?php if ($energy == "Essence") echo "selected" ?>>Essence
                                    </option>
                                    <option value="Diesel" <?php if ($energy == "Diesel") echo "selected" ?>>Diesel
                                    </option>
                                    <option value="Hybrid" <?php if ($energy == "Hybrid") echo "selected" ?>>Hybrid
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Gearbox:</label>

                                <select name="gearbox">
                                    <option value="" <?php if ($gearbox == "") echo "selected" ?>>-- All --</option>
                                    <option value="Automatic" <?php if ($gearbox == "Automatic") echo "selected" ?>>--
                                        Automatic --
                                    </option>
                                    <option value="Manual" <?php if ($gearbox == "Manual") echo "selected" ?>>-- Manual
                                        --
                                    </option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="d-flex">
                        <div class="col-6 ">
                            <div class="main-button text-center">
                                <button class="bg-primary">Search</button>
                            </div>
                        </div>
                        <div class="col-6 ">
                            <div class="main-button text-center">
                                <button class="bg-warning" name="reset">Reset</button>
                            </div>
                        </div>
                    </div>


                    <br />
                    <br />
                </form>
            </div>

            <div class="row cars">

                <?php
                foreach ($cars as $car) {

                ?>
                    <div class="col-lg-4 car">
                        <div class="trainer-item">
                            <div class="image-thumb">
                                <div style="background-image: url('uploads/<?= $car['imgURL'] ?>');background-position: top;background-size: cover;height: 300px;width: auto  "></div>
                            </div>
                            <div class="down-content">
                                <span>
                                    &nbsp; <sup>$</sup>11779
                                </span>
                                <h4><?= $car['brand'] . " " . $car['model'] ?></h4>
                                <p>
                                    <i class="fa fa-circle"></i> <?= $car['cylinder'] ?> Cylinder &nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-power-off"></i> <?= $car['energy'] ?> &nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-cog"></i> <?= $car['gearbox'] ?> &nbsp;&nbsp;&nbsp;
                                </p>

                                <ul class="social-icons d-flex ">
                                    <li class="flex-grow-1 btn btn-info"><a class="text-light" href="NewCar-details.php?id=<?= $car['id'] ?> ">+
                                            View Car</a></li>
                                    <?php
                                    $compareM = new Compare(0, $_SESSION['id'], $car['id']);
                                    if ($compareC->checkIfExist($compareM)) {

                                    ?>
                                        <li class="btn btn-danger"><a class="text-dark" href="CompareList.php?delete=<?= $car['id'] ?> "><i class="fa fa-minus"></i>
                                                Compare</a></li>
                                    <?php } else { ?>
                                        <li class="btn btn-warning"><a class="text-dark" href="CompareList.php?add=<?= $car['id'] ?> "><i class="fa fa-plus"></i>
                                                Compare</a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                <?php } ?>

                <br />

                <nav>
                    <div class="pagination pagination-lg justify-content-center">
                    </div>
                </nav>
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