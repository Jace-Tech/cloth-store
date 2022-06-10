<?php

include("./db/config.php");
include("./functions/index.php");
include("./admin/utils/index.php");

session_start();

if(isset($_SESSION['CUSTOMER'])) {
    $CUSTOMER = json_decode($_SESSION['CUSTOMER'], true);
}