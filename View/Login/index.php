<?php
session_start();
include_once __DIR__ . "/../../Controller/User.php";
include_once __DIR__ . "/../../Model/User.php";

if (isset($_POST['captcha'])) {
}

$error = "";
if (isset($_SESSION['email'])) {
    header('Location:../Client/index.php');
}


if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST['captcha'])) {
    $userM = new Model\User(0, $_POST["email"], $_POST["password"], "", 0, "", 0, 0);
    $userC = new Controller\User();
    $user = $userC->login($userM);
    if (!empty($user)) {

        $isBanned = $userC->checkIsBanned($user['id']);


        if ($isBanned == 0 && $_POST['captcha'] == $_SESSION['captcha']) {
            $_SESSION["email"] = $user['email'];
            $_SESSION["name"] = $user['name'];
            $_SESSION["id"] = $user['id'];
            $_SESSION["age"] = $user['age'];
            $_SESSION["isBanned"] = $user['isBanned'];
            $_SESSION['isAdmin'] = $user['isAdmin'];
            header('Location:../Client/index.php?login=success');
        } else if ($_POST['captcha'] != $_SESSION['captcha']) {
            $error = "Captcha Incorrect";
        } else {
            $error = "You are banned";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V18</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <!--===============================================================================================-->
</head>

<body style="background-color: #666666">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="post">
                    <span class="login100-form-title p-b-43"> Login to continue </span>

                    <p class="text-danger"><?= $error ?></p>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" />
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" />
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>

                    <div>
                        <img src="page/captcha.php" alt="captcha" />
                        <input type="text" name="captcha" />
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me" />
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        <div>
                            <a class="nav-link " href="page/forgot_password.php" class="txt2"> Forgot your Password?
                            </a>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">Login</button>
                    </div>

                    <div class="text-center p-t-46 p-b-20">
                        <a class="nav-link " href="page/sign_up.php" class="txt2"> or sign up using </a>
                    </div>

                    <div class="login100-form-social flex-c-m">
                        <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
                            <i class="fa fa-facebook-f" aria-hidden="true"></i>
                        </a>

                        <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>

                <div class="login100-more" style="background-image: url('images/bg-02.jpg')"></div>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
</body>

</html>