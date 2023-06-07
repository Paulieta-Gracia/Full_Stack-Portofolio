<?php
include 'functions.php';

$db = $conn;
$tableName = "tbl_user";
if (isset($_GET['delete'])) {
    $id = validate($_GET['delete']);
    $condition = ['id' => $id];
    $deleteMsg = delete_data($db, $tableName, $condition);
    header("location:home.php");
}

function delete_data($db, $tableName, $condition)
{
    $conditionData = '';
    $i = 0;
    foreach ($condition as $index => $data) {
        $and = ($i > 0) ? ' AND ' : '';
        $conditionData .= $and . $index . " = " . "'" . $data . "'";
        $i++;
    }
    $query = "DELETE FROM " . $tableName . " WHERE " . $conditionData;
    $result = $db->query($query);
    if ($result) {
        $msg = "data berhasil dihapus";
    } else {
        $msg = $db->error;
    }
    return $msg;
}
function validate($value)
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}
