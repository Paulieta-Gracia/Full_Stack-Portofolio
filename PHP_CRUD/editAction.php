<?php

require_once("functions.php");

$db = $conn;
$tableName = "tbl_user";

if (isset($_GET['namaBaru'])) {
    $id = validate($_GET['namaBaru']);
    $namaUser = $_GET['namaBaru'];
    $condition = ['id' => $id];
    $UpdateMsg = edit_data($db, $tableName, $condition, $namaUser);
    header("location:home.php");
}

function edit_data($db, $tableName, $condition, $namaUser)
{
    $conditionData = '';
    $i = 0;
    foreach ($condition as $index => $data) {
        $and = ($i > 0) ? ' AND ' : '';
        $conditionData .= $and . $index . " = " . "'" . $data . "'";
        $i++;
    }

    $query = "UPDATE " . $tableName . " SET `USERNAME` = " . $namaUser . " WHERE " . $conditionData;
    $result = $db->query($query);

    if ($result) {
        $msg = "data berhasil diganti";
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
