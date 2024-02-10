<?php

include("../../mainconfig.php");

if (isset($_POST['save'])) {
    $name           = $_POST['1'];
    $siteStatus     = $_POST['2'];
    $sitePriority   = $_POST['3'];
    $nominal        = preg_replace("/[^0-9]/", "", $_POST['4']);

    $queryPlanning = "INSERT INTO planning (uuid, sitePriority, siteStatus, name, nominal, created_at) VALUE (UUID(), '$sitePriority', '$siteStatus', '$name', '$nominal', '$dtme')";
    $success = mysqli_query($call, $queryPlanning);

    if ($success) {
        header('Location:' . $_SERVER["HTTP_REFERER"]) . '?status=success';
    } else {
        header('Location:' . $_SERVER["HTTP_REFERER"] . '?status=fail');
    }
} else {
    die("What The Hell!!");
}
