<?php
declare(strict_types=1);
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

include_once __DIR__ . "/../../../Controller/User.php";
include_once __DIR__ . "/../../../Controller/ResetPassword.php";
include_once __DIR__ . "/../../../Model/ResetPassword.php";
$userC = new Controller\User();
$resetPasswordC = new Controller\ResetPassword();

//Load Composer's autoloader
require __DIR__ . '/../../vendor/autoload.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$verifCode = rand(1000, 9999);
$error = "";
if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email = $_POST['email'];
    $user = $userC->getUserByEmail($email);
    if (!$user) {
        $error = "No Email found !";
    }
    else{
        $resetPasswordM = new Model\ResetPassword(0,$user['id'] ,$verifCode, '');
        $resetPasswordC->AddResetPassword($resetPasswordM);

        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = 'wiem.benzarti@esprit.tn';                     //SMTP username
            $mail->Password = '211JFT9362';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('contact@binarybrain.com', 'Invoices BinaryBrain');
            $mail->addAddress($email);               //Name is optional

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body = "you verification code is  <b>$verifCode</b>";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
           header("Location: forgot_password.php");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        header('Location: Reset_Password.php?email='.$email);
    }
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
                    <br><p>  An e-mail will be sent to you with instructions on how to reset your password.</p>
                </span>
                <?php if (!empty($error))
                    {
                    ?>
                    <p class="text-danger"><?= $error ?> </p>
                <?php }?>
                <div
                        class="wrap-input100 validate-input"
                        data-validate="Valid email is required: ex@abc.xyz"
                >
                    <input class="input100" type="text" name="email"/>
                    <span class="focus-input100"></span>
                    <span class="label-input100">Email</span>
                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">Receive new password by e-mail</button>
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

