<?php

session_start();

use Dompdf\Dompdf;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

include_once __DIR__ . "/../../Controller/Command.php";
include_once __DIR__ . "/../../Model/Command.php";

include_once __DIR__ . "/../../Controller/CommandProduct.php";
include_once __DIR__ . "/../../Model/CommandProduct.php";

include_once __DIR__ . "/../../Controller/Product.php";
include_once __DIR__ . "/../../Model/Product.php";

require __DIR__ . '/../vendor/autoload.php';

$commandC = new Controller\Command();
$command = $commandC->getCommand($_SESSION['id']);
$commandProdC = new Controller\CommandProduct();
$commandProducts = $commandProdC->getCommandProduct($command['id']);
$productC = new Controller\Product();

$email = $_SESSION['email'];
$name = $_SESSION['name'];

$body = "
    <!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'/>
    <title>A simple, clean, and responsive HTML invoice template</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
        .printButton{
            width: 100px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;   
        }
        .returnButton{
            width: 100px;
            padding: 10px 20px;
            background-color: #d7d7d7;
            color: black;
            border: none;
            border-radius: 4px;
            cursor: pointer;  
            margin-right: 10px;px;
        }
    </style>
</head>

<body>
<div class='invoice-box'>
    <table cellpadding='0' cellspacing='0'>
        <tr class='top'>
            <td colspan='2'>
                <table>
                    <tr>
                        <td class='title'>
                            <img style='height: 150px' src='https://i.imgur.com/y8soGBD.png' alt='logo'>
                        </td>

                        <td>
                            Invoice: #" . $command['id'] . " <br/>
                            Date: " . $command['date'] . "<br/>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class='information'>
            <td colspan='2'>
                <table>
                    <tr>
                        <td>
                            Sparksuite, Inc.<br/>
                            12345 Sunny Road<br/>
                            Sunnyville, CA 12345
                        </td>

                        <td>
                            Name: $name <br/>
                             $email
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class='heading'>
            <td>Item</td>

            <td>Price</td>
        </tr>
        ";
foreach ($commandProducts as $commandProduct) {
    $product = $productC->getProduct($commandProduct['idProduct']);
    $nameProduct = $product['name'];
    $priceProduct = $product['price'];
    $body .= "
            <tr class='item'>
                <td>$nameProduct</td>

                <td> $priceProduct <sup > DT</sup ></td>
            </tr>
            ";
}

$commandTotal = $command['total'];

$body .= "
<tr class='total'>
    <td></td>

    <td>Total:  $commandTotal<sup> DT</sup></td>
</tr>
</table>
<div style='display: flex;justify-content: center'>
    <a href='/project2223_2a11-binarybrain_2a11/View/Client'>
        <button class='returnButton'>Return</button>
    </a>
    <a href='/project2223_2a11-binarybrain_2a11/View/Client/facture.php?print=true'>
        <button class='printButton'>Print</button>
    </a>
</div>
</div>
</body>
</html>

";

if (isset($_GET['email'])) {
    $mail = new PHPMailer(true);
    try {
//Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'mohamedhabiballah.bibani@esprit.tn';                     //SMTP username
        $mail->Password = '211JMT4161';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//Recipients
        $mail->setFrom('contact@binarybrain.com', 'Invoices BinaryBrain');
        $mail->addAddress($_SESSION['email']);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Invoice KARHABTI TN';
        $mail->Body = $body;
        $mail->send();
        echo "<script> window.location.href = 'facture.php' </script>";
    } catch (Exception $e) {
        $error = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if (isset($_GET['print'])) {
    $dompdf = new Dompdf();
    $dompdf->loadHtml($body);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream("invoice.pdf");
    echo "<script> window.location.href = 'facture.php' </script>";
}
echo $body;




