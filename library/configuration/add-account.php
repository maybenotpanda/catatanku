<?php

include("../../mainconfig.php");

if (isset($_POST['save'])) {
    $name          = $_POST['1'];
    $balance       = preg_replace("/[^0-9]/", "", $_POST['2']);

    $a = "INSERT INTO accounts (uuid, name, balance, created_at) VALUE (UUID(), '$name', '$balance', '$dtme')";
    $query = mysqli_query($call, $a);

    if ($query) {
        header('Location:' . $_SERVER["HTTP_REFERER"]) . '?status=success';
    } else {
        header('Location:' . $_SERVER["HTTP_REFERER"] . '?status=gagal');
    }
} else {
    die("What The Hell!!");
}