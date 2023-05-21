<?php
session_start();
include_once __DIR__ . "/../../Controller/UsedCar.php";
include_once __DIR__ . "/../../Controller/Post.php";
include_once __DIR__ . "/../../Model/UsedCar.php";
include_once __DIR__ . "/../../Model/Post.php";

$carC = new Controller\UsedCar();
$postC = new Controller\Post();

if (isset($_POST['submit'])) {

    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            $fileNameNew = uniqid('', true) . "." . $fileActualExt;
            $fileDestination = 'uploads/' . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }

    $car = new Model\UsedCar(0, $_POST['category'], $_POST['brand'], $_POST['model'], $_POST['cylinder'], $_POST['energy'], $_POST['fiscalPower'], $_POST['gearbox'], $_POST['registerNumber'], $_POST['year'], $_POST['kilometers'], $fileNameNew);

    $car->id = $carC->addCar($car);

    $post = new Model\Post();
    $post->idCar = $car->id;
    $post->idUser = $_SESSION['id'];
    $post->price = $_POST['price'];
    $post->date = date("Y-m-d");
    $postC->addPost($post);

    header("Location: ../../View/Client/UsedCars.php");
}


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
<section
        class="section section-bg"
        id="call-to-action"
        style="background-image: url(assets/images/banner-image-1-1920x500.jpg)"
>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br/>
                    <br/>
                    <h2>Sell <em>Cars</em></h2>
                    <p>
                        Ut consectetur, metus sit amet aliquet placerat, enim est
                        ultricies ligula
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Call to Action End ***** -->

<!-- ***** Fleet Starts ***** -->
<section class="section" id="trainers">
    <div class="container d-flex justify-content-center mt-lg-5">
        <form class="border p-4 col-6" method="post" id="usedCarForm" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="carCategory">Category</label>
                    <input class="form-control"
                           placeholder="Enter the Category" type="text" name="category"
                           id="carCategory">
                </div>
                <div class="form-group">
                    <label for="carBrand">Brand</label>
                    <br>
                    <select class="form-control" name="brand" id="carBrand">
                        <option value="">-- Select Brand --</option>
                        <option value="BMW">BMW</option>
                        <option value="Mercedes-Benz">Mercedes-Benz</option>
                        <option value="Land Rove">Land Rover</option>
                        <option value="Volkswagen">Volkswagen</option>
                        <option value="Toyota">Toyota</option>
                        <option value="KIA">KIA</option>
                        <option value="Hyundai">Hyundai</option>
                        <option value="Audi">Audi</option>
                        <option value="Peugeot">Peugeot</option>
                        <option value="Renault">Renault</option>
                        <option value="Seat">Seat</option>
                        <option value="Citroën">Citroën</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="carModel">Model</label>
                    <input class="form-control"
                           placeholder="Enter" type="text" name="model" id="carModel">
                </div>
                <div class="form-group">
                    <label for="carCylinder">Cylinder</label>
                    <br>
                    <input class="form-control" placeholder="Enter Num of Cylinder" type="number"
                           name="cylinder" id="carCylinder">
                </div>
                <div class="form-group">
                    <label for="carEnergy">Energy</label>
                    <br>
                    <select class="form-control" name="energy" id="carEnergy">
                        <option value="">-- Energy --</option>
                        <option value="Essence">Essence</option>
                        <option value="Diesel">Diesel</option>
                        <option value="Hybride">Hybride</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="carFiscalPow">Fiscal Power</label>
                    <input class="form-control"
                           placeholder="Enter the fiscal power" type="number" name="fiscalPower"
                           id="carFiscalPow">
                </div>
                <div class="form-group">
                    <label for="cargearbox">gearbox</label>
                    <br>
                    <select class="form-control" name="gearbox" id="cargearbox">
                        <option value="">-- Gear Box --</option>
                        <option value="Automatic">Automatic</option>
                        <option value="Manual">Manual</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="carRegNum">Register Number</label>
                    <input class="form-control" placeholder="123 TUN 456" type="text"
                           name="registerNumber" id="carRegNum">
                </div>
                <div class="form-group">
                    <label for="carYear">Year</label>
                    <input class="form-control" placeholder="Enter the year" type="number"
                           name="year" id="carYear">
                </div>
                <div class="form-group">
                    <label for="exampleInputGuar1">Kilometers</label>
                    <input class="form-control" placeholder="Enter the kilometer" type="number"
                           name="kilometers">
                </div>
                <div class="form-group">
                    <label for="exampleInputGuar1">Price</label>
                    <input class="form-control" placeholder="Enter the Price" type="number" step="0.1"
                           name="price">
                </div>
                <div class="form-group">
                    <label for="exampleInputGuar1">File</label>
                    <input class="form-control" type="file" name="file">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>
