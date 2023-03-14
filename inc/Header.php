<?php
session_start();
session_regenerate_id();
        include './utils/base_url.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=base_url('./inc/media/fav.jpg')?>" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="<?=base_url('./inc/css/bootstrap.min.css')?>"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  
    <title>Car Rent</title>
</head>
<body>

<nav style="background-color: #bac8d9;" class="navbar text-white navbar-expand-lg  ">
  <div class="container-fluid">
    <a class="navbar-brand  text-white " href="<?=base_url('')?>"> MyKey <i class="fa fa-key"></i> </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link  text-white  active" aria-current="page" href="<?=base_url('')?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  text-white " href="<?=base_url('Contact')?>">Contact Us</a>
        </li>
        <?php
                  if(isset($_SESSION['user'])):
                    ?>
                      <li class="nav-item dropdown px-5">
          <a class="nav-link  text-white dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php
                                                            if (isset($_SESSION['user'])) :
                                                                echo $_SESSION['data_user']['name'];
                                                            endif;

                                                            ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item   " href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="<?=base_url('code/authCode')?>" method="post">
              <button name="logoutBtn" class="dropdown-item">Logout</a>
              </form>
            </li>
          </ul>
        </li>
                    <?php
                  endif;
        ?>
      

        <?php
                  if(!isset($_SESSION['user'])):
                    ?>
                    
                    <li class="nav-item">
          <a href="<?=base_url('Login')?>" class="btn btn-success   mx-2">Login</a>
        </li>

        <li class="nav-item">
          <a href="<?=base_url('Register')?>" class="btn btn-primary mx-2 ">Registration</a>
        </li>
                    
                    <?php
                  endif;
        ?>
 

       
      </ul>
      
    </div>
  </div>
</nav>
<div class="" style="min-height: 80vh;">
    
