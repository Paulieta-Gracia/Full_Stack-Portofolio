<?php
$var = 'abcdefghijklmnopqrstuywxyz1234567890';

$random = str_shuffle($var);

$captcha = substr($random, 0, 10);
echo $captcha;

$continue = '';

if (isset($_POST['captcha'])) {

    $check = $_POST['captcha'];
    if ($captcha == $check) {
        $continue = True;
    } else {
        header("Location: login.php?error=Kode captcha tidak sama");
        exit();
    }
}
