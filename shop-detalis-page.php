<?php include("./inc/check_session.php");  ?>

<?php
if (!isset($_GET['product'])) {
    header('Location: ./index.php');
}

$product = getOneProduct($conn, $_GET['product']);

?>
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
    <?php include("./inc/header.php"); ?>
    <!-- =================Header Area Ends================= -->

    <!-- =================Page Title Area Starts================= -->

    <div class="page-title-area pt-130 pb-120 " style="background-image: url(assets/img/bg/contact-bg.png);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-titel-detalis  ">
                        <div class="page-title position-relative">
                            <h2>Product Details Page</h2>
                        </div>
                        <div class="page-bc">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"> <i class="fas fa-home "></i>Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="shop-list-page.html">Shope Page</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- =================Page Title Area Starts================= -->

    <!-- =================Product Area Starts================= -->

    <div class="product-area product-shop-page  product-list-page product-detalis-page  pt-50 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-8 col-11 col offset-xl-1 offset-lg-1">
                    <div class=" slider-nav-thumbnails product-list-active d-md-none">
                        <?php foreach (json_decode($product['image']) as $image) : ?>
                            <a class=""><img src="./uploads/<?= $image; ?>" alt=""></a>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-7 col-md-6 col-sm-12">
                    <div class="product-list-slider">
                        <?php foreach (json_decode($product['image']) as $image) : ?>
                            <div class="product-img">
                                <img style="height: 400px; object-fit: cover;" src="./uploads/<?= $image ?>" alt="">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
                    <div class="product-wrapper product-wrapper-2 pt-60">
                        <form action="./handlers/cart_handler.php" method="get" class="product-detalis">
                            <h6><a href=""><?= $product['name'] ?></a></h6>
                            <ul class="rating d-flex pl-0 pt-10 pb-10">
                                <!-- <li><i class="far fa-star" aria-hidden="true"></i></li>
                                <li><i class="far fa-star" aria-hidden="true"></i></li>
                                <li><i class="far fa-star" aria-hidden="true"></i></li>
                                <li><i class="far fa-star" aria-hidden="true"></i></li>
                                <li><i class="far fa-star" aria-hidden="true"></i></li> -->
                            </ul>

                            <!-- <div class="product-interested pb-20">
                                <span class="pr-10">Interested : 05</span>
                                <span>564 Reviews(S)</span>
                            </div> -->
                            <!-- 100|200 => [100, 200] -->
                            <div class="price d-inline-block pb-25">
                                <span>$<?=  explode('|', $product['price'])[0] ?></span>
                                <del>$<?=  explode('|', $product['price'])[1] ?></del>
                            </div>
                            <div class="product-number d-flex pb-30">
                                <div class="quty">
                                    <span class="pr-10">QTY:</span>
                                    <input class="qty" type="number" value="1">
                                </div>
                                <div class="availabillity pl-20">
                                    <span>Availability : <span class="pl-5"><?= $product['quantity'] ?></span> </span>
                                </div>
                            </div>
                            <hr>
                            <!-- <div class="page-share-icon  d-flex pt-25 pb-20">
                                <span>Share:</span>
                                <ul class="icon pl-15  d-flex">
                                    <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-skype"></i></a></li>
                                    <li><a href="#"><i class="fas fa-rss"></i></a></li>
                                </ul>
                            </div> -->
                            <div class="cart-view d-flex">
                                <div class="cart ">
                                    <a href="#" tabindex="0"><img src="assets/img/icon/cart-red.png" alt=""> Add To Cart</a>
                                </div>
                                <ul class="social-icon d-flex align-items-center pl-20">
                                    <li><a href="#" tabindex="0"><i class="fa fa-retweet" aria-hidden="true"></i></a></li>
                                    <li><a href="#" tabindex="0"><i class="far fa-heart" aria-hidden="true"></i></a></li>
                                    <li><a class="popup-img" href="assets/img/product/product-61.png"><i class="fa fa-eye" aria-hidden="true"></i></a></li>

                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-7 col offset-xl-1 offset-lg-1">
                    <div class=" slider-nav-thumbnails product-list-active d-none d-md-block">
                        <a class="active"><img src="assets/img/product/product-62.png" alt=""></a>
                        <a><img src="assets/img/product/product-63.png" alt=""></a>
                        <a><img src="assets/img/product/product-64.png" alt=""></a>
                        <a><img src="assets/img/product/product-65.png" alt=""></a>
                        <a><img src="assets/img/product/product-63.png" alt=""></a>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="description-area pt-10">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="description-tab pt-50 pl-50 pr-50 pb-40">
                        <nav>
                            <div class="nav nav-tabs " id="approach-tabs" role="tablist">
                                <a class="nav-item nav-link active" id="nav-description-tab" data-toggle="tab" href="#nav-description" role="tab" aria-controls="nav-description" aria-selected="true">description</a>
                                <a class="nav-item nav-link" id="nav-comment-tab" data-toggle="tab" href="#nav-comment" role="tab" aria-controls="nav-comment" aria-selected="false">COMMENTS</a>
                                <a class="nav-item nav-link" id="nav-review-tab" data-toggle="tab" href="#nav-review" role="tab" aria-controls="nav-review" aria-selected="false">review</a>
                            </div>
                        </nav>
                        <div class="tab-content mt-25 " id="nav-tabContents">
                            <div class="tab-pane  active " id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab">
                                <?php foreach(explode("\n", $product['description']) as $description): ?>
                                    <p><?= $description ?></p>
                                <?php endforeach; ?>
                                <div class="item-features">
                                    <div class="section-title">
                                        <h5>Item Features</h5>
                                    </div>
                                    <ul class="item-features-list pl-35">
                                        <?php foreach (explode("\n", $product['feature']) as $feature): ?>
                                            <li><?= $feature ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane " id="nav-comment" role="tabpanel" aria-labelledby="nav-comment-tab">
                                <?php foreach(explode("\n", $product['description']) as $description): ?>
                                    <p><?= $description ?></p>
                                <?php endforeach; ?>
                                <div class="item-features">
                                    <div class="section-title">
                                        <h5>Item Features</h5>

                                    </div>
                                    <ul class="item-features-list pl-35">
                                        <?php foreach (explode("\n", $product['feature']) as $feature): ?>
                                            <li><?= $feature ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab">
                                <?php foreach(explode("\n", $product['description']) as $description): ?>
                                    <p><?= $description ?></p>
                                <?php endforeach; ?>
                                <div class="item-features">
                                    <div class="section-title">
                                        <h5>Item Features</h5>

                                    </div>
                                    <ul class="item-features-list pl-35">
                                        <?php foreach (explode("\n", $product['feature']) as $feature): ?>
                                            <li><?= $feature ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =================Product Area Ends================= -->
    <!-- =================Product Area Starts================= -->

    <div class="product-area pt-50 ">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-title">
                        <h3>
                            Our Products
                        </h3>
                    </div>
                </div>
            </div>
            <hr>

        </div>
        <div class="container pl-0 pr-0">
            <div class="custom-row ">
                <div class="product-active pt-30">
                    <div class="col-xl-3">
                        <div class="product-wrapper">
                            <div class="product-img ">
                                <img src="assets/img/product/product-1.jpg" alt="product">
                                <ul class="social-icon">
                                    <li><a href="#"><i class="fa fa-retweet" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="far fa-heart" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="flip-box">
                                <div class="product-detalis pt-15 pl-20 pr-20 pb-25">
                                    <span>Men Fashion</span>
                                    <h6><a href="shop-detalis-page.html">Military Patch Pocket Blazer</a></h6>
                                    <div class="price-color ">
                                        <div class="price d-inline-block">
                                            <span>$999</span>
                                            <del>$899</del>
                                        </div>
                                        <div class="color float-right d-flex">
                                            <span>Color:</span>
                                            <div class="color-set">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-detalis product-detalis-2 pt-15 pl-20 pr-20 pb-25">
                                    <div class="product-info">
                                        <span>Men Fashion</span>
                                        <h6><a href="shop-detalis-page.html">Military Patch Pocket Blazer</a></h6>
                                        <div class="buy-info ">
                                            <div class="cart float-left">
                                                <a href="#"><img src="assets/img/icon/cart-red.png" alt=""> Add To Cart</a>

                                            </div>
                                            <ul class="rating d-flex">
                                                <li><i class="far fa-star" aria-hidden="true"></i></li>
                                                <li><i class="far fa-star" aria-hidden="true"></i></li>
                                                <li><i class="far fa-star" aria-hidden="true"></i></li>
                                                <li><i class="far fa-star" aria-hidden="true"></i></li>
                                                <li><i class="far fa-star" aria-hidden="true"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="product-wrapper">
                            <div class="product-img sale-product ">
                                <img src="assets/img/product/product-2.jpg" alt="product">
                                <ul class="social-icon">
                                    <li><a href="#"><i class="fa fa-retweet" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="far fa-heart" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="flip-box">
                                <div class="product-detalis pt-15 pl-20 pr-20 pb-25">
                                    <span>Men Fashion</span>
                                    <h6><a href="shop-detalis-page.html">Military Patch Pocket Blazer</a></h6>
                                    <div class="price-color ">
                                        <div class="price d-inline-block">
                                            <span>$999</span>
                                            <del>$899</del>
                                        </div>
                                        <div class="color float-right d-flex">
                                            <span>Color:</span>
                                            <div class="color-set">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-detalis product-detalis-2 pt-15 pl-20 pr-20 pb-25">
                                    <span>Men Fashion</span>
                                    <h6><a href="shop-detalis-page.html">Military Patch Pocket Blazer</a></h6>
                                    <div class="buy-info ">
                                        <div class="cart float-left">
                                            <a href="#"><img src="assets/img/icon/cart-red.png" alt=""> Add To Cart</a>
                                        </div>
                                        <ul class="rating d-flex">
                                            <li><i class="far fa-star" aria-hidden="true"></i></li>
                                            <li><i class="far fa-star" aria-hidden="true"></i></li>
                                            <li><i class="far fa-star" aria-hidden="true"></i></li>
                                            <li><i class="far fa-star" aria-hidden="true"></i></li>
                                            <li><i class="far fa-star" aria-hidden="true"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="product-wrapper">
                            <div class="product-img ">
                                <img src="assets/img/product/product-3.jpg" alt="product">
                                <ul class="social-icon">
                                    <li><a href="#"><i class="fa fa-retweet" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="far fa-heart" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="flip-box">
                                <div class="product-detalis pt-15 pl-20 pr-20 pb-25">
                                    <span>Women Fashion</span>
                                    <h6><a href="shop-detalis-page.html">Military Patch Pocket Blazer</a></h6>
                                    <div class="price-color ">
                                        <div class="price d-inline-block">
                                            <span>$999</span>
                                            <del>$899</del>
                                        </div>
                                        <div class="color float-right d-flex">
                                            <span>Color:</span>
                                            <div class="color-set color-black">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-detalis product-detalis-2 pt-15 pl-20 pr-20 pb-25">
                                    <span>Men Fashion</span>
                                    <h6><a href="shop-detalis-page.html">Military Patch Pocket Blazer</a></h6>
                                    <div class="buy-info ">
                                        <div class="cart float-left">
                                            <a href="#"><img src="assets/img/icon/cart-red.png" alt=""> Add To Cart</a>
                                        </div>
                                        <ul class="rating d-flex">
                                            <li><i class="far fa-star" aria-hidden="true"></i></li>
                                            <li><i class="far fa-star" aria-hidden="true"></i></li>
                                            <li><i class="far fa-star" aria-hidden="true"></i></li>
                                            <li><i class="far fa-star" aria-hidden="true"></i></li>
                                            <li><i class="far fa-star" aria-hidden="true"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="product-wrapper">
                            <div class="product-img new-product">
                                <img src="assets/img/product/product-4.jpg" alt="product">
                                <ul class="social-icon">
                                    <li><a href="#"><i class="fa fa-retweet" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="far fa-heart" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="flip-box">
                                <div class="product-detalis pt-15 pl-20 pr-20 pb-25">
                                    <span>Women Fashion</span>
                                    <h6><a href="shop-detalis-page.html">Military Patch Pocket Blazer</a></h6>
                                    <div class="price-color ">
                                        <div class="price d-inline-block">
                                            <span>$999</span>
                                            <del>$899</del>
                                        </div>
                                        <div class="color float-right d-flex">
                                            <span>Color:</span>
                                            <div class="color-set color-white">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-detalis product-detalis-2 pt-15 pl-20 pr-20 pb-25">
                                    <span>Men Fashion</span>
                                    <h6><a href="shop-detalis-page.html">Military Patch Pocket Blazer</a></h6>
                                    <div class="buy-info ">
                                        <div class="cart float-left">
                                            <a href="#"><img src="assets/img/icon/cart-red.png" alt=""> Add To Cart</a>
                                        </div>
                                        <ul class="rating d-flex">
                                            <li><i class="far fa-star" aria-hidden="true"></i></li>
                                            <li><i class="far fa-star" aria-hidden="true"></i></li>
                                            <li><i class="far fa-star" aria-hidden="true"></i></li>
                                            <li><i class="far fa-star" aria-hidden="true"></i></li>
                                            <li><i class="far fa-star" aria-hidden="true"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="product-wrapper">
                            <div class="product-img ">
                                <img src="assets/img/product/product-2.jpg" alt="product">
                                <ul class="social-icon">
                                    <li><a href="#"><i class="fa fa-retweet" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="far fa-heart" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="flip-box">
                                <div class="product-detalis pt-15 pl-20 pr-20 pb-25">
                                    <span>Men Fashion</span>
                                    <h6><a href="shop-detalis-page.html">Military Patch Pocket Blazer</a></h6>
                                    <div class="price-color ">
                                        <div class="price d-inline-block">
                                            <span>$999</span>
                                            <del>$899</del>
                                        </div>
                                        <div class="color float-right d-flex">
                                            <span>Color:</span>
                                            <div class="color-set">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-detalis product-detalis-2 pt-15 pl-20 pr-20 pb-25">
                                    <span>Men Fashion</span>
                                    <h6><a href="shop-detalis-page.html">Military Patch Pocket Blazer</a></h6>
                                    <div class="buy-info ">
                                        <div class="cart float-left">
                                            <a href="#"><img src="assets/img/icon/cart-red.png" alt=""> Add To Cart</a>
                                        </div>
                                        <ul class="rating d-flex">
                                            <li><i class="far fa-star" aria-hidden="true"></i></li>
                                            <li><i class="far fa-star" aria-hidden="true"></i></li>
                                            <li><i class="far fa-star" aria-hidden="true"></i></li>
                                            <li><i class="far fa-star" aria-hidden="true"></i></li>
                                            <li><i class="far fa-star" aria-hidden="true"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- =================Product Area Ends================= -->

    <!-- =================Subscribe Area Starts================= -->

    <div class="subscribe-area pt-50  pb-35">
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
                    <p>CopyRight ©2019 Design by <a href="https://themeforest.net/user/wpsmasher" target="_blank">@Wpsmasher</a>. All Rights Reserved.</p>
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