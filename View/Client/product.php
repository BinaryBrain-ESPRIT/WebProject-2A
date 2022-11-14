<?php
include_once __DIR__ . "/../../Model/Product.php";
include_once __DIR__ . "/../../Controller/Product.php";

$productC = new Controller\Product();

$products = $productC->getProducts();
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
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">Car Dealer<em> Website</em></a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="dropdown">
                            <a
                                    class="dropdown-toggle"
                                    data-toggle="dropdown"
                                    href="#"
                                    role="button"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                            > About</a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="about.html">About Us</a>
                                <a class="dropdown-item" href="blog.html">Blog</a>
                                <a class="dropdown-item" href="team.html">Team</a>
                                <a class="dropdown-item" href="testimonials.html">Testimonials</a>
                                <a class="dropdown-item" href="faq.html">FAQ</a>
                                <a class="dropdown-item" href="terms.html">Terms</a>
                            </div>
                        </li>
                        <li><a href="maintenance.html">Maintenance</a></li>
                        <li><a href="product.php" class="active">Piece</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="panier.php">Panier</a></li>
                    </ul>
                    <a class="menu-trigger">
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
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
                    <h2>Our <em>Products</em></h2>
                    <p>La meillerure application web automobile</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Call to Action End ***** -->

<!-- ***** Fleet Starts ***** -->
<section class="section" id="trainers">
    <div class="container">
        <br>
        <br>
        <div class="contact-form">
            <form action="#" id="contact">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Used/New:</label>

                            <select>
                                <option value="">All</option>
                                <option value="new">New vehicle</option>
                                <option value="used">Used vehicle</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Vehicle Type:</label>

                            <select>
                                <option value="">--All --</option>
                                <option value="">--All --</option>
                                <option value="">--All --</option>
                                <option value="">--All --</option>
                                <option value="">--All --</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Make:</label>

                            <select>
                                <option value="">-- All --</option>
                                <option value="">-- All --</option>
                                <option value="">-- All --</option>
                                <option value="">-- All --</option>
                                <option value="">-- All --</option>
                                <option value="">-- All --</option>
                                <option value="">-- All --</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Model:</label>

                            <select>
                                <option value="">-- All --</option>
                                <option value="">-- All --</option>
                                <option value="">-- All --</option>
                                <option value="">-- All --</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-sm-4 offset-sm-4">
                        <div class="main-button text-center">
                            <a href="#">Search</a>
                        </div>
                    </div>
                    <br>
                    <br>
            </form>
        </div>

        <div class="row">
            <?php
            foreach ($products as $product) {
                ?>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/product-1-720x480.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <span>
                                <sup>$</sup><?= $product['price'] ?>
                            </span>

                            <h4><?= $product['name']?></h4>

                            <p>
                                <?=$product['brand'] ?>&nbsp;&nbsp;&nbsp;
                            </p>

<!--                            <ul class="social-icons">-->
<!--                                <li><a href="car-details.html">+ View Car</a></li>-->
<!--                            </ul>-->
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>


        </div>

        <br>

        <nav>
            <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
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