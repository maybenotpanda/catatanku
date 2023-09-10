<?php

include("../../mainconfig.php");

if (isset($_POST['save'])) {
    $date           = $_POST['1'];
    $total          = preg_replace("/[^0-9]/", "", $_POST['2']);
    $accountfrom    = $_POST['3'];
    $accountto      = $_POST['4'];
    $category       = $_POST['5'];
    $description    = $_POST['6'];

    $dateExplode        = explode('-', $date);
    $dateTransactions   = $dateExplode[2] . '-' . $dateExplode[1] . '-' . $dateExplode[0];

    $getAccountfrom = mysqli_query($call, "SELECT * FROM accounts WHERE uuid='$accountfrom'");
    $datafrom       = mysqli_fetch_array($getAccountfrom);

    $getAccountto = mysqli_query($call, "SELECT * FROM accounts WHERE uuid='$accountto'");
    $datato       = mysqli_fetch_array($getAccountto);

    

    $a = "INSERT INTO transactions (uuid, account, category, name, total, type, description, dateTransactions, created_at) VALUE (UUID(), '$account', '$category', '$name', '$total', '$type', '$description', '$dateTransactions', '$dtme')";
    $query = mysqli_query($call, $a);

    if ($query) {
        header('Location:' . $_SERVER["HTTP_REFERER"]) . '?status=success';
    } else {
        header('Location:' . $_SERVER["HTTP_REFERER"] . '?status=gagal');
    }
} else {
    die("Fuck me?");
}
