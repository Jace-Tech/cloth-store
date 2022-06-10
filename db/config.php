<?php 

define("HOST", "localhost");
define("USER", "peacery3_cloth_root");
define("PASSWORD", "cloth1234.");
define("DB", "peacery3_cloth");


$conn = mysqli_connect(HOST, USER, PASSWORD, DB);

// if($conn) echo "Connected!"; 