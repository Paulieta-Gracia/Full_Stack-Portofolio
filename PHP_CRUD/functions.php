<?php

$host = "localhost";
$uname = "root";
$password = "";
$db_name = "user";

$conn = mysqli_connect($host, $uname, $password, $db_name);
if (!$conn) {
    echo "Failed to connect to database!";
}
