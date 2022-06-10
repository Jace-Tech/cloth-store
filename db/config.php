<?php 

define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DB", "cloth_store");


$conn = mysqli_connect(HOST, USER, PASSWORD, DB);

// if($conn) echo "Connected!"; 