<?php
$permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

function generate_string($input, $strength = 10)
{
    $input_length = strlen($input);
    $random_string = '';
    for ($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }

    return $random_string;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="login-check.php" method="POST">
        <h2>FORM Login</h2>

        <?php if (isset($_GET['error'])) { ?>
            <p class="error"> <?php echo $_GET['error'] ?></p>
        <?php } ?>

        <label>Nama</label>
        <input type="text" name="nama" placeholder="Nama">

        <label>Password</label>
        <input type="password" name="password" placeholder="Password">
        <p>masukkan password dengan panjang min. 5 dan max. 8</p>

        <!-- <form action="captcha.php" method="POST">
            <label for="captcha">Please Enter the Captcha Text</label>
            <p><?php generate_string('ABCDEFGHIJKLMNOPQRSTUVWXYZ'); ?></p>
            <br>
            <input type="text" id="captcha" name="captcha_challenge" pattern="[A-Z]{6}">
        </form> -->

        <button type="submit">Submit</button>
    </form>
</body>

</html>