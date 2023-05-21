<?php
include_once __DIR__ . "/../../Controller/UsedCar.php";
include_once __DIR__ . "/../../Controller/Post.php";

session_start();

$isLoggedIn = false;
if (isset($_GET['login'])) {
    if ($_GET['login'] == 'success' && isset($_SESSION['email'])) {
        $isLoggedIn = true;
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_unset();
    session_destroy();
    header('Location:index.php');
}

$usedCarC = new Controller\UsedCar();
$postC = new Controller\Post();

$latestPosts = $postC->getLatestPosts();


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
<?php if ($isLoggedIn) {

    ?>
    <div class="alert alert-primary alert-dismissible fade show"
         style="position: absolute; right: 5px; top: 85px; width: 500px;z-index: 1000" role="alert">
        Welcome Back <strong> <?= $_SESSION['name'] ?> !</strong> You should check our latest Cars !
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php } ?>

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

<!-- ***** Main Banner Area Start ***** -->
<div class="main-banner" id="top">
    <video autoplay muted loop id="bg-video">
        <source src="assets/images/video.mp4" type="video/mp4"/>
    </video>

    <div class="video-overlay header-text">
        <div class="caption">
            <h6>Best Car dealer in Town!</h6>
            <h2><em>KARHABTI</em> TN</h2>
            <div class="main-button">
                <a href="Contact.php">Contact Us</a>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->

<!-- ***** NewCar Starts ***** -->
<section class="section" id="trainers">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2>Latest <em>Cars</em></h2>
                    <img src="assets/images/line-dec.png" alt=""/>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($latestPosts as $post) {
                $car = $usedCarC->getCar($post['idCar']);
                ?>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <div style="background-image: url('uploads/<?= $car['imgURL'] ?>');background-position: top;background-size: cover;height: 300px;width: auto  "></div>
                        </div>
                        <div class="down-content">
                <span>
                </span>
                            <h4><?= $car['brand'] . " " . $car['model'] ?></h4>
                            <p>
                                <i class="fa fa-dashboard"></i> <?= $car['kilometers'] ?>km &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-cube"></i> 1800 cc &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-cog"></i> <?= $car['gearbox'] ?> &nbsp;&nbsp;&nbsp;
                            </p>
                            <ul class="social-icons">
                                <li><a href="UsedCar-details.php?idCar=<?=  $post['idCar']?>&idPost=<?= $post['id']?>">+ View Car</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

        </div>

        <br/>

        <div class="main-button text-center">
            <a href="NewCars.php">View Cars</a>
        </div>
    </div>
</section>
<!-- ***** NewCar Ends ***** -->

<section
        class="section section-bg"
        id="schedule"
        style="
        background-image: url(assets/images/about-fullscreen-1-1920x700.jpg);
      "
>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading dark-bg">
                    <h2>Who <em>Are We ?</em></h2>
                    <img src="assets/images/line-dec.png" alt=""/>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- ***** Blog Start ***** -->
<section class="section" id="our-classes">
    <div class="container">
        <br>
        <br>
        <br>
        <div class="row" id="tabs">
            <div class="col-lg-4">
                <ul>
                    <li><a href='#tabs-1'><i class="fa fa-soccer-ball-o"></i> Our Goals</a></li>
                    <li><a href='#tabs-2'><i class="fa fa-briefcase"></i> Our Vision</a></a></li>
                </ul>
            </div>
            <div class="col-lg-8">
                <section class='tabs-content'>
                    <article id='tabs-1'>
                        <img src="assets/images/about-image-1-940x460.jpg" alt="">
                        <h4>Our Goals</h4>

                        <p>Develop our application in order to make it the most used carservice in tunisia.</p>

                    </article>
                    <article id='tabs-2'>
                        <img src="assets/images/about-image-2-940x460.jpg" alt="">
                        <h4>Our Vision</h4>
                        <p>Integer dapibus, est vel dapibus mattis, sem mauris luctus leo, ac pulvinar quam tortor a
                            velit. Praesent ultrices erat ante, in ultricies augue ultricies faucibus. Nam tellus nibh,
                            ullamcorper at mattis non, rhoncus sed massa. Cras quis pulvinar eros. Orci varius natoque
                            penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                    </article>
                </section>
            </div>
        </div>
    </div>
</section>
<!-- ***** Blog End ***** -->

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
                    <h2 class="mb-3">Send us a <em>message</em></h2>
                    <div class="main-button">
                        <a href="Contact.php">Contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Call to Action End ***** -->
<?php
include_once './Components/footer.php';
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

<script>
    $(function () {
        setTimeout(() => {
            $('.alert').removeClass('show');

        }, 5000);
    })
</script>
</body>
</html>
