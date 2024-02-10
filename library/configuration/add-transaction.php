<?php

include("../../mainconfig.php");

if (isset($_POST['request'])) {
    $type           = $_GET['type'];
    $user           = $_GET['user'];
    $date           = $_POST['1'];
    $name           = $_POST['2'];
    $total          = preg_replace("/[^0-9]/", "", $_POST['3']);
    $account        = $_POST['4'];
    $category       = $_POST['5'];
    $description    = $_POST['6'];

    $dateExplode        = explode('-', $date);
    $dateTransaction   = $dateExplode[2] . '-' . $dateExplode[1] . '-' . $dateExplode[0];

    $getAccount     = mysqli_query($call, "SELECT * FROM accounts WHERE uuid='$account'");
    $data           = mysqli_fetch_array($getAccount);

    if ($type === "income") {
        $result = intval($data['balance'] + $total);
        mysqli_query($call, "UPDATE accounts SET balance='$result', updated_at='$dtme' WHERE uuid='$account'");
    } else {
        $result = intval($data['balance'] - $total);
        mysqli_query($call, "UPDATE accounts SET balance='$result', updated_at='$dtme' WHERE uuid='$account'");
    }

    $a = "INSERT INTO transactions (uuid, siteUser, account, category, name, total, type, description, dateTransaction, created_at) VALUE (UUID(), '$user', '$account', '$category', '$name', '$total', '$type', NULLIF('$description', ''), '$dateTransaction', '$dtme')";
    $query = mysqli_query($call, $a);

    if ($query) {
        header('Location:' . $_SERVER["HTTP_REFERER"]) . '?status=success';
    } else {
        header('Location:' . $_SERVER["HTTP_REFERER"] . '?status=gagal');
    }
} else {
    die("Fuck me?");
}
