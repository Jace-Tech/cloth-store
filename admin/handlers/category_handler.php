<?php 

session_start();

include("../../functions/index.php");
include("../../db/config.php");
include("../utils/index.php");

// Insert Category
if(isset($_POST['add'])) {
    $category = mysqli_real_escape_string($conn, cleanInput($_POST['category']));

    $query = "INSERT INTO `category`(`category_name`) VALUES ('$category')";
    $result = mysqli_query($conn, $query);

    if(!$result) {
        // Set Alert
        setAlert("error", "Something went wrong, Please try again");
        // Redirect to category
        header("location: ../category.php");
    }
    else {
        setAlert("success", "Category added successfully");    
        // Redirect to category
        header("location: ../category.php");
    }
}

// Update
// UPDATE category SET category_name = 'value' WHERE id = 'id' 

if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $category_name = mysqli_real_escape_string($conn, $_POST['category']);
    
    $query = "UPDATE category SET category_name = '$category_name' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if($result) {
        setAlert("success", "Category updated successfully");

        // Redirect to the category page
        header("location: ../category.php");
    }
    else {
        setAlert("error", "Something went wrong, Please try again");

        // Redirect to the category page
        header("location: ../category.php");
    }
}

// Delete Category 
if(isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $query = "DELETE FROM `category` WHERE `id` = '$id'"; 
    $result = mysqli_query($conn, $query);


    if(!$result) {
        setAlert("error", "Something went wrong, Please try again");

        // Redirect to category
        header("location: ../category.php");
    }
    else {
        setAlert("success", "Category deleted successfully");
        
        // Redirect to category
        header("location: ../category.php");
    }


}



