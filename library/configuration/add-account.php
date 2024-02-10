<?php

include("../../mainconfig.php");

if (isset($_POST['request'])) {
    $user       = $_GET['user'];
    $name       = $_POST['name'];
    $balance    = preg_replace("/[^0-9]/", "", $_POST['balance']);
    $query = "INSERT INTO accounts (uuid, siteUser, name, balance, created_at) VALUE (UUID(), '$user', '$name', '$balance', '$dtme')";
    $response = mysqli_query($call, $query);
    if ($response) {
        header('Location:' . $_SERVER["HTTP_REFERER"]) . '?status=success';
    } else {
        header('Location:' . $_SERVER["HTTP_REFERER"] . '?status=gagal');
    }
} else {
    die("What The Hell!!");
}