<?php
require 'config/constants.php';
//connect to the database 
$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (mysqli_error($connection)) {
    die(mysqli_error($connection));
}