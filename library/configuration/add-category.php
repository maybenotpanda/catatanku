<?php

include("../../mainconfig.php");

if (isset($_POST['request'])) {
    $user          = $_GET['user'];
    $name          = $_POST['1'];
    $type          = $_POST['2'];
    $description   = $_POST['3'];

    $a = "INSERT INTO category (uuid, siteUser, name, type, description, created_at) VALUE (UUID(), '$user', '$name', '$type', NULLIF('$description', ''), '$dtme')";
    $query = mysqli_query($call, $a);

    if ($query) {
        header('Location:' . $_SERVER["HTTP_REFERER"]) . '?status=success';
    } else {
        header('Location:' . $_SERVER["HTTP_REFERER"] . '?status=gagal');
    }
} else {
    die("What The Hell!!");
}
