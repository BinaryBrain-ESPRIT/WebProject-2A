<?php
session_start();
include_once __DIR__ . "/../../Controller/UsedCar.php";
include_once __DIR__ . "/../../Model/UsedCar.php";

include_once __DIR__ . "/../../Controller/Comment.php";
include_once __DIR__ . "/../../Model/Comment.php";

include_once __DIR__ . '/../../Controller/User.php';

$error = "";
$carC = new Controller\UsedCar();
$userC = new Controller\User();

if (isset($_GET['idCar'])) {
    $car = $carC->getCar($_GET['idCar']);
}

$commentC = new Controller\Comment();
$comments = $commentC->listComments(1, $_GET['idPost']);
if (isset($_POST['msg'])) {
    if (!isset($_SESSION['id'])) $error = "You need to login !";
    else {
        $comment = new Model\Comment(0, $_GET['idPost'],0, $_SESSION['id'], $_POST['msg'], 0, 1);
        $commentC->addComment($comment, 1);
        $comments = $commentC->listComments(1, $_GET['idPost']);
        header("Refresh:0");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
          rel="stylesheet">

    <title>PHPJabbers.com | Free Car Dealer Website Template</title>
    <title> link css</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="style.css">
    <style>
        label {
            color: orange;
        }
    </style>
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
<section class="section section-bg" id="call-to-action"
         style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2><small>
                            <del>$12 999</del>
                        </small> <em>$11 779</em></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Call to Action End ***** -->
<?php if (isset($error) && !empty($error)) {
    ?>

    <div class="mt-5 mx-auto alert alert-danger alert-dismissible fade show w-50" role="alert">
        <strong>Error !</strong> <?= $error ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>
<!-- ***** Fleet Starts ***** -->
<section class="section" id="trainers">
    <div class="container">
        <br>
        <br>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="assets/images/car-image-1-1200x600.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/images/car-image-1-1200x600.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/images/car-image-1-1200x600.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <br>
        <br>

        <div class="row" id="tabs">
            <div class="col-lg-4">
                <ul>
                    <li><a href='#tabs-1'><i class="fa fa-cog"></i> Vehicle Specs</a></li>
                    <li><a href='#tabs-2'><i class="fa fa-info-circle"></i> Vehicle Description</a></li>
                    <li><a href='#tabs-3'><i class="fa fa-plus-circle"></i> Vehicle Extras</a></li>
                    <li><a href='#tabs-4'><i class="fa fa-phone"></i> Contact Details</a></li>
                    <li><a href='#tabs-5'><i class="fa fa-comments"></i> comments</a></li>
                </ul>
            </div>
            <div class="col-lg-8">
                <section class='tabs-content' style="width: 100%;">
                    <article id='tabs-1'>
                        <h4>Vehicle Specs</h4>

                        <div class="row">
                            <div class="col-sm-6">
                                <label>Type</label>
                                <p>New vehicle</p>
                            </div>

                            <div class="col-sm-6">
                                <label>Brand</label>
                                <p> <?= $car['brand'] ?></p>
                            </div>

                            <div class="col-sm-6">
                                <label> Model</label>

                                <p><?= $car['model'] ?></p>
                            </div>

                            <div class="col-sm-6">
                                <label>Cylinder</label>

                                <p><?= $car['cylinder'] ?></p>
                            </div>

                            <div class="col-sm-6">
                                <label>Fuel</label>

                                <p><?= $car['energy'] ?></p>
                            </div>

                            <div class="col-sm-6">
                                <label>Fiscal Power</label>

                                <p><?= $car['fiscalPower'] ?></p>
                            </div>

                            <div class="col-sm-6">
                                <label>GearBox</label>

                                <p><?= $car['gearbox'] ?></p>
                            </div>

                            <div class="col-sm-6">
                                <label>Register Number</label>

                                <p><?= $car['registerNumber'] ?></p>
                            </div>


                            <div class="col-sm-6">
                                <label>Year</label>

                                <p><?= $car['year'] ?></p>
                            </div>

                            <div class="col-sm-6">
                                <label>Kilometers</label>

                                <p><?= $car['kilometers'] ?></p>
                            </div>

                            <div class="col-sm-6">
                                <label>Rate</label>

                                <p><?= $car['rate'] ?></p>
                            </div>
                        </div>
                    </article>
                    <article id='tabs-2'>
                        <h4>Vehicle Description</h4>

                        <p>- Colour coded bumpers <br> - Tinted glass <br> - Immobiliser <br> - Central locking - remote
                            <br> - Passenger airbag <br> - Electric windows <br> - Rear head rests <br> - Radio <br> -
                            CD player <br> - Ideal first car <br> - Warranty <br> - High level brake light <br> Lorem
                            ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                            cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </article>
                    <article id='tabs-3'>
                        <h4>Vehicle Extras</h4>

                        <div class="row">
                            <div class="col-sm-6">
                                <p>ABS</p>
                            </div>
                            <div class="col-sm-6">
                                <p>Leather seats</p>
                            </div>
                            <div class="col-sm-6">
                                <p>Power Assisted Steering</p>
                            </div>
                            <div class="col-sm-6">
                                <p>Electric heated seats</p>
                            </div>
                            <div class="col-sm-6">
                                <p>New HU and AU</p>
                            </div>
                            <div class="col-sm-6">
                                <p>Xenon headlights</p>
                            </div>
                        </div>
                    </article>
                    <article id='tabs-4'>
                        <h4>Contact Details</h4>

                        <div class="row">
                            <div class="col-sm-6">
                                <label>Name</label>

                                <p>John Smith</p>
                            </div>
                            <div class="col-sm-6">
                                <label>Phone</label>

                                <p>123-456-789 </p>
                            </div>
                            <div class="col-sm-6">
                                <label>Mobile phone</label>
                                <p>456789123 </p>
                            </div>
                            <div class="col-sm-6">
                                <label>Email</label>
                                <p><a href="#">john@carsales.com</a></p>
                            </div>
                        </div>
                    </article>
                    <article id='tabs-5'>
                        <h4>Comments</h4>
                        <nav class="navbar navbar-expand-sm navbar-dark">


                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                        </nav>
                        <!-- Main Body -->
                        <section>
                            <form class="bg-dark p-4 d-flex flex-column"
                                  style="box-shadow: 0px 0px 15px rgba(0,0,0,0.1);padding: 0 20px; border-radius: 20px; border: none"
                                  method="post">
                                <div>
                                    <h4 class="text-light">Leave a comment</h4>
                                    <label for="message" class="text-light">Message</label>
                                    <textarea name="msg" cols="30" rows="5" class="form-control p-3"
                                              style="background-color: rgb(249, 246, 246);resize: none; border-radius: 15px"></textarea>
                                </div>

                                <div class="form-group mt-2 mx-auto">
                                    <button type="submit" class="btn btn-outline-info">Post Comment</button>
                                </div>

                            </form>
                            <?php

                            foreach ($comments as $comment) {
                                $userName = $userC->getUser($comment['idUser'])['name'];
                                ?>
                                <div class="container d-flex mb-2">
                                    <div class="text-justify bg-white m-2"
                                         style="box-shadow: 0px 0px 15px rgba(0,0,0,0.1);padding: 0 20px; border-radius: 20px; width: 100%">
                                        <div class="d-flex flex-column"><h4 style="font-size: 20px"
                                                                            class="text-dark mb-3"><?= $userName ?></h4>
                                            <span class="text-dark"
                                                  style="font-size: 12px"><?= $comment['date'] ?></span></div>

                                        <br>
                                        <p class="text-dark"> <?= $comment['description'] ?> </p>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>


                        </section>
                    </article>
                </section>
            </div>
        </div>
    </div>
</section>
<!-- ***** Fleet Ends ***** -->

<!-- ***** Footer Start ***** -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>
                    Copyright © 2020 Company Name
                    - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src="assets/js/jquery-2.1.0.min.js"></script>

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

</body>
</html>