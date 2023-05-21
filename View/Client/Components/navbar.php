<nav class="main-nav">
    <!-- ***** Logo Start ***** -->
    <a href="index.php" class="logo">Karhabti<em> TN</em></a>
    <!-- ***** Logo End ***** -->
    <!-- ***** Menu Start ***** -->
    <ul class="nav">
        <li><a href="maintenance.php">Maintenance</a></li>
        <li class="dropdown">
            <a
                    class="dropdown-toggle"
                    data-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-haspopup="true"
                    aria-expanded="false"
            > Cars</a>

            <div class="dropdown-menu">
                <a class="dropdown-item" href="NewCars.php">New Cars</a>
                <a class="dropdown-item" href="UsedCars.php">Used Cars</a>
                <?php if (isset($_SESSION['email'])) echo "<a class='dropdown-item' href='AddUsedCars.php'>Add Used Car</a>" ?>
            </div>

        </li>
        <li><a href="product.php">Piece</a></li>
        <li><a href="Cart.php">Cart</a></li>
        <li class="dropdown">
            <a
                    class="dropdown-toggle"
                    data-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-haspopup="true"
                    aria-expanded="false"
            > Profile</a>

            <div class="dropdown-menu">
                <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']) echo "<a class='dropdown-item mb-2' href='../Server/index.php'>Dashboard</a>" ?>
                <?php if (!isset($_SESSION['email'])) echo "<a class='dropdown-item mb-2' href='../Login/index.php'>Login</a>" ?>
                <?php if (isset($_SESSION['email'])) echo "<a class='dropdown-item mb-2' href='index.php?action=logout'>Logout</a>" ?>
            </div>

        </li>
    </ul>
    <a class="menu-trigger">
        <span>Menu</span>
    </a>
    <!-- ***** Menu End ***** -->
</nav>