<?php  
session_start();
include("../db/config.php");

if(isset($_GET['product'])) {
    $product = $_GET['product'];
    $quantity = $_GET['quantity'] ?? 1;

    if(isset($_SESSION['CUSTOMER'])) {
        $customer_id = json_decode($_SESSION["CUSTOMER"], true)["id"];
    }
    else {
        $_SESSION['CUSTOMER_ALERT'] = json_encode([
            "message" => "Please sign in to continue",
            "status" => "info"
        ]);

        header("Location: ../login-page.php");
        exit();
    }

    // Check if item already exists in cart
    $checkSql = "SELECT * FROM `cart` WHERE `customer_id` = '$customer_id' AND `product_id` = '$product'";
    $resultSql = mysqli_query($conn, $checkSql);

    if(mysqli_num_rows($resultSql) > 0) {
        $query = "UPDATE `cart` SET `quantity` = `quantity` + 1 WHERE `customer_id` = '$customer_id' AND `product_id` = '$product'";
        $result = mysqli_query($conn, $query);

        if($result) {
            if(isset($_GET['redirect'])) {
                header("Location: ../{$_GET['redirect']}.php");
            }
            else {
                header("Location: ../shop-detalis-page.php?product=$product");
            }
        }
    }
    else {
        $query = "INSERT INTO `cart`(`customer_id`, `product_id`, `quantity`) 
        VALUES ('$customer_id','$product','$quantity')";
        $result = mysqli_query($conn, $query);

        if($result) {
            // header("location:")
            if(isset($_GET['redirect'])) {
                header("Location: ../{$_GET['redirect']}.php");
            }
            else {
                header("Location: ../shop-detalis-page.php?product=$product");
            }
        }
    }

}

if(isset($_POST['increment'])) {
    $cartId = $_POST['cart_id'];

    $query = "UPDATE `cart` SET `quantity` = `quantity` + 1 WHERE cart_id = '$cartId'";
    $result = mysqli_query($conn, $query);    

    header("Location: ../cart-page.php");
}

if(isset($_POST['decrement'])) {
    $cartId = $_POST['cart_id'];

    $query = "UPDATE `cart` SET `quantity` = `quantity` - 1 WHERE cart_id = '$cartId'";
    $result = mysqli_query($conn, $query);    

    header("Location: ../cart-page.php");
}

if(isset($_GET['delete'])) {
    $cartId = $_GET['delete'];

    $query = "DELETE FROM `cart` WHERE `cart_id` = '$cartId'";
    $result = mysqli_query($conn, $query);    

    header("Location: ../cart-page.php");
}