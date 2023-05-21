<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require __DIR__ . '/../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {

        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'mohamedhabiballah.bibani@esprit.tn';                     //SMTP username
        $mail->Password = '211JMT4161';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($_POST['email'], 'Contact');
        $mail->addAddress('mohamedhabiballah.bibani@esprit.tn', 'Contact Binary Brain');     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $_POST['subject'];
        $mail->Body = "Mail From " . $_POST['email'] . "<br/>" . $_POST['message'];

        $mail->send();
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet" />

    <title>PHPJabbers.com | Free Car Dealer Website Template</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="assets/css/font-awesome.css" rel="stylesheet" type="text/css" />

    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
    <!-- ***** Preloader Start ***** -->
    <div class="js-preloader" id="js-preloader">
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
                        <br />
                        <br />
                        <h2>Feel free to <em>Contact Us</em></h2>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="trainers">
        <div class="containe">
            <br />
            <br />
            <div class="row justify-content-center">
                <div class="col-md-3 ">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img alt="" src="assets/images/Habib.jpg" />
                        </div>
                        <div class="down-content">
                            <span>CEO</span>
                            <h4>Mohamed Habib Allah Bibani</h4>
                            <ul class="social-icons">
                                <li>
                                    <a href="https://www.facebook.com/mohamed.habib.allah.bibani/"><i
                                            class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/in/mohamed-habib-allah-bibani-08b966230/"><i
                                            class="fa fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="https://github.com/MohamedHabib79"><i class="fa fa-github"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img alt="" src="assets/images/Wiem.jpg" />
                        </div>
                        <div class="down-content">
                            <span>Customer Support</span>
                            <h4>Wiem Benzarti</h4>

                            <ul class="social-icons">
                                <li>
                                    <a href="https://www.facebook.com/wiem.benzarty2"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/in/wiem-benzarti-b89a2b239/"><i
                                            class="fa fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="https://github.com/wiembz"><i class="fa fa-github"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img alt="" src="assets/images/Oussama.jpg" />
                        </div>
                        <div class="down-content">
                            <span>Customer Support</span>
                            <h4>Oussama Awled Salem</h4>

                            <ul class="social-icons">
                                <li>
                                    <a href="https://www.facebook.com/oussama.salem09"><i
                                            class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/in/oussama-awled-salem-1b6b69221/"><i
                                            class="fa fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="https://github.com/oussamaawledsalem"><i class="fa fa-github"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img alt="" src="assets/images/Oumaima.jpg" />
                        </div>
                        <div class="down-content">
                            <span>Customer Support</span>
                            <h4>Oumaima Sellami</h4>

                            <ul class="social-icons">
                                <li>
                                    <a href="https://www.facebook.com/profile.php?id=100013208254303"><i
                                            class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="https://github.com/oumaimasellami"><i class="fa fa-github"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img alt="" src="assets/images/maher.jpg" />
                        </div>
                        <div class="down-content">
                            <span>Customer Support</span>
                            <h4>Mohamed Maher Grati</h4>

                            <ul class="social-icons">
                                <li>
                                    <a href="https://www.facebook.com/profile.php?id=100007359378142"><i
                                            class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/in/mohamed-maher-grati-576b6b221/"><i
                                            class="fa fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="https://github.com/mahergrati"><i class="fa fa-github"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Item Start ***** -->
    <section class="section" id="features">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>contact <em> info</em></h2>
                        <img alt="waves" src="assets/images/line-dec.png" />
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="icon">
                        <i class="fa fa-phone"></i>
                    </div>

                    <p><a href="#">+216 55 423 195</a></p>

                    <br />
                </div>

                <div class="col-md-4">
                    <div class="icon">
                        <i class="fa fa-envelope"></i>
                    </div>

                    <p><a href="mailto:contact@binarybrain.tn">contact@binarybrain.tn</a></p>

                    <br />
                </div>

                <div class="col-md-4">
                    <div class="icon">
                        <i class="fa fa-map-marker"></i>
                    </div>

                    <p>1, 2 rue André Ampère - 2083 - Pôle Technologique - El Ghazala.</p>

                    <br />
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Item End ***** -->

    <!-- ***** Contact Us Area Starts ***** -->
    <section class="section" id="contact-us" style="margin-top: 0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div id="map">
                        <iframe allowfullscreen frameborder="0" height="600px"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25525.010225207163!2d10.154348479101554!3d36.89928779999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12e2cb7454c6ed51%3A0x683b3ab5565cd357!2sESPRIT!5e0!3m2!1sen!2stn!4v1669457537634!5m2!1sen!2stn"
                            style="border: 0" width="100%"></iframe>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="contact-form section-bg"
                        style="background-image: url(assets/images/contact-1-720x480.jpg)">
                        <form action="" id="contact" method="post">
                            <div class="text-danger"><?php if (isset($error)) echo $error ?></div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <fieldset>
                                        <input id="name" name="name" placeholder="Your Name*" required="" type="text" />
                                    </fieldset>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <fieldset>
                                        <input id="email" name="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email*"
                                            required="" type="text" />
                                    </fieldset>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <fieldset>
                                        <input id="subject" name="subject" placeholder="Subject" type="text" />
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea id="message" name="message" placeholder="Message" required=""
                                            rows="6"></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button class="main-button" id="form-submit" type="submit">
                                            Send Message
                                        </button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Contact Us Area Ends ***** -->

    <?php
    include_once __DIR__ . '/Components/footer.php';
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