<?php  session_start() ?>
<?php include("../db/config.php"); ?>
<?php include("./utils/index.php"); ?>

<!-- Check if admin signed in -->
<?php 
    if(isset($_SESSION['ADMIN'])) {
        $ADMIN = json_decode($_SESSION['ADMIN'], true); 
    }
    else {
        header("location: ./index.php");
    }
    
?>