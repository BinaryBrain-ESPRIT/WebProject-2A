<?php
session_start();
include_once __DIR__ . './../../../controller/User.php';
include_once __DIR__ . './../../../Model/User.php';

if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["name"]) && isset($_POST["age"])) {
    $user = new Model\User((int)null, $_POST["email"], $_POST["password"], $_POST["name"], (int)$_POST["age"], '', 0, 0);
    $userC = new Controller\User();
    $userC->addUser($user);
    header('Location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Karhabti TN SIGNUP </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="./../css/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
    <div class="navigation">
        <ol>
            <li><a href="#" data-ref="name">Name</a></li>
            <li><a href="#" data-ref="email">Email</a></li>
            <li><a href="#" data-ref="viewpswd">Password</a></li>
            <li><a href="#" data-ref="phone">age</a></li>
        </ol>
    </div>
    <form id="sign-form" class="sign-form" method="post">
        <ol class="questions">
            <li>
                <span><label for="name">Hi, What is your Name?</label></span>
                <input class="active" id="name" name="name" type="text" placeholder="Enter your full name" autofocus/>
            </li>
            <li>
                <span><label for="email">Enter you email</label></span>
                <input id="email" name="email" type="text" placeholder="Email" autofocus/>
            </li>
            <li>
                <span><label for="password">Choose a password</label></span>
                <input id="viewpswd" name="password" type="text" placeholder="this your password"/>
                <input id="password" name="password" type="password" placeholder="make sure you dont forget" autofocus/>
                <span id="show-pwd" class="view"></span>
            </li>
            <li>
                <span><label for="age">Enter your age</label></span>
                <input id="age" name="age" type="text" placeholder="this your age" autofocus/>
            </li>
            <li>
                <p style="margin-top: 45px;font-size: 32pt;float:right">
                    <button style="background: transparent; border: transparent">  <a class="nav-link" type="submit" style="color:white;text-decoration:none" id="signup">
                            sign up
                        </a>
                    </button>
                </p>
            </li>


        </ol>
        <div id="next-page" alt="Kiwi standing on oval"></div>
        <div class="error-message"></div>

    </form>
    <?php ?>
    <h1 id="wf" style="opacity:0;width: 600px; margin-top:1.1em;display:none; margin-bottom:1em">Thank you</h1>

    <!-- partial -->

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src="../js/singUP.js"></script>

</body>

</html>
