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
    <title>Update Data</title>
</head>

<body>
    <form action="editAction.php" method="POST">
        <h2>FORM UPDATE</h2>

        <label>Nama</label>
        <input type="text" name="namaBaru" placeholder="Masukkan nama baru">

        <button type="submit">Update</button>
    </form>
</body>

</html>