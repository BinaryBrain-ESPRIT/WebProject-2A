<?php

include_once __DIR__ . "/../../../../Model/NewCar.php";
include_once __DIR__ . "/../../../../Controller/NewCar.php";

if (isset($_POST['category']) && isset($_POST['brand'] )&& isset($_POST['model']) && isset($_POST['cylinder']) && isset($_POST['energy']) && isset($_POST['fiscalPower']) && isset($_POST['gearbox']) && isset($_POST['availability']) && isset($_POST['guarantee'])) {
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $cylinder = $_POST['cylinder'];
    $energy = $_POST['energy'];
    $fiscalPower = $_POST['fiscalPower'];
    $gearbox = $_POST['gearbox'];
    $availability = $_POST['availability'];
    $guarantee = $_POST['guarantee'];

    $car = new Model\NewCar($category, $brand, $model, $cylinder, $energy, $fiscalPower, $gearbox, $availability, $guarantee);
    $carC = new Controller\NewCar();
    $carC->addCar($car);
    header('location: Add_NewCar.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>Karhabti TN | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
            rel="stylesheet"
    />
    <!-- Font Awesome -->
    <link href="../../plugins/fontawesome-free/css/all.min.css" rel="stylesheet"/>
    <!-- Ionicons -->
    <link
            href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
            rel="stylesheet"
    />
    <!-- Tempusdominus Bootstrap 4 -->
    <link
            href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"
            rel="stylesheet"
    />
    <!-- iCheck -->
    <link
            href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css"
            rel="stylesheet"
    />
    <!-- JQVMap -->
    <link href="../../plugins/jqvmap/jqvmap.min.css" rel="stylesheet"/>
    <!-- Theme style -->
    <link href="../../dist/css/adminlte.min.css" rel="stylesheet"/>
    <!-- overlayScrollbars -->
    <link
            href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css"
            rel="stylesheet"
    />
    <!-- Daterange picker -->
    <link href="../../plugins/daterangepicker/daterangepicker.css" rel="stylesheet"/>
    <!-- summernote -->
    <link href="../../plugins/summernote/summernote-bs4.min.css" rel="stylesheet"/>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Preloader -->
    <div
            class="preloader flex-column justify-content-center align-items-center"
    >
        <img
                alt="AdminLTELogo"
                class="animation__shake"
                height="60"
                src="../../dist/img/AdminLTELogo.png"
                width="60"
        />
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"
                ><i class="fas fa-bars"></i
                ></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a class="nav-link" href="../../index.html">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a class="nav-link" href="#">Contact</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <a
                        class="nav-link"
                        data-widget="navbar-search"
                        href="#"
                        role="button"
                >
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input
                                    aria-label="Search"
                                    class="form-control form-control-navbar"
                                    placeholder="Search"
                                    type="search"
                            />
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button
                                        class="btn btn-navbar"
                                        data-widget="navbar-search"
                                        type="button"
                                >
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a class="dropdown-item" href="#">
                        <!-- Message Start -->
                        <div class="media">
                            <img
                                    alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle"
                                    src="../../dist/img/user1-128x128.jpg"
                            />
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"
                                    ><i class="fas fa-star"></i
                                    ></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted">
                                    <i class="far fa-clock mr-1"></i> 4 Hours Ago
                                </p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <!-- Message Start -->
                        <div class="media">
                            <img
                                    alt="User Avatar"
                                    class="img-size-50 img-circle mr-3"
                                    src="../../dist/img/user8-128x128.jpg"
                            />
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"
                                    ><i class="fas fa-star"></i
                                    ></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted">
                                    <i class="far fa-clock mr-1"></i> 4 Hours Ago
                                </p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <!-- Message Start -->
                        <div class="media">
                            <img
                                    alt="User Avatar"
                                    class="img-size-50 img-circle mr-3"
                                    src="../../dist/img/user3-128x128.jpg"
                            />
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"
                                    ><i class="fas fa-star"></i
                                    ></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted">
                                    <i class="far fa-clock mr-1"></i> 4 Hours Ago
                                </p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item dropdown-footer" href="#"
                    >See All Messages</a
                    >
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header"
              >15 Notifications</span
              >
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item dropdown-footer" href="#"
                    >See All Notifications</a
                    >
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a
                        class="nav-link"
                        data-controlsidebar-slide="true"
                        data-widget="control-sidebar"
                        href="#"
                        role="button"
                >
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a class="brand-link" href="../../index.html">
            <img
                    alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3"
                    src="../../dist/img/AdminLTELogo.png"
                    style="opacity: 0.8"
            />
            <span class="brand-text font-weight-light">Karhabti TN</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img
                            alt="User Image"
                            class="img-circle elevation-2"
                            src="../../dist/img/user2-160x160.jpg"
                    />
                </div>
                <div class="info">
                    <a class="d-block" href="#">Alexander Pierce</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input
                            aria-label="Search"
                            class="form-control form-control-sidebar"
                            placeholder="Search"
                            type="search"
                    />
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul
                        class="nav nav-pills nav-sidebar flex-column"
                        data-accordion="false"
                        data-widget="treeview"
                        role="menu"
                >
                    <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                    <li class="nav-item ">
                        <a class="nav-link " href="#">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <!--                    <i class="right fas fa-angle-left"></i>-->
                            </p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a class="nav-link " href="../../pages/User/Add_User.html">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Cars
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a class="nav-link active" href="../../pages/User/Add_User.html">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../../pages/User/Add_User.html">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Admin</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../../pages/User/Display_User.html">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Cars List</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Cars</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Cars</li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Car</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputCatg1">Categorie</label>
                                        <input class="form-control" id="exampleInputCatg1" placeholder="Entrer Categorie"
                                               type="text" name="category">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputBrand1">Marque</label>
                                        <input class="form-control" id="exampleInputBrand1" placeholder="Entrer Marque"
                                               type="text" name="brand">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputModel1">Modele</label>
                                        <input class="form-control" id="exampleInputModel1" placeholder="Entrer Modele"
                                               type="text" name="model">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputCylindre1">Cylindrie</label>
                                        <input class="form-control" id="exampleInputCylindre1" max="100"
                                               min="1" placeholder="Entrer Cylindre" type="number" name="cylinder">
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputEnergie1">Energie</label> <select class="form-control select2 select2-hidden-accessible" Energie="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <option selected="selected">Alabama</option>
                                        <option>Alaska</option>
                                        <option>California</option>
                                        <option>Delaware</option>
                                        <option>Tennessee</option>
                                        <option>Texas</option>
                                        <option>Washington</option>
                                     
                                        </select> </div> 
                                    </div>  
                                    <div class="form-group">
                                    <label for="exampleInputPF1">Puissance Fiscale</label>
                                    <input class="form-control" id="exampleInputPF1" max="100"
                                               min="1" placeholder="Entrer Puissance Fiscale" type="number" name="fiscalPower">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputGB1">Boite Vitesse</label>
                                        <input class="form-control" id="exampleInputGB1" max="100"
                                               min="1" placeholder="Entrer Boite Vitesse" type="text" name="gearbox">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputDisp1">Disponibilite</label>
                                        <input class="form-control" id="exampleInputDisp1" max="100"
                                               min="1" placeholder="Enter Age" type="number" name="availability">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputGuar1">Guarantie</label>
                                        <input class="form-control" id="exampleInputGuar1" max="100"
                                               min="1" placeholder="Enter Age" type="number" name="guarantee">
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer class="main-footer">
        <strong
        >Copyright &copy; 2014-2021
            <a href="https://adminlte.io">AdminLTE.io</a>.</strong
        >
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
        </div>
    </footer>

    <aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge("uibutton", $.ui.button);
</script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard.js"></script>
</body>
</html>
