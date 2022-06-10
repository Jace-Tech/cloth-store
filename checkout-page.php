<?php include("./inc/check_session.php") ?>
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

</head>

<body>
    <!-- =============Preloader Starts=============-->
    <div class="loader">
        <div class="loding-cricle"></div>
    </div>
    <!-- =============Preloader Ends=============-->

    <!-- =================Header Area Starts================= -->
    <?php include('./inc/header.php') ?>
    <!-- =================Header Area Ends================= -->

    <!-- =================Page Title Area Starts================= -->

    <div class="page-title-area pt-130 pb-120 " style="background-image: url(assets/img/bg/chechout-page-bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-titel-detalis  ">
                        <div class="page-title position-relative">
                            <h2>Checkout Page</h2>
                        </div>
                        <div class="page-bc">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"> <i
                                                class="fas fa-home "></i>Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="checkout-page.html">Checkout Page</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =================Page Title Area ends================= -->

    <!-- =================Checkout  Area Starts================= -->
    <div class="cart-page-area checkout-page pt-50">
        <div class="container">
            <div class="row justify-content-center justify-content-md-start">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-10">
                    <!-- <div class="buyer-info check-border pb-30 mb-50 mb-md-0">
                        <div class="section-title">
                            <h6>Buyer Info</h6>
                            <h6 class="float-right">Login Here</h6>
                        </div>
                        <form action="#" class="pl-45 pt-50 pr-100" >
                            <table class="buyer-info-table ">
                                <tbody>
                                    <tr>
                                        <td>
                                            <label for="first-name">First Name :</label>
                                        </td>
                                        <td>
                                            <input type="text" id="first-name">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="last-name">Last Name :</label>
                                        </td>
                                        <td>
                                            <input type="text" id="last-name">
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="addres-1">Addres 1 :</label>
                                        </td>
                                        <td>
                                            <input type="text" id="addres-1">
                                        </td>
     
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="addres-2">Addres 2 :</label>
                                        </td>
                                        <td>
                                            <input type="text" id="addres-2">
                                        </td>
     
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="city">City :</label>
                                        </td>
                                        <td>
                                            <input type="text" id="city">
                                        </td>
     
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="postal">Posta Code :</label>
                                        </td>
                                        <td>
                                            <input type="text" id="postal">
                                        </td>
     
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="country">Country :</label>
                                        </td>
                                        <td>
                                            <input type="text" id="country">
                                        </td>
     
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="state">State :</label>
                                        </td>
                                        <td>
                                            <input type="text" id="state">
                                        </td>
     
                                    </tr>
                                </tbody>
                            </table>

                        </form>
                    </div> -->
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-10">
                    <div class="billing-detalis check-border ">
                        <div class="section-title">
                            <h6>Billing Detalis</h6>
                        </div>
                        <div class="row">
                            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-1 offset-1">
                                <div class="checkout-product-detalis pt-40 pb-45">
                                    <div class="product-title pb-5">
                                        <span>Product</span>
                                        <span class="float-right">Total</span>
                                    </div>
                                    <hr>
        
                                    <ul class="product-total pt-20 pb-15">
                                        <li><span>There are many veriation</span>
                                            <span class="float-right">$99</span>
                                        </li>
                                        <li>
                                            <span class="pr-50">Size</span>
                                            <span>Xl</span>
                                        </li>
                                        <li>
                                            <span class="pr-50">Color</span>
                                            <span>RED</span>
                                        </li>
                                        <li>
                                            <span>Delivary Cost</span>
                                            <span class="float-right">$9.0</span>
                                        </li>
                                    </ul>
                                    <hr>
                                    <div class="oreder-total pt-10">
                                        <span>Order total</span>
                                        <span class="float-right">$1008.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="payment-method check-border mt-50 pb-20">
                        <!-- <div class="section-title mb-40">
                            <h6>
                                Payment Methods
                            </h6>
                        </div>
                        <div class="row">
                            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-1 offset-1">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry lorem.</p>
                                <div class="paymen-icon pb-40">
                                    <ul class=" d-flex">
                                        <li><a href="#"><i class="fab fa-cc-paypal" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-cc-stripe" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-cc-visa" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-cc-mastercard" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-cc-amex" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                        <!-- <form action="#">
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-4 col-5">
                                    <div class="payment-label text-right">
                                        <label for="card-number">Card Number :</label>
                                        <label for="cvv">CVV :</label>
                                        <label for="month">Month:</label>
                                        <label class="d-lg-none" for="year">Year:</label>
                                    </div>

                                </div>
                                <div class="col-xl-6 col-lg-7 col-md-7 col-sm-8 col-7">
                                    <div class="payment-input mr-10 mr-lg-0">
                                        <input type="text" id="card-number">
                                        <input type="text" id="cvv">
                                        <input class="d-block d-lg-inline" type="text" id="month">
                                        <input class="float-lg-right" type="text" id="year">
                                        <label class="d-none d-lg-inline-block float-lg-right pr-15 pt-5" for="year">Year:</label>
                                        
                                    </div>
                                </div>

                            </div>

                        </form> -->
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="table-button text-center pt-30">
                        <form action="./handlers/payment_handler.php" method="post">
                            <button type="submit" name="checkout" class="b-btn  pl-45 pr-45 pb-15 pt-15">Place Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =================Checkout  Area Ends================= -->

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

    <footer class="footer-area footer-area-2 ">
        <div class="footer-menu pt-40 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                        <div class="footer-widget">
                            <h4>Informatino</h4>
                            <ul class="footer-info">
                                <li><a href="about-page.html">About Us</a></li>
                                <li><a href="login-page.html">My Account</a></li>
                                <li><a href="about-page.html">Privacy Ploicy</a></li>
                                <li><a href="about-page.html"> Trems & Conditions</a></li>
                                <li><a href="about-page.html">Delivery Information</a></li>
                                <li><a href="about-page.html">Information</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                        <div class="footer-widget">
                            <h4>Cusom Service</h4>
                            <ul class="footer-info">
                                <li><a href="about-page.html">About Us</a></li>
                                <li><a href="login-page.html">My Account</a></li>
                                <li><a href="about-page.html">Privacy Ploicy</a></li>
                                <li><a href="about-page.html"> Trems & Conditions</a></li>
                                <li><a href="about-page.html">Delivery Information</a></li>
                                <li><a href="about-page.html">Information</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                        <div class="footer-widget">
                            <h4>My Account</h4>
                            <ul class="footer-info">
                                <li><a href="about-page.html">About Us</a></li>
                                <li><a href="login-page.html">My Account</a></li>
                                <li><a href="about-page.html">Privacy Ploicy</a></li>
                                <li><a href="about-page.html"> Trems & Conditions</a></li>
                                <li><a href="about-page.html">Delivery Information</a></li>
                                <li><a href="about-page.html">Information</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                        <div class="footer-widget">
                            <h4>Extras</h4>
                            <ul class="footer-info">
                                <li><a href="about-page.html">About Us</a></li>
                                <li><a href="login-page.html">My Account</a></li>
                                <li><a href="about-page.html">Privacy Ploicy</a></li>
                                <li><a href="about-page.html"> Trems & Conditions</a></li>
                                <li><a href="about-page.html">Delivery Information</a></li>
                                <li><a href="about-page.html">Information</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
        <div class="footer-bottom pt-25">
            <div class="container">
                <div class="copyright d-inline-block ">
                    <p>CopyRight ©2019  Design by <a href="https://themeforest.net/user/wpsmasher" target="_blank">@Wpsmasher</a>. All Rights Reserved.</p>
                </div>
                <div class="payment-card float-right">
                    <ul class=" d-flex">
                        <li><a href="#"><i class="fab fa-cc-paypal" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-cc-stripe" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-cc-visa" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-cc-mastercard" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-cc-amex" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>


    <!-- =================Footer Area Ends================= -->

     <!-- scripts -->
     <script src="assets/js/vendor/jquery.min.js"></script>
     <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
     <script src="assets/js/vendor/bootstrap.min.js"></script>
     <script src="assets/js/vendor/popper.min.js"></script>
     <script src="assets/js/vendor/jquery-mean-menu.min.js"></script>
     <script src="assets/js/vendor/owl.carousel.min.js"></script>
     <script src="assets/js/vendor/isotope.pkgd.min.js"></script>
     <script src="assets/js/countdown.js"></script>
     <script src="assets/js/vendor/jquery.nice-number.js"></script>  
     <script src="assets/js/vendor/slick.min.js"></script>
     <script src="assets/js/vendor/jquery.magnific-popup.min.js"></script>
     <script src="assets/js/vendor/wow-1.3.0.min.js"></script>  
     <script src="assets/js/main.js"></script>

</body>

</html>