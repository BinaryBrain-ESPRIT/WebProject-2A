<?php

class Sidebar
{
    public array $var;

    public function __construct(array $var)
    {
        $this->var = $var;
    }

    public function displaySideBar()
    {
        echo " "
        ?>
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a class="brand-link" href="/project2223_2a11-binarybrain_2a11/View/Server/">
                <img
                        alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3"
                        src="/project2223_2a11-binarybrain_2a11/View/Server/dist/img/AdminLTELogo.png"
                        style="opacity: 0.8"
                />
                <span class="brand-text font-weight-light">Karhabti TN</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
                    <div class="image">
                        <img
                                alt="User Image"
                                class="img-circle elevation-2"
                                src="/project2223_2a11-binarybrain_2a11/View/Server/dist/img/user2-160x160.jpg"
                        />
                    </div>
                    <div class="info">
                        <a class="d-block" href="#"><?= $_SESSION['name'] ?></a>
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
                            <a class="nav-link <?= $this->var['Dashboard']['status'] ?>"
                               href=<?= $this->var['Dashboard']['link'] ?>>
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item  <?= $this->var['New Car']['status'] ?>">
                            <a class="nav-link">
                                <i class="nav-icon fas fa-car"></i>
                                <p>
                                    New Cars
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a class="nav-link  <?= $this->var['New Car']['status1'] ?>"
                                       href=<?= $this->var['New Car']['link1'] ?>>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add New Cars</p>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  <?= $this->var['New Car']['status2'] ?>"
                                       href=<?= $this->var['New Car']['link2'] ?>>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>New Cars List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  <?= $this->var['Used Car']['status'] ?>">
                            <a class="nav-link">
                                <i class="nav-icon fas fa-car"></i>
                                <p>
                                    Used Cars
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a class="nav-link <?= $this->var['Used Car']['status1'] ?>"
                                       href=<?= $this->var['Used Car']['link1'] ?>>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Used Cars</p>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= $this->var['Used Car']['status2'] ?>"
                                       href=<?= $this->var['Used Car']['link2'] ?>>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Used Cars List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  <?= $this->var['Users']['status'] ?>">
                            <a class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Users
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a class="nav-link  <?= $this->var['Users']['status1'] ?>"
                                       href=<?= $this->var['Users']['link1'] ?>>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add User </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  <?= $this->var['Users']['status2'] ?>"
                                       href=<?= $this->var['Users']['link2'] ?>>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Users List</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item  <?= $this->var['Products']['status'] ?>">
                            <a class="nav-link">
                                <i class="nav-icon fab fa-product-hunt"></i>
                                <p>
                                    Products
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a class="nav-link  <?= $this->var['Products']['status1'] ?>"
                                       href=<?= $this->var['Products']['link1'] ?>>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Product </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  <?= $this->var['Products']['status2'] ?>"
                                       href=<?= $this->var['Products']['link2'] ?>>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Products List</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item  <?= $this->var['Commands']['status'] ?>">
                            <a class="nav-link">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>
                                    Commands
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a class="nav-link  <?= $this->var['Commands']['status1'] ?>"
                                       href=<?= $this->var['Commands']['link1'] ?>>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Commands List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  <?= $this->var['Commands']['status2'] ?>"
                                       href=<?= $this->var['Commands']['link2'] ?>>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Commands Stats</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item  <?= $this->var['Maintenance']['status'] ?>">
                            <a class="nav-link">
                                <i class="nav-icon fa fa-book"></i>
                                <p>
                                    Maintenance
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a class="nav-link  <?= $this->var['Maintenance']['status1'] ?>"
                                       href=<?= $this->var['Maintenance']['link1'] ?>>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Maintenance</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  <?= $this->var['Maintenance']['status2'] ?>"
                                       href=<?= $this->var['Maintenance']['link2'] ?>>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Maintenance List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>

            </div>
        </aside>
        <?php
    }
}

?>
