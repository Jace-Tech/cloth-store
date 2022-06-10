<script src="./assets/js/sweetalert.js"></script>
<header>
    <div class="header-area header-resposive pt-30">
        <div class="header-top">
            <div class="container">
                <div class="header-top">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 order-md-1 col-md-5 col-sm-12 ">
                            <ul class="user-info d-flex pt-15 justify-content-center justify-content-md-start">
                                <li><a href="login-page.html">My Account</a></li>
                                <li><a href="cart-page.html">Wish List</a></li>
                                <li><a href="checkout-page.html">Checkout</a></li>
                            </ul>
                        </div>
                        <div class="col-xl-7 col-lg-4 order-md-2 col-md-3  col-sm-6 col-6 ">
                            <div class="logo text-left text-md-center pt-10 pt-md-0">
                                <a href="index.html"><img src="assets/img/logo/logo.png" alt="moly-logo"></a>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 order-md-3 col-md-4 col-sm-6 col-6  ">
                            <div class="header-top-right pt-15 d-flex justify-content-end">
                                <ul class="language">
                                    <li><a href="#"><img src="assets/img/icon/flag.png" alt="flag">English</a>
                                        <ul class="sub-language">
                                            <li><a href="#"> <img src="assets/img/icon/china.png" alt=""> Chinese</a></li>

                                            <li><a href="#"><img src="assets/img/icon/russia.png" alt=""> Russian</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="mony">
                                    <li><a href="#"><i class="fas fa-dollar-sign"></i> USD</a>
                                        <ul class="sub-mony">
                                            <li><a href="#"><i class="fas fa-euro-sign"></i>ERO</a></li>
                                            <li><a href="#"><i class="fas fa-yen-sign"></i>CNY</a></li>

                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-menu mt-15 pt-25 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-md-10">
                        <div class="main-menu ">
                            <nav id="mobile-menu">
                                <ul>
                                    <li><a href="index.html">Home</a></li>


                                    <li><a href="shop-detalis-page.html">Shop</a>
                                        <ul class="sub-menu">
                                            <li><a href="shop-grid-page.html">Shop-Grid</a>
                                                <ul class="sub-menu">
                                                    <li><a href="shop-grid-page.html">Shop Grid</a>
                                                    <li><a href="shop-grid-page-2.html">Shop Grid 2</a>
                                                    <li><a href="shop-grid-page-3.html">Shop Grid 3</a>
                                                    <li><a href="shop-grid-left-sidebar-page.html">Shop Grid Left
                                                            Sidebar</a>
                                                    <li><a href="shop-grid-right-sidebar-page.html">Shop Grid Right
                                                            Sidebar</a>

                                                </ul>
                                            </li>
                                            <li><a href="shop-list-page.html">Shop-List</a>
                                                <ul class="sub-menu">
                                                    <li><a href="shop-list-left-sidebar-page.html">Shop List Left
                                                            Sidebar</a></li>
                                                    <li><a href="shop-list-right-sidebar-page.html">Shop List Right
                                                            Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="shop-detalis-page.html">Shop Detalis</a>
                                                <ul class="sub-menu">
                                                    <li><a href="shop-detalis-left-sidebar-page.html">Shop Detalis
                                                            Left Sidebar</a></li>
                                                    <li><a href="shop-detalis-right-sidebar-page.html">Shop Detalis
                                                            Right Sidebar</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="contact-page.html">Contact Us</a></li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                    <div class="col-xl-2 col-md-2">
                        <div class="site-info d-flex justify-content-end">
                            <div class="search position-relative mr-15 ">
                                <a href="#"><img src="assets/img/icon/search.png" alt=""></a>
                                <div class="search-form">
                                    <form action="#">
                                        <input type="text" placeholder="Enter your keywords.....">
                                    </form>
                                </div>

                            </div>
                            <?php if (isset($_SESSION['CUSTOMER'])) : ?>
                                <div class="react position-relative mr-15">
                                    <a href="#"><i class="far fa-heart"></i></a>
                                    <div class="badge">0</div>
                                </div>
                                <div class="cart position-relative mr-10">
                                    <a href="#" id="mini-cart" class="mini-cart-hide"><img src="assets/img/icon/bag.png" alt=""></a>
                                    <!-- <button id="mini-cart"><img src="assets/img/icon/bag.png" alt=""></button> -->
                                    <div class="badge">
                                        <?= getCount($conn, $CUSTOMER['id']); ?>
                                    </div>

                                    <div id="cart-show" class="product-area product-shop-page mini-cart-product-page ">
                                        <div class="hot-sale-product-area ">
                                            <div class="hot-lookbook pt-10 pb-30" style="height: 300px; overflow-y: scroll;">
                                                <?php if (count(getCustomersCart($conn, $CUSTOMER['id']))) : ?>
                                                    <?php foreach (getCustomersCart($conn, $CUSTOMER['id']) as $cart) : $product = getOneProduct($conn, $cart['product_id']); ?>

                                                        <div class="product-wrapper d-flex">
                                                            <div class="product-img pr-15">
                                                                <img style="width: 90px; height: 90px; object-fit: cover;" src="./uploads/<?= json_decode($product['image'], true)[0] ?>" alt="product">
                                                            </div>
                                                            <div class="product-detalis">
                                                                <span><?= getOneCategory($conn, $product['category'])["category_name"]; ?></span>
                                                                <h6><a href="shop-detalis-page.php?product=<?= $product['id'] ?>"><?= $product['name'] ?></a></h6>
                                                                <div class="price d-flex">
                                                                    <span>$<?= explode("|", $product['price'])[0] ?></span>
                                                                    <del>$<?= explode("|", $product['price'])[1] ?></del>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    <p class="py-5 text-muted text-sm">No Item in cart</p>
                                                <?php endif; ?>

                                                <div class="cart-price-area text-right pt-15 pr-20">
                                                    <p>Sub total: <span class="d-inline-block pl-30"> $999.00</span></p>
                                                    <p>Total: <span class="d-inline-block pl-30"> $999.00</span></p>
                                                </div>
                                                <div class="table-button mini-cart-btn text-center pt-5">
                                                    <a class="b-btn pt-15 pb-15 pr-20 pl-20" href="./cart-page.php">View Cart</a>
                                                    <a class="b-btn pt-15 pb-15 pr-20 pl-20" href="./checkout-page.php">Checkout</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="main-menu ">
                                    <nav id="mobile-menu">
                                        <ul>
                                            <li><a href="login-page.php">login</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>

                </div>
                <div class="mobile-menu"></div>
            </div>
        </div>


    </div>
</header>
<?php include("./inc/alert.php"); ?>