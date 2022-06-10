<?php 

session_start();

include("../../db/config.php");
include("../../functions/index.php");
include("../utils/index.php");


if(isset($_POST['add'])){
    // Get the input
    $name = mysqli_real_escape_string($conn, cleanInput($_POST["name"]));
    $price = mysqli_real_escape_string($conn, cleanInput($_POST["price"]));
    $quantity = mysqli_real_escape_string($conn, cleanInput($_POST["quantity"]));
    $label = mysqli_real_escape_string($conn, cleanInput($_POST["label"]));
    $color = mysqli_real_escape_string($conn, cleanInput($_POST["color"]));
    $category = mysqli_real_escape_string($conn, cleanInput($_POST["category"]));
    $description = mysqli_real_escape_string($conn, cleanInput($_POST["description"]));
    $feature = mysqli_real_escape_string($conn, cleanInput($_POST["feature"]));


    // Files
    $files = $_FILES['image'];
    $image_name = [];

    for($i = 0; $i < count($files["error"]); $i++) {
        if(!$files["error"][$i]) {
            // Getting the file name [eg: image1.jpg]
            $filename = $files['name'][$i];

            // Splitting the filename into array (eg: [image1, jpg])
            $filename_arr = explode(".", $filename);

            // imagejkdjdjd.hdhdhd.png => [imagejkdjdjd, hdhdhd, png]
            $fullname = $filename_arr[0];
            $ext = $filename_arr[count($filename_arr) - 1];
 
            // Randomizing the filename [eg: image12333545342.jpg]
            $fullname .= time() . rand(100, 1000) . "." . $ext;

            // Getting the file temporary location [eg: c://xampp/temp/image1.jpg]
            $file = $files['tmp_name'][$i];

            // The destination for the upload
            $destination = "../../uploads/";

            // Moving the file from the temporary location to the destination location
            if(move_uploaded_file($file, $destination . $fullname)) {
                array_push($image_name, $fullname);
            }
        }
    }

    if(count($image_name)) {
        $product_id = idGenerator("prod_", 8);
        $image = json_encode($image_name);

        $query = "INSERT INTO `product`(`id`, `name`, `image`, `price`, `quantity`, `description`, `label`, `color`, `feature`, `category`) 
        VALUES ('$product_id','$name','$image','$price','$quantity','$description','$label','$color','$feature','$category')";
        $result = mysqli_query($conn, $query);

        if($result) {
            // Set alert
            setAlert("success", "Product added successfully");

            // redirect to product page
            header("location: ../product.php");
        }
        else {
            setAlert("error", "Something went wrong, Please try again later");
            header("location: ../product.php");
        }
    }
}