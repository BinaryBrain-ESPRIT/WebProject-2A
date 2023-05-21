<?php
session_start();

include_once __DIR__ . "/../../Model/Maintenance.php";
include_once __DIR__ . "/../../Controller/Maintenance.php";

$MaintenanceM = new Controller\Maintenance();

$mec = $MaintenanceM->getMaintenanceByType("Mechanic");
$elec = $MaintenanceM->getMaintenanceByType("Electrician");
$taul = $MaintenanceM->getMaintenanceByType("Taulier");
$diag = $MaintenanceM->getMaintenanceByType("Diagnostic");


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link
            href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
            rel="stylesheet">

    <title>PHPJabbers.com | Free Car Dealer Website Template</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">

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

<section class="section section-bg" id="call-to-action"
         style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2> Maintenance<br/><br/><em>Take care </em>of your car</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ***** Our Classes Start ***** -->
<section class="section" id="our-classes">
    <div class="container">
        <br>
        <br>
        <br>
        <div class="row" id="tabs">
            <div class="col-lg-4">
                <ul>
                    <li><a href='#tabs-1'><i class="fa fa-wrench"></i> Mechanic</a></li>
                    <li><a href='#tabs-2'><i class="fa fa-bolt"></i> Electrician</a></a></li>
                    <li><a href='#tabs-3'><i class="fa fa-car"></i> Taulier</a></a></li>
                    <li><a href='#tabs-4'><i class="fa fa-tachometer"></i> Diagnostic</a></a></li>

                </ul>
            </div>
            <div class="col-lg-8">
                <section class='tabs-content'>
                    <article id='tabs-1'>
                        <img src="assets/images/mechanicien.jpg" alt="">
                        <h4>Mécanicien</h4>
                        <div class="row">
                            <?php foreach ($mec as $m) { ?>
                                <div class="col-sm-6 mb-4">
                                    <div class="card" style="width: 18rem;">
<!--                                        <img class="card-img-top" src="assets/images/m1.jpg" alt="Card image cap">-->
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $m['name'] ?></h5>
                                            <p class="card-text"><?= $m['description'] ?></p>
                                            <p class="text-black"><i class="fa fa-phone"></i> <?= $m['phone'] ?> <br/>
                                                <i class="fa fa-globe"></i> <?= $m['address'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>


                    </article>
                    <article id='tabs-2'>
                        <img src="assets/images/electricien.jpg" alt="">
                        <h4>Electricien</h4>
                        <div class="row">
                            <?php foreach ($elec as $e) { ?>
                                <div class="col-sm-6 mb-4">
                                    <div class="card" style="width: 18rem;">
<!--                                        <img class="card-img-top" src="..." alt="Card image cap">-->
                                        <div class="card-body">
                                            <h5 class="card-title"> <?= $e['name'] ?> </h5>
                                            <p class="card-text"> <?= $e['description'] ?> </p>
                                            <p class="text-black"><i class="fa fa-phone"></i> <?= $m['phone'] ?> <br/>
                                                <i class="fa fa-globe"></i> <?= $m['address'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </article>
                    <article id='tabs-3'>
                        <img src="assets/images/Taulier.jpg" alt="">
                        <h4>Taulier</h4>
                        <div class="row">
                            <?php foreach ($taul as $t) { ?>
                                <div class="col-sm-6 mb-4">
                                    <div class="card" style="width: 18rem;">
<!--                                        <img class="card-img-top" src="assets/images/m1.jpg" alt="Card image cap">-->
                                        <div class="card-body">
                                            <h5 class="card-title"> <?= $t['name'] ?> </h5>
                                            <p class="card-text"> <?= $t['description'] ?> </p>
                                            <p class="text-black"><i class="fa fa-phone"></i> <?= $t['phone'] ?> <br/>
                                                <i class="fa fa-globe"></i> <?= $t['address'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </article>
                    <article id='tabs-4'>
                        <img src="assets/images/diagnotic.jpg">
                        <h4>Diagnostique</h4>
                        <div class="row">
                            <?php foreach ($diag as $d) { ?>
                                <div class="col-sm-6 mb-4">
                                    <div class="card" style="width: 18rem;">
<!--                                        <img class="card-img-top" src="assets/images/m1.jpg" alt="Card image cap">-->
                                        <div class="card-body">
                                            <h5 class="card-title"> <?= $d['name'] ?> </h5>
                                            <p class="card-text"> <?= $d['description'] ?> </p>
                                            <p class="text-black"><i class="fa fa-phone"></i> <?= $m['phone'] ?> <br/>
                                                <i class="fa fa-globe"></i> <?= $m['address'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </article>
                </section>
            </div>
        </div>
    </div>
</section>
<!-- ***** Our Classes End ***** -->
<?php
include __DIR__.'/Components/footer.php';
?>
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