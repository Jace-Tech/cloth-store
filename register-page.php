<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="shop, ecommerce, store, multipurpose, shopify, woocommerce, html5, css3, sass">

    <!-- fav -->
  
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- title -->
    <title>Moly - Multipurpose ecommerce html5 template</title>

    <!-- stylesheets -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/vendor/animate.css">
    <link rel="stylesheet" href="assets/css/vendor/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/vendor/slick.css">
    <link rel="stylesheet" href="assets/css/vendor/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/vendor/normalize.css">
    <link rel="stylesheet" href="assets/css/vendor/jquery.nice-number.css">
    <link rel="stylesheet" href="assets/css/mean-menu.css">
    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        .account {
            margin-top: .5rem;
            font-size: .8rem;
        }

        .account a {
            display: inline-block;
            margin-left: .3rem;
            color: lightskyblue;
        }
    </style>

</head>

<body>
    <!-- =============Preloader Starts=============-->
    <div class="loader">
        <div class="loding-cricle"></div>
    </div>
    <!-- =============Preloader Ends=============-->


    <!-- =================Header Area Starts================= -->
    <?php include("./inc/header.php"); ?>
    <!-- =================Header Area Ends================= -->

    <!-- =================Page Title Area Starts================= -->

    <div class="page-title-area pt-130 pb-120 " style="background-image: url(assets/img/bg/chechout-page-bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-titel-detalis  ">
                        <div class="page-title position-relative">
                            <h2>Register Page</h2>
                        </div>
                        <div class="page-bc">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php"> <i
                                                class="fas fa-home "></i>Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="register-page.php">Register Page</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- =================Page Title Area End================= -->
    <!-- =================Login Area Starts================= -->

    <div class="login-page-area pt-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-9">
                    <form action="./handlers/customer_handler.php" method="POST" class="login-detalis pt-40 pr-40 pl-40 pb-40">
                        <div class="login-input">
                            <input type="text" name="name" placeholder="Full Name...">
                            <input type="text" name="email" placeholder="Enter your email....">
                            <input type="text" name="password" placeholder="Enter your Password....">
                            <input type="text" name="phone" placeholder="Enter phone number">
                        </div>
                        <div class="login-button text-center pt-30">
                            <button name="add" class="btn btn-primary">Register</button>
                        </div>
                        <div class="login-information pt-25">
                            <p class="account">Already have an account? 
                                <a href="login-page.php" class="text-light-blue-200">Login</a> 
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- =================Login Area Ends================= -->

    <!-- =================Subscribe Area Starts================= -->

    <div class="subscribe-area pt-50 mt-50 pb-35">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 col-12 offset-xl-3 offset-lg-2 offset-md-1">
                    <div class="mess-icon text-center pb-30">
                        <img src="assets/img/icon/email-red.png" alt="messages">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 col-12 offset-xl-3 offset-lg-2 offset-md-1">
                    <form action="#">
                        <input type="email" placeholder="Enter Your Email...">
                        <button>Subscribe</button>
                    </form>
                    <div class="discount-text text-center pt-50">
                        <p>Get Discount 30% Off !</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- =================Subscribe Area Ends================= -->

    <!-- =================Brand Area Starts================= -->

    <div class="brand-area pt-50 ">
        <div class="container">
            <div class="brand-active">
                
                <div class="single-brand">
                    <div class="brand-img">
                        <img src="assets/img/brand/brand1.png" alt="brand">
                    </div>
                </div>
                <div class="single-brand">
                    <div class="brand-img">
                        <img src="assets/img/brand/brand2.png" alt="brand">
                    </div>
                </div>
                <div class="single-brand">
                    <div class="brand-img">
                        <img src="assets/img/brand/brand4.png" alt="brand">
                    </div>
                </div>
                <div class="single-brand">
                    <div class="brand-img">
                        <img src="assets/img/brand/brand3.png" alt="brand">
                    </div>
                </div>
                <div class="single-brand">
                    <div class="brand-img">
                        <img src="assets/img/brand/brand1.png" alt="brand">
                    </div>
                </div>
                <div class="single-brand">
                    <div class="brand-img">
                        <img src="assets/img/brand/brand4.png" alt="brand">
                    </div>
                </div>
                <div class="single-brand">
                    <div class="brand-img">
                        <img src="assets/img/brand/brand2.png" alt="brand">
                    </div>
                </div>
                <div class="single-brand">
                    <div class="brand-img">
                        <img src="assets/img/brand/brand4.png" alt="brand">
                    </div>
                </div>
                <div class="single-brand">
                    <div class="brand-img">
                        <img src="assets/img/brand/brand3.png" alt="brand">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- =================Brand Area Ends================= -->

    <!-- =================Footer Area Starts================= -->   
        <?php include("./inc/footer.php"); ?>
    <!-- =================Footer Area Ends================= -->

     <!-- scripts -->
     <script src="assets/js/vendor/jquery.min.js"></script>
     <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
     <script src="assets/js/vendor/bootstrap.min.js"></script>
     <script src="assets/js/vendor/popper.min.js"></script>
     <script src="assets/js/vendor/jquery-mean-menu.min.js"></script>
     <script src="assets/js/vendor/owl.carousel.min.js"></script>
     <script src="assets/js/vendor/isotope.pkgd.min.js"></script>
     <!-- <script src="assets/js/countdown.js"></script> -->
     <script src="assets/js/vendor/jquery.nice-number.js"></script>  
     <script src="assets/js/vendor/slick.min.js"></script>
     <script src="assets/js/vendor/jquery.magnific-popup.min.js"></script>
     <script src="assets/js/vendor/wow-1.3.0.min.js"></script>  
     <script src="assets/js/main.js"></script>

</body>

</html>