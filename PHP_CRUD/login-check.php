<?php

session_start();
include "functions.php";

if (isset($_POST['nama']) && isset($_POST['password'])) {
    $namaUser = $_POST['nama'];
    $pass_login = $_POST['password'];

    if (empty($namaUser)) {
        header("Location: login.php?error=Username is required");
        exit();
    }
    if (empty($pass_login)) {
        header("Location: login.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM tbl_user WHERE USERNAME='$namaUser' ";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            if ($row['Password'] == $pass_login) {
                $_SESSION['username'] = $row['USERNAME'];
                $_SESSION['id'] = $row['ID'];
                header("Location: home.php");
                exit();
            } else {
                header("Location: index.php?error=Incorrect username or password");
                exit();
            }
        } else {
            header("Location: User tidak ditemukan");
            exit();
        }
    }
} else {
    header("Location: login.php");
    exit();
}
