<?php include 'connection.php'; ?>
<?php include 'functions.php'; ?>
<?php
session_start();
ob_start();
if(empty($_SESSION['u_id '])){
header('Location: index.php');
}

if($_SESSION['u_type'] == 0){
header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
        <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
        <meta name="robots" content="noindex,nofollow">
        <title>Israk Blogger | Admin Panel</title>
        <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
        <!-- Custom CSS -->
        <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
        <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
        <!-- Custom CSS -->
        <link href="css/style.min.css" rel="stylesheet">
    </head>
    <body>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
            data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <header class="topbar" data-navbarbg="skin5">
                <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                    <div class="navbar-header" data-logobg="skin6">
                        <!-- ============================================================== -->
                        <!-- Logo -->
                        <!-- ============================================================== -->
                        <a class="navbar-brand" href="dashboard.html">
                            <!-- Logo icon -->
                            <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img src="plugins/images/logo-icon.png" alt="homepage" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="plugins/images/logo-text.png" alt="homepage" />
                            </span>
                        </a>
                        <!-- ============================================================== -->
                        <!-- End Logo -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- toggle and nav items -->
                        <!-- ============================================================== -->
                        <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                        
                        <!-- ============================================================== -->
                        <!-- Right side toggle and nav items -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav ms-auto d-flex align-items-center">
                            <!-- ============================================================== -->
                            <!-- Search -->
                            <!-- ============================================================== -->
                            <li class=" in">
                                <!-- <form role="search" class="app-search d-none d-md-block me-3">
                                    <input type="text" placeholder="Search..." class="form-control mt-0">
                                    <a href="" class="active">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </form> -->
                                <h6 class="text-light pt-2 me-2"><?php echo 'Welcome "'.$_SESSION['u_mail'].'"';?></h6>
                            </li>
                            <!-- ============================================================== -->
                            <!-- User profile and search -->
                            <!-- ============================================================== -->
                            <li>
                                <a class="profile-pic" href="inc/logout.php">
                                    <img src="plugins/images/users/varun.jpg" alt="user-img" width="36"
                                    class="img-circle"><span class="text-white font-medium">Logout</span></a>
                                </li>
                                <!-- ============================================================== -->
                                <!-- User profile and search -->
                                <!-- ============================================================== -->
                            </ul>
                        </div>
                    </nav>
                </header>
                <!-- ============================================================== -->
                <!-- End Topbar header -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Left Sidebar - style you can find in sidebar.scss  -->
                <!-- ============================================================== -->
                <aside class="left-sidebar" data-sidebarbg="skin6">
                    <!-- Sidebar scroll-->
                    <div class="scroll-sidebar">
                        <!-- Sidebar navigation-->
                        <nav class="sidebar-nav">
                            <ul id="sidebarnav">
                                <!-- User Profile-->
                                <li class="sidebar-item pt-2">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php"
                                        aria-expanded="false">
                                        <i class="far fa-clock" aria-hidden="true"></i>
                                        <span class="hide-menu">Dashboard</span>
                                    </a>
                                </li>
                                <!-- <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.html"
                                        aria-expanded="false">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <span class="hide-menu">Profile</span>
                                    </a>
                                </li> -->
                                <?php

                                if($_SESSION['u_type'] == 1 || $_SESSION['u_type'] == 2){
                                    ?>

                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="category.php"
                                        aria-expanded="false">
                                        <i class="fa fa-table" aria-hidden="true"></i>
                                        <span class="hide-menu">Category</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <span class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false" id="hassub">
                                        <i class="fas fa-sticky-note" aria-hidden="true"></i>
                                        <span class="hide-menu">Posts</span>
                                    </span>
                                    <div class="submenu">
                                        <ul>
                                            <li class="sidebar-item">
                                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="posts.php?do=add"
                                                    aria-expanded="false">
                                                    <i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                    <span class="hide-menu">Add New Post</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="posts.php?do=view"
                                                    aria-expanded="false">
                                                    <i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                    <span class="hide-menu">View All Posts</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                    <?php
                                }

                                ?>
                                
                                <?php 

                                if($_SESSION['u_type'] == 2){
                                    ?>

                                <li class="sidebar-item">
                                    <span class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false" id="hassub2">
                                        <i class="fas fa-users" aria-hidden="true"></i>
                                        <span class="hide-menu">Users</span>
                                    </span>
                                    <div class="submenu2">
                                        <ul>
                                            <li class="sidebar-item">
                                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="users.php?do=add"
                                                    aria-expanded="false">
                                                    <i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                    <span class="hide-menu">Add New User</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="users.php?do=view"
                                                    aria-expanded="false">
                                                    <i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                    <span class="hide-menu">View All Users</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>                                    

                                    <?php
                                }

                                ?>
                                
                                <!-- <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="blank.html"
                                        aria-expanded="false">
                                        <i class="fa fa-columns" aria-hidden="true"></i>
                                        <span class="hide-menu">Blank Page</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="404.html"
                                        aria-expanded="false">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                                        <span class="hide-menu">Error 404</span>
                                    </a>
                                </li> -->
                                <li class="text-center p-20 upgrade-btn">
                                    <a href="https://fb.com/imisrakssr"
                                        class="btn d-grid btn-danger text-white" target="_blank">
                                    Contact with Israk</a>
                                </li>
                            </ul>
                        </nav>
                        <!-- End Sidebar navigation -->
                    </div>
                    <!-- End Sidebar scroll-->
                </aside>
                <!-- ============================================================== -->
                <!-- End Left Sidebar - style you can find in sidebar.scss  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Page wrapper  -->
                <!-- ============================================================== -->
                <div class="page-wrapper">