<?php include("./inc/check_session.php"); ?>

<?php
    $CART_ITEMS = getCustomersCart($conn, $CUSTOMER['id']);
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
                            <h2>Cart Page</h2>
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
    <!-- =================Page Title Area Ends================= -->

    <!-- =================Page Title Area Starts================= -->
    <div class="product-area product-detalis-page cart-page-area  pt-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($CART_ITEMS)) : ?>
                                    <?php foreach ($CART_ITEMS as $item) : ?>
                                        <tr>
                                            <td>
                                                <div class="cart-img">
                                                    <img style="width: 120px; height: 120px; object-fit: cover;" src="./uploads/<?= json_decode(getOneProduct($conn, $item['product_id'])['image'], true)[1] ?>" alt="product">
                                                </div>
                                            </td>
                                            <td class="td-width">
                                                <div class="cart-description text-left pl-20">
                                                    <a href="./shop-detalis-page.php?product=<?= getOneProduct($conn, $item['product_id'])['id'] ?>"><?= getOneProduct($conn, $item['product_id'])['name']; ?></a>
                                                    <p title="<?= getOneProduct($conn, $item['product_id'])['description']  ?>"><?= substr(getOneProduct($conn, $item['product_id'])['description'], 0, 50) . "..."; ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="cart-model">
                                                    <span>
                                                        <?= getOneProduct($conn, $item['product_id'])['id']; ?>
                                                    </span>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="product-number ">
                                                    <form class="flex align-items-center input-group" action="./handlers/cart_handler.php" method="post">
                                                        <button type="submit" name="decrement" class="input-group-prepend btn btn-danger" <?= intval($item['quantity']) === 1 ? "disabled" : "" ?>>-</button>
                                                        <input class="form-control" style="width:10px" value="<?= $item['quantity'] ?>" min="1" value="1">
                                                        <input type="hidden" name="cart_id" value="<?= $item['cart_id']; ?>"/>
                                                        <button type="submit" name="increment"  class="input-group-prepend btn btn-primary">+</button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="cart-price">
                                                    &#8358;
                                                    <?= number_format(convertToNG(explode("|", getOneProduct($conn, $item['product_id'])['price'])[0])); ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="cart-price">
                                                    <span>
                                                        &#8358;
                                                        <?= number_format(convertToNG(totalPrice(explode("|", getOneProduct($conn, $item['product_id'])['price'])[0], $item['quantity']))) ?>
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="cart-edit">
                                                    <a href="./handlers/cart_handler.php?delete=<?= $item["cart_id"]; ?>"><i class="fas fa-trash-alt"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="7">
                                            <div class="text-center py-4 text-muted">No item in cart</div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="table-button text-left">
                                            <a class="b-btn pr-15 pl-15 pt-15 pb-15" href="#">CONTINUE SHOPPING </a>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
            <div class="product-cart pt-35">
                <div class="row justify-content-center justify-content-lg-start">
                <div class="col-xl-4 col-lg-4 col-md-8 col-sm-9 col-12"></div>
                <div class="col-xl-4 col-lg-4 col-md-8 col-sm-9 col-12"></div>
                    <!-- <div class="col-xl-4 col-lg-4 col-md-8 col-sm-9 col-12">
                        <div class="cart-wrapper pl-20 pt-30 pr-20 pb-30">
                            <div class="section-title">
                                <h6>
                                    Estimate Shopping And Tax
                                </h6>
                            </div>
                            <div class="country pt-15">
                                <span>Country</span>
                                <input type="text" placeholder="United States">
                            </div>
                            <div class="state pt-15">
                                <span>State/Province</span>
                                <input type="text" placeholder="Please select region, state or province">
                            </div>
                            <div class="zip-code pt-15 pb-20">
                                <span>Zip/Postal Code</span>
                                <input type="text">
                            </div>
                            <div class="table-button d-flex justify-content-end">
                                <a href="#" class="b-btn  pl-20 pr-20 pb-15 pt-15">GET QUOTE</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-8 col-sm-9 col-12">
                        <div class="cart-wrapper pl-20 pt-30 pr-20 pb-30 mt-50 mb-50 mt-lg-0 mb-lg-0">
                            <div class="section-title">
                                <h6>
                                    Discount Code
                                </h6>
                            </div>
                            <div class="country pt-15 pb-20">
                                <span class="pb-10">Enter your coupon code if you have one.</span>
                                <input type="text">
                            </div>
                            <div class="table-button d-flex justify-content-end ">
                                <a href="#" class="b-btn  pt-15 pb-15 pr-30 pl-30 ">APPLY</a>
                            </div>

                        </div>
                    </div>  -->

                    <div class="col-xl-4 col-lg-4 col-md-8 col-sm-9 col-12">
                        <div class="cart-wrapper pl-20 pt-30 pr-20 pb-50">
                            <div class="cart-price-area text-right">
                                <!-- <p>Subtotal <span class="d-inline-block"> $999.00</span></p> -->
                                <p>Grand Total <span class="d-inline-block">
                                    &#8358;
                                    <?= number_format(convertToNG(getGrandTotal($conn, $CUSTOMER['id']))); ?>
                                </span></p>
                            </div>

                            <div class="table-button d-flex justify-content-end pt-20">
                                <a href="./checkout-page.php" class="b-btn  pt-20 pb-20 pr-50 pl-50 ">PROCED TO CHECKOUT</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ================= Subscribe Area Starts ================= -->

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

    <!-- ================= Subscribe Area Ends ================= -->

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