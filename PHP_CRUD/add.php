<?php

session_start();

$host = "localhost";
$uname = "root";
$password = "";
$db_name = "user";

$conn = mysqli_connect($host, $uname, $password, $db_name);

if (!$conn) {
    echo "Connection failed!";
}

if (isset($_POST['nama']) && isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $nama = $_POST['nama'];

    $pass = $_POST['password'];
    $enkrip_pass = password_hash($pass, PASSWORD_DEFAULT);

    $date = new DateTime();
    $date = $date->format("y:m:d h:i:s");

    if (empty($nama)) {
        header("Location: index.php?error=Tolong masukkan nama!");
        exit();
    }
    if (empty($pass)) {
        header("Location: index.php?error=Tolong masukkan password");
        exit();
    }
    if (strlen($pass) < 5 && strlen($pass) > 8) {
        header("Location: index.php?error=Password tidak sesuai ketentuan!");
        exit();
    } else {
        $sql = "INSERT INTO `tbl_user`(`USERNAME`, `Password`, `CreateTime`) VALUES ('$nama','$enkrip_pass','$date');";
        if (mysqli_query($conn, $sql)) {
            header("Location: home.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
} else {
    header("Location: index.php");
    exit();
}
