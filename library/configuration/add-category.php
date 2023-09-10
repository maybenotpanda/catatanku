<?php

include("../../mainconfig.php");

if (isset($_POST['save'])) {
    $name          = $_POST['1'];
    $type          = $_POST['2'];
    $description   = $_POST['3'];

    $a = "INSERT INTO category (uuid, name, type, description, created_at) VALUE (UUID(), '$name', '$type', '$description', '$dtme')";
    $query = mysqli_query($call, $a);

    if ($query) {
        header('Location:' . $_SERVER["HTTP_REFERER"]) . '?status=success';
    } else {
        header('Location:' . $_SERVER["HTTP_REFERER"] . '?status=gagal');
    }
} else {
    die("What The Hell!!");
}
