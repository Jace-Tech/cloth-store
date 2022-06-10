<?php 

// Start a session
session_start();

// Database Config file
include("../../db/config.php");

// Include the functions 
include("../../functions/index.php");


// Register the admin 
if(isset($_POST['signup'])) {
    $email = cleanInput($_POST['email'], "email");
    $name = cleanInput($_POST['name']);
    $adminId = idGenerator("Adm_", 8);

    // Hash the password
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Push to DB
    $query = "INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES ('$adminId', '$name', '$email', '$password')";
    $result = mysqli_query($conn, $query);

    if($result) {
        // Create an alert session
        $alert = [
            "message" => "Registration completed",
            "type" => "success",
        ];

        $_SESSION['ADMIN_ALERT'] = json_encode($alert);

        header("location: ../index.php");
    }
    else {
        // Create an alert session
        $alert = [
            "message" => "Something went wrong",
            "type" => "error",
        ];

        $_SESSION['ADMIN_ALERT'] = json_encode($alert);

        // Redirect to admin signup
        header("location: ../signup.php");
    }
}

// Login the admin
if(isset($_POST['login'])) {

    // Clean the input
    $email = cleanInput($_POST['email'], "email");
    $password = $_POST['password'];

    // If user exists
    $query = "SELECT * FROM `admin` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Check if the password match
        if(password_verify($password, $row['password'])) {
            // Set the admin session
            $_SESSION["ADMIN"] = json_encode([
                "ADMIN_ID" => $row['id'],
                "ADMIN_EMAIL" => $row['email'],
                "ADMIN_NAME" => $row['name']
            ]);

            // Redirect to dashboard
            header('Location: ../dashboard.php');
        }
        else {
            $alert = [
                "type" => "error",
                "message" => "Password does not match"
            ];

            $_SESSION['ADMIN_ALERT'] = json_encode($alert);
            header("Location: ../index.php");
        }
    }
    else {
        $alert = [
            "type" => "error",
            "message" => "No user found",
        ];

        $_SESSION["ADMIN_ALERT"] = json_encode($alert);
        header("location: ../index.php");
    }
}

// Logout the admin
if(isset($_POST["logout"])) {
    // Clear the admin session
    unset($_SESSION["ADMIN"]);

    // Redirect to login page
    header("location: ../index.php");
}