<?php

include("../db/config.php");
include("../functions/index.php");
include("../admin/utils/index.php");

session_start();

$CUSTOMER = json_decode($_SESSION['CUSTOMER'], true);
$callback = "http://localhost/project-web/handlers/payment_handler.php";
$key = "sk_test_3b03ffb4cd9f86d21527b873780eda1e0c14a7a0";
$userID = $CUSTOMER['id'];


if(isset($_POST['checkout'])) {
    $email = $CUSTOMER['email'];
    $orders = json_encode(getCustomersCart($conn, $userID));

    $amount = convertToNG(getGrandTotal($conn, $userID)) * 100;

    // Transaction API endpoint
    $url = "https://api.paystack.co/transaction/initialize";

    // Fields
    $fields = [
        'email' => $email,
        'amount' => $amount,
        'callback_url' => $callback
    ];

    $fields_string = http_build_query($fields);

    //open connection

    $ch = curl_init();



    //set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: Bearer $key",
        "Cache-Control: no-cache",
    ));


    //So that curl_exec returns the contents of the cURL; rather than echoing it

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //execute post

    $result = json_decode(curl_exec($ch), true);
    $trxId = $result['data']['reference'];
    $authorize_url = $result['data']['authorization_url'];
    
    // Push payment to transaction table

    $query = "INSERT INTO `transactions`(`trx_id`, `customer_id`, `order`, `amount`) VALUES ('$trxId', '$userID', '$orders', '$amount')";
    $result = mysqli_query($conn, $query);

    if($result) {
        header("Location: $authorize_url");
    }
}


if(isset($_GET['reference'])) {
    $trxid  = $_GET['reference'];

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.paystack.co/transaction/verify/$trxid",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer $key",
            "Cache-Control: no-cache",
        ),
    ));



    $response = json_decode(curl_exec($curl), true);

    $err = curl_error($curl);

    curl_close($curl);

    $status = $response['data']['status'];

    if($status !== "success") {
        $query = "UPDATE `transactions` SET `status` = '$status' WHERE `trx_id` = '$trxid'";
        $result = mysqli_query($conn, $query);

        if($result) {
            $_SESSION['CUSTOMER_ALERT'] = json_encode([
                'message' => "Payment was not successful",
                'status' => 'error'
            ]);
            header("location: ../checkout-page.php");
        }
    }
    else {
        $query = "UPDATE `transactions` SET `status` = '$status' WHERE `trx_id` = '$trxid'";
        $result = mysqli_query($conn, $query);

        if($result) {
            $_SESSION['CUSTOMER_ALERT'] = json_encode([
                'message' => "Payment successsful",
                'status' => 'success'
            ]);

            // Clear the cart 

            $query = "DELETE FROM cart WHERE customer_id = '$userID'";
            $result = mysqli_query($conn, $query);

            if($result) {
                header("location: ../index.php");
            }

        }
    }

}