<!-- ***** Fleet Ends ***** -->

<?php
include_once 'Components/footer.php';
?>
<!-- jQuery -->
<script src="assets/js/jquery-2.1.0.min.js"></script>

<!-- jquery-validation -->
<script src="assets/js/jquery-validation/jquery.validate.min.js"></script>
<script src="assets/js/jquery-validation/additional-methods.min.js"></script>

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
        $("#usedCarForm").validate({
            rules: {
                category: {
                    required: true,
                },
                brand: {
                    required: true,
                },
                model: {
                    required: true,
                },
                cylinder: {
                    required: true,
                    min: 2,
                    max: 10
                },
                energy: {
                    required: true,
                },
                fiscalPower: {
                    required: true,
                    number: true,
                    min: 4,
                    max: 50
                },
                gearbox: {
                    required: true,
                },
                registerNumber: {
                    required: true,
                    registerNum: true
                },
                year: {
                    required: true,
                    number: true,
                    min: 1990,
                    max: 2022
                },
                kilometers: {
                    required: true,
                    number: true,
                    min: 1,
                    max: 1000000
                },
                price: {
                    required: true,
                    number: true,
                    min: 1000,
                    max: 1000000
                }

            },
            messages: {
                category: {
                    required: "Please select a category",
                },
                brand: {
                    required: "Please select a brand",
                },
                model: {
                    required: "Please enter a model",
                },
                cylinder: {
                    required: "Please enter a cylinder",
                    min: "Please enter a valid cylinder",
                    max: "Please enter a valid cylinder"
                },
                energy: {
                    required: "Please select an energy",
                },
                fiscalPower: {
                    required: "Please enter a fiscal power",
                    number: "Please enter a valid fiscal power",
                },
                gearbox: {
                    required: "Please select a gear box",
                },
                registerNumber: {
                    required: "Please enter a register number",
                    // pattern: "Please enter a valid register number"
                },
                year: {
                    required: "Please enter a year",
                    number: "Please enter a valid year",
                    min: "Please enter a valid year",
                    max: "Please enter a valid year",
                    year: true,
                },
                kilometers: {
                    required: "Please enter a kilometer",
                    number: "Please enter a valid kilometer",
                    min: "Please enter a valid kilometer",
                    max: "Please enter a valid kilometer"
                },
                price: {
                    required: "Please enter a price",
                    number: "Please enter a valid price",
                    min: "Please enter a valid price",
                    max: "Please enter a valid price"
                }
            },
            errorElement: "span",
            errorPlacement: function (error, element) {
                error.addClass("invalid-feedback");
                element.closest(".form-group").append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass("is-invalid");
            },
        });
    });

    jQuery.validator.addMethod("registerNum", function (value, element) {
        return this.optional(element) || /\b([0-9]|[1-9][0-9]|[1-9][0-9][0-9])\b TUN \b([0-9]|[1-9][0-9]|[1-9][0-9][0-9]|[1-9][0-9][0-9][0-9])\b/.test(value);
    }, "Please specify the correct Registration Number EX: 123 TUN 456");
</script>

</body>
</html>
