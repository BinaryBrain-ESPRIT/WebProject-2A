<?php

declare(strict_types=1);

include_once __DIR__ . "/../../../Controller/User.php";
include_once __DIR__ . "/../../../Controller/ResetPassword.php";
include_once __DIR__ . "/../../../Model/ResetPassword.php";

$userC = new Controller\User();
$resetPasswordC = new Controller\ResetPassword();

if(isset($_POST['Verif_Code'])&&isset($_POST['New_Password']) && isset($_POST['Confirm']))
{

    $user = $userC->getUserByEmail($_GET['email']);

    $verifCode = (int)$_POST['Verif_Code'];

    $idUser = $user['id'];

    $resetPasswordM = new Model\ResetPassword(0,$idUser ,$verifCode, '');
    $resetPassword = $resetPasswordC->checkVerifCode($resetPasswordM, md5($_POST['New_Password']));

    header('Location:../index.php');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V18</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link
            rel="stylesheet"
            type="text/css"
            href="../vendor/bootstrap/css/bootstrap.min.css"
                />
    <!--===============================================================================================-->
    <link
            rel="stylesheet"
            type="text/css"
            href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css"
                />
    <!--===============================================================================================-->
    <link
            rel="stylesheet"
            type="text/css"
            href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css"
                />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css"/>
    <!--===============================================================================================-->
    <link
            rel="stylesheet"
            type="text/css"
            href="../vendor/css-hamburgers/hamburgers.min.css"
                />
    <!--===============================================================================================-->
    <link
            rel="stylesheet"
            type="text/css"
            href="../vendor/animsition/css/animsition.min.css"
                />
    <!--===============================================================================================-->
    <link
            rel="stylesheet"
            type="text/css"
            href="../vendor/select2/select2.min.css"
                />
    <!--===============================================================================================-->
    <link
            rel="stylesheet"
            type="text/css"
            href="../vendor/daterangepicker/daterangepicker.css"
                />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/util.css"/>
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
    <!--===============================================================================================-->
</head>
<body style="background-color: #666666">
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="post">
                <span class="login100-form-title p-b-43"> Reset Password <br>
                </span>
                <div
                        class="wrap-input100 validate-input"
                            >
                    <input class="input100" type="text" name="Verif_Code"/>
                    <span class="focus-input100"></span>
                    <span class="label-input100">Verification Code</span>
                </div>
                <div
                    class="wrap-input100 validate-input"
                >
                    <input class="input100" type="text" name="New_Password"/>
                    <span class="focus-input100"></span>
                    <span class="label-input100">New Password</span>
                </div>
                <div
                    class="wrap-input100 validate-input"
                >
                    <input class="input100" type="text" name="Confirm"/>
                    <span class="focus-input100"></span>
                    <span class="label-input100">Confirm New Password</span>
                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">Update Password</button>
                </div>
            </form>

            <div
                    class="login100-more"
                    style="background-image: url('../images/bg-02.jpg')"
                        ></div>
        </div>
    </div>
</div>

<!--===============================================================================================-->
<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="../vendor/bootstrap/js/popper.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="../vendor/daterangepicker/moment.min.js"></script>
<script src="../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="../js/main.js"></script>
</body>
</html>


