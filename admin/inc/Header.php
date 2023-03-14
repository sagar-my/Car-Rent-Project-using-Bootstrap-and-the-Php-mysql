<?php

session_start();
session_regenerate_id();
include '../config/db.php';
            include 'utils/admin_url.php';
        
        
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - my Car</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="<?=admin_url('')?>">My car</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 ms-3 ms-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <form method="post" action="code/auth">
                        <button class="dropdown-item" name="logoutBtn">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link 
                        <?php
                        if(str_replace("/car%20rent/admin/","",$_SERVER['REQUEST_URI']) ==''){
                            echo 'active';
                        }
                       
                        ?>
                        
                        " href="<?=admin_url('')?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <a class="nav-link 
                        <?php
                        if(str_replace("/car%20rent/admin/","",$_SERVER['REQUEST_URI']) =='admin_register'){
                            echo 'active';
                        }
                       
                        ?>
                        
                        " href="<?=admin_url('admin_register')?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-key"></i></div>
                            Admins
                        </a>
                        <a class="nav-link 
                        <?php
                        if(str_replace("/car%20rent/admin/","",$_SERVER['REQUEST_URI']) =='category'){
                            echo 'active';
                        }
                       
                        ?>
                        
                        " href="<?=admin_url('category')?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-cart-shopping"></i></div>
                            Category
                        </a>
                    
                        <a class="nav-link 
                        
                        <?php
                        if(str_replace("/car%20rent/admin/","",$_SERVER['REQUEST_URI']) =='user_page'){
                            echo 'active';
                        }
                       
                        ?>
                        " href="<?=admin_url('user_page')?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Users
                        </a>
                    
                        <a class="nav-link 
                        
                        <?php
                        if(str_replace("/car%20rent/admin/","",$_SERVER['REQUEST_URI']) =='orders'){
                            echo 'active';
                        }
                       
                        ?>
                        " href="<?=admin_url('orders')?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                            Orders
                        </a>

                        <a class="nav-link 
                        
                        <?php
                        if(str_replace("/car%20rent/admin/","",$_SERVER['REQUEST_URI']) =='contact'){
                            echo 'active';
                        }
                       
                        ?>
                        " href="<?=admin_url('contact')?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-phone"></i></div>
                            Help Desk
                        </a>
                    </div>
                </div>
              
            </nav>
        </div>
        <div id="layoutSidenav_content">