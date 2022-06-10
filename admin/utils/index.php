<?php

function setAlert($type, $message) {
    $alert = [
        "type" => $type,
        "message" => $message
    ];

    $_SESSION["ADMIN_ALERT"] = json_encode($alert);
}


function getAllProducts ($conn) {
    $query = "SELECT * FROM `product` ORDER BY `date` DESC";
    $result = mysqli_query($conn, $query);
    $num_of_rows = mysqli_num_rows($result);

    $allProducts = [];

    if($num_of_rows) {
        // Loop through the products and push $allProducts
        while($row = mysqli_fetch_assoc($result)) {
            array_push($allProducts, $row);
        }
        return $allProducts;
        exit();
    }
    else {
        return $allProducts;
    }
}

function getAllCategories ($conn) {
    $query = "SELECT * FROM `category`";
    $result = mysqli_query($conn, $query);
    $num_of_rows = mysqli_num_rows($result);

    $allCategories = [];

    if($num_of_rows) {
        // Loop through the categories and push $allCategories
        while($row = mysqli_fetch_assoc($result)) {
            array_push($allCategories, $row);
        }
        return $allCategories;
        exit();
    }
    else {
        return $allCategories;
    }
}

function getAllColors ($conn) {
    $query = "SELECT * FROM `color`";
    $result = mysqli_query($conn, $query);

    $num_of_rows = mysqli_num_rows($result);
    $allColors = [];

    if($num_of_rows) {
        while($row = mysqli_fetch_assoc($result)) {
            array_push($allColors, $row);
        }
        return $allColors;
        exit();
    }

    return $allColors;
}

function getOneColor ($conn, $id) {
    $query = "SELECT * FROM `color` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function getOneCategory ($conn, $id) {
    $query = "SELECT * FROM `category` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function getOneProduct ($conn, $id) {
    $query = "SELECT * FROM `product` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function getCustomersCart ($conn, $id, $limit = null) {
    if($limit) {
        $query = "SELECT * FROM `cart` WHERE `customer_id` = '$id' LIMIT $limit";
    }
    else {
        $query = "SELECT * FROM `cart` WHERE `customer_id` = '$id'";
    }
    
    $output = [];
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($output, $row);
    }

    return $output;
}

function getCount ($conn, $userId) {
    $query = "SELECT SUM(`quantity`) as `number` FROM `cart` WHERE `customer_id` = '$userId'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result)['number'];
    return $row;
}
