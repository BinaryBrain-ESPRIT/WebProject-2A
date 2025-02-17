<?php
declare(strict_types=1);

session_start();

require __DIR__ . '/../vendor/autoload.php';

include_once __DIR__ . "/../../Controller/Cart.php";
include_once __DIR__ . "/../../Controller/CartProduct.php";
include_once __DIR__ . "/../../Controller/Command.php";
include_once __DIR__ . "/../../Controller/CommandProduct.php";
include_once __DIR__ . "/../../Controller/Product.php";

include_once __DIR__ . "/../../Model/Cart.php";
include_once __DIR__ . "/../../Model/CartProduct.php";
include_once __DIR__ . "/../../Model/Command.php";
include_once __DIR__ . "/../../Model/CommandProduct.php";

$cartC = new Controller\Cart();
$cartProdC = new Controller\CartProduct();
$commandC = new Controller\Command();
$commandProdC = new Controller\CommandProduct();
$productC = new Controller\Product();

//Init
$nbItems = 0;
$warning = "";
$error = "";

//Check if user is connected
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
}

//check if cart exists for user and create it if not exists
$cartC->checkCart($_SESSION['id']);

//Get cart
$cart = $cartC->getCart($_SESSION['id']);
$cartC->updateTotalCart($cart['id']);

//Get cart products
$cartProducts = $cartProdC->getCartProducts($cart['id']);

$nbItems = count($cartProducts);

if (isset($_GET['id'])) {
    $cartProdC->deleteCartProduct((int)$_GET['id']);
    $cartC->updateTotalCart($cart['id']);
    header("Location: Cart.php");
}

if (isset($_POST['checkout']) && count($cartProducts) > 0) {

    $commandM = new Model\Command(0, $_SESSION['id'], $cart['total'], '');

    $idCommand = $commandC->addCommand($commandM);

    if ($idCommand) {
        foreach ($cartProducts as $cartProd) {
            $commandProdM = new Model\CommandProduct(0, (int)$idCommand, $cartProd['idProduct'], $cartProd['qte']);
            $commandProdC->addProductCommand($commandProdM);
        }
        $cartProdC->deleteCartProducts($cart['id']);
        $cartC->updateTotalCart($cart['id']);

        header("Location: facture.php?email=true");
    } else
        $error = "Error while adding command";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
          rel="stylesheet">

    <title>PHPJabbers.com | Free Car Dealer Website Template</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/cart.css">
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
                include 'Components/navbar.php';
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
                    <h2>Check your <em>Cart</em></h2>
                    <!--<p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p>-->
                </div>
            </div>
        </div>
    </div>
</section>

<div class="card mt-5">
    <div class="row">
        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col"><h4><b>Shopping Cart</b></h4></div>
                    <div class="col align-self-center text-right text-muted"><?= $nbItems ?> items</div>
                </div>
            </div>
            <?php
            if (count($cartProducts) > 0)
                foreach ($cartProducts as $cartProd) {
                    $product = $productC->getProduct($cartProd['idProduct']);
                    if (isset($_GET['action']) && $_GET['idCp'] == $cartProd['id']) {
                        if ($_GET['action'] == 'inc') {
                            $cartProd['qte']++;
                        } else if ($_GET['action'] == 'dec') {
                            $cartProd['qte']--;
                        }
                        $cartProdC->updateCartProduct($cartProd);

                        echo "<script>window.location.href='Cart.php'</script>";
                    }
                    ?>
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid" src="./assets/images/roue.jpg"></div>
                            <div class="col">
                                <div class="row text-muted"><?= $product['brand'] ?></div>
                                <div class="row"><?= $product['name'] ?></div>
                            </div>
                            <div class="col">
                                <a href="Cart.php?action=dec&idCp=<?= $cartProd['id'] ?>">-</a><a href="#"
                                                                                                class="border"><?= $cartProd['qte'] ?></a><a
                                        href="Cart.php?action=inc&idCp=<?= $cartProd['id'] ?>">+</a>
                            </div>
                            <div class="col">&euro; <?= $product['price'] ?><a
                                        href="Cart.php?id=<?= $cartProd['id']; ?>&idProd=<?= $cartProd['idProduct'] ?>"
                                        class="close">&#10005;</a>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                ?>
                <div class="d-flex justify-content-center" style="margin: 130px 0">
                    <h2 class="text-info">Panier Vide</h2>
                </div>
                <?php

            }
            ?>
            <div class="back-to-shop"><a href="#">&leftarrow;</a><a href="index.php" class="text-muted">Back to shop</a>
            </div>
        </div>
        <div class="col-md-4 summary">
            <div><h5><b>Summary</b></h5></div>
            <hr>
            <?php
            if (isset($_POST['codePromo']) && $_POST['codePromo'] == "KarhbatiTN") {
                $cart['total'] -= $cart['total'] * 0.5;
                $cartC->updateTotal($cart['total'], $_SESSION['id']);
            }
            ?>
            <div class="row">
                <div class="col" style="padding-left:0;">ITEMS: <?= $nbItems ?></div>
                <div class="col text-right"><?= $cart['total'] ?><sup> DT</sup></div>
            </div>
            <form method="post">
                <p>GIVE CODE</p>
                <input id="code" name="codePromo" placeholder="Enter your code">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn-outline-success ">Pass PromoCode</button>
                </div>
            </form>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">TOTAL PRICE</div>
                <div class="col text-right">&euro; <?= $cart['total'] ?></div>
            </div>
            <form method="post">
                <button type="submit" name="checkout" class="btn">CHECKOUT</button>
            </form>
        </div>
    </div>

</div>

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
