<?php 

// Clean the input
function cleanInput ($input, $type = "string") {
    $trimed = trim($input);

    if($type == "email"){
        $cleanInput = filter_var($trimed, FILTER_SANITIZE_EMAIL);
    }
    else {
        $cleanInput = filter_var($trimed, FILTER_SANITIZE_STRING);
    }

    return $cleanInput;
}

// Random ID Generator

function idGenerator ($prefix, $length) {
    $id = $prefix;

    for ($i = 1; $i <= $length; $i++) { 
        $id .= rand(0, 9);
    }

    return $id;
}

// Convert to Naira 

function convertToNG($price) {
    return intval($price) * 400;
}


function totalPrice($price, $quantity) {
    return intval($price) * intval($quantity);
}


function getGrandTotal($conn, $userID) {
    $usersCartItems = getCustomersCart($conn, $userID);
    $price = 0;
    foreach($usersCartItems as $item) {
        $product_id = $item['product_id'];
        $quantity = $item['quantity'];

        // explode("-", obi-ada); => $arr = [obi, ada]  $arr[1]
        $productPrice = explode("|", getOneProduct($conn, $product_id)['price'])[0];

        $price += totalPrice($productPrice, $quantity);
    }

    return $price;
}