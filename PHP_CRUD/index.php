<?php
include 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>
</head>

<body>
    <form action="add.php" method="post">
        <h2>FORM PENAMBAHAN USER</h2>

        <?php if (isset($_GET['error'])) { ?>
            <p class="error"> <?php echo $_GET['error'] ?></p>
        <?php } ?>

        <label>Nama</label>
        <input type="text" name="nama" placeholder="Nama">

        <label>Password</label>
        <input type="password" name="password" placeholder="Password">
        <p>masukkan password dengan panjang min. 5 dan max. 8</p>

        <button type="submit">Submit</button>
    </form>
</body>

</html>