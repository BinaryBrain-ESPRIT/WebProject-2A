<?php
session_start();

include_once __DIR__ . "/../../Model/Product.php";
include_once __DIR__ . "/../../Controller/Product.php";
include_once __DIR__ . "/../../Controller/Cart.php";
include_once __DIR__ . "/../../Controller/CartProduct.php";
include_once __DIR__ . "/../../Model/CartProduct.php";

$productC = new Controller\Product();

$products = $productC->getProducts();
$type = "";
if (isset($_POST['reset'])) {
    $_POST = "";
}
if (isset($_POST['type'])) {
    $type = $_POST['type'];
    $products = $productC->filterProducts($type);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = $productC->getProduct($id);
    $cartC = new Controller\Cart();
    $cartProdC = new Controller\CartProduct();

    $cartC->checkCart($_SESSION['id']);

    $cart = $cartC->getCart($_SESSION['id']);
    $cartProd = new Model\CartProduct(0, $cart['id'], $product['id'], 1, $product['price']);
    $cartProdC->addCartProduct($cartProd);
    $cartC->updateTotalCart($cart['id']);
    header("Location: product.php");
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
            <form method="post">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Car parts:</label>

                            <select name="type">
                                <option value="" <?php if($type == "") echo "selected" ?>>All</option>
                                <option value="clutch"<?php if($type == "clutch") echo "selected" ?> >Clutch</option>
                                <option value="wheel" <?php if($type == "wheel") echo "selected" ?>>Wheel</option>
                                <option value="brake" <?php if($type == "brake") echo "selected" ?>>Brake</option>
                                <option value="Oil" <?php if($type == "Oil") echo "selected" ?>>Oil</option>
                                <option value="radiator"<?php if($type == "Radiator") echo "selected" ?>>Radiator</option>
                                <option value="gas pump"<?php if($type == "Gas pump") echo "selected" ?>>Gas Pump</option>
                                <option value="oil pump"<?php if($type == "Oil pump") echo "selected" ?>>Oil pump</option>
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
                <br>
                <br>
            </form>
        </div>

        <div class="row cars">
            <?php
            foreach ($products as $product) {
                ?>
                <div class="col-lg-4 car">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="uploads/<?= $product['imgURL'] ?>" alt="" style="max-height: 200px">
                        </div>
                        <div class="down-content">
                            <span>
                                <?= $product['price'] ?><sup> DT</sup>
                            </span>

                            <h4><?= $product['name'] ?></h4>

                            <p>
                                <?= $product['brand'] ?>&nbsp;&nbsp;&nbsp;
                            </p>

                            <ul class="social-icons">
                                <li><a href="product.php?id=<?= $product['id'] ?>">+ Add Cart</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>


        </div>

        <br>

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
                    Copyright © 2020 Company Name
                    - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a>
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