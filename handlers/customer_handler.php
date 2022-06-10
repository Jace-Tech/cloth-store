<?php 

session_start();

include("../db/config.php");
include("../functions/index.php");


if(isset($_POST["add"])) {
    $email = mysqli_real_escape_string($conn, cleanInput($_POST["email"], "email"));
    $name = mysqli_real_escape_string($conn, cleanInput($_POST['name']));
    $phone = mysqli_real_escape_string($conn, cleanInput( $_POST['phone']));
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password = password_hash($password, PASSWORD_DEFAULT);

    $customerId = idGenerator("cus_", 8);

    // Check if user already exists

    $query = "INSERT INTO `customer`(`customer_id`, `name`, `email`, `phone`, `password`) VALUES ('$customerId','$name','$email','$phone','$password')";
    $result = mysqli_query($conn, $query);

    if($result) {
        $alert = [
            "message" => "Registration successful",
            "status" => "success"
        ];

        $_SESSION['CUSTOMER_ALERT'] = json_encode($alert);
        header("location: ../login-pages.php");

    }else {
        $alert = [
            "message" => "Registration Failed",
            "status" => "error"
        ];

        $_SESSION['CUSTOMER_ALERT'] = json_encode($alert);
        header("location: ../register-page.php");
    }
}

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM customer WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];

        if(password_verify($password, $hashedPassword)) {
            $_SESSION['CUSTOMER'] = json_encode([
                "email" => $row['email'],
                "name" => $row['name'],
                "id" => $row['customer_id'],
            ]);

            $_SESSION['CUSTOMER_ALERT'] = json_encode([
                "message" => "Login successful",
                "status" => "success"
            ]);

            header("location: ../index.php");
        }
        else {
            $_SESSION['CUSTOMER_ALERT'] = json_encode([
                "message" => "Incorrect Password",
                "status" => "error"
            ]);

            header("location: ../login-page.php");
        }
    }
    else {
        $_SESSION['CUSTOMER_ALERT'] = json_encode([
            "message" => "No user found!",
            "status" => "error"
        ]);
        header("location: ../login-page.php");
        exit();
    }
}