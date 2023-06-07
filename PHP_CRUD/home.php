<?php
include 'functions.php';


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$database = mysqli_connect("localhost", "root", "", 'user');
$database->set_charset('utf8mb4'); // always set the charset

$users = $database->query("SELECT ID, USERNAME FROM tbl_user");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <div class="content read">
        <h2>Data User</h2>
        <a href="index.php" class="add-user">Tambah User</a>

        <div class="container">

            <h2 class="pull-left">Users List</h2>
        </div>
        <?php
        include_once 'functions.php';
        $result = mysqli_query($conn, "SELECT * FROM `tbl_user`");
        ?>
        <?php
        if (mysqli_num_rows($result) > 0) {
        ?>
            <table class='table_data'>
                <tr>
                    <td>No.</td>
                    <td>ID</td>
                    <td>Nama</td>
                    <td>Waktu</td>
                </tr>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $i + 1 ?></td>
                        <td><?php echo $row["ID"]; ?></td>
                        <td><?php echo $row["USERNAME"]; ?></td>
                        <td><?php echo $row["CreateTime"]; ?></td>
                        <td><a href="edit.php?edit=<?php echo $row['ID']; ?>" class="edit-btn">Edit</a></td>
                        <td><a href="delete.php?delete=<?php echo $row['ID']; ?>" class="delete-btn">Delete</a></td>
                    </tr>
                <?php
                    $i++;
                }
                ?>
            </table>
            <a href="logout.php">Logout</a>
        <?php
        } else {
            echo "No result found";
        }
        ?>
    </div>
    </div>
    </div>
    </div>
</body>

</html